<?php
#Classe de controller para partida

include_once(__DIR__ . "/../dao/PartidaDAO.php");
include_once(__DIR__ . "/../dao/EquipeDAO.php");
include_once(__DIR__ . "/../dao/PlantaDAO.php");
include_once(__DIR__ . "/../dao/ZonaDAO.php");
include_once(__DIR__ . "/../dao/QuestaoDAO.php");

class PartidaController
{

    private $partidaDAO;
    private $equipeDAO;
    private $zonaDAO;
    private $plantaDAO;
    private $questaoDAO;

    public function __construct()
    {
        $this->partidaDAO = new PartidaDAO();
        $this->plantaDAO = new PlantaDAO();
        $this->equipeDAO = new EquipeDAO();
        $this->zonaDAO = new ZonaDAO();
        $this->questaoDAO = new QuestaoDAO();
    }

    public function listar()
    {
        $partidas = $this->partidaDAO->list();
        foreach ($partidas as $partida) {
            $idPartida = $partida->getIdPartida();
            $zonas = $this->zonaDAO->listByPartida($idPartida);
            $equipes = $this->equipeDAO->listByPartida($idPartida);
            $partida->setEquipes($equipes);
            $partida->setZonas($zonas);
        }

        return $partidas;
    }

    public function listarPorPartidaNaoIniciada()
    {
        $partidas = $this->partidaDAO->listByPartidaNotStarted();
        foreach ($partidas as $partida) {
            $idPartida = $partida->getIdPartida();
            $zonas = $this->zonaDAO->listByPartida($idPartida);
            $equipes = $this->equipeDAO->listByPartida($idPartida);
            $partida->setEquipes($equipes);
            $partida->setZonas($zonas);
        }

        return $partidas;
    }

    public function listarPorPartidaIniciada()
    {
        $partidas = $this->partidaDAO->listByPartidaStarted();
        foreach ($partidas as $partida) {
            $idPartida = $partida->getIdPartida();
            $zonas = $this->zonaDAO->listByPartida($idPartida);
            $equipes = $this->equipeDAO->listByPartida($idPartida);
            $partida->setEquipes($equipes);
            $partida->setZonas($zonas);
        }

        return $partidas;
    }

    public function listarPorPartidaFinalizada()
    {
        $partidas = $this->partidaDAO->listByPartidaFinished();
        foreach ($partidas as $partida) {
            $idPartida = $partida->getIdPartida();
            $zonas = $this->zonaDAO->listByPartida($idPartida);
            $equipes = $this->equipeDAO->listByPartida($idPartida);
            $partida->setEquipes($equipes);
            $partida->setZonas($zonas);
        }

        return $partidas;
    }

    public function buscarPorId($idPartida)
    {
        $partida = $this->partidaDAO->findById($idPartida);
        if ($partida) {
            $zonas = $this->zonaDAO->listByPartida($idPartida);
            $equipes = $this->equipeDAO->listByPartida($idPartida);
            $partida->setEquipes($equipes);
            $partida->setZonas($zonas);
        }
        return $partida;
    }

    public function salvarPartida($partida)
    {
        $this->partidaDAO->savePartida($partida);
    }


    public function buscarPartidaFinalizadaPorIdUsuario($idUsuario)
    {
        $partida = $this->partidaDAO->findPartidaFinalizadaByIdUsuario($idUsuario);
        return $partida;
    }

    public function buscarPartidaAndamentoPorIdUsuario($idUsuario)
    {
        $partida = $this->partidaDAO->findPartidaAndamentoByIdUsuario($idUsuario);
        return $partida;
    }

    public function buscarPartidaPorADM($idUsuario)
    {
        $partida = $this->partidaDAO->findPartidaByADM($idUsuario);
        return $partida;
    }

    public function buscarUsuarioPorIdPartida($idUsuario, $idPartida)
    {
        $partida = $this->partidaDAO->findTableUsuario($idUsuario, $idPartida);
        return $partida;
    }

    public function salvarUsuarioEquipe($idEquipe, $idPartida)
    {

        $idPartidaEquipe = $this->partidaDAO->findPartidaEquipe($idEquipe, $idPartida);

        $idUsuario = $_SESSION["ID"];
        $inEquipe = $this->partidaDAO->usuarioInEquipe($idUsuario);

        if ($inEquipe) {
            $idPartidaEquipe = $this->partidaDAO->usuarioInEquipe($idUsuario);
            return $idPartidaEquipe;
        } else {
            $_SESSION['PARTIDA'] = true;
            $this->partidaDAO->saveUsuarioEquipe($idPartidaEquipe, $idUsuario);
        }
    }

    public function UsuarioNaEquipe($idUsuario)
    {
        return $this->partidaDAO->usuarioInEquipe($idUsuario);
    }

    public function checarQRCode($idPlanta, $arrayPlantas, $idUsuario)
    {

        $partida = $this->partidaDAO->usuarioInEquipe($idUsuario);

        if ($partida !== null) {


            $idPartida = $partida->getIdPartida();
            $inZona = $this->partidaDAO->checkZona($idPlanta, $idPartida);
            if ($inZona) {
                if (!in_array($idPlanta, $arrayPlantas)) {
                    $planta = $this->plantaDAO->findById($idPlanta);
                    $_SESSION["PONTOS_PLANTAS"] += $planta->getPontos();
                    $arrayPlantas[] = $idPlanta;
                    $_SESSION['PLANTAS_LIDAS'] = $arrayPlantas;

                    $partida = $this->buscarPartidaAndamentoPorIdUsuario($idUsuario);
                    $jogadoresEquipe = $this->contarJogadoresEquipe($partida->getIdPartida(), $partida->getIdEquipe());

                    $this->partidaDAO->addScorePlantas($_SESSION['PLANTAS_LIDAS'], $_SESSION['PONTOS_PLANTAS'] / $jogadoresEquipe, $idUsuario);
                    $msgFind = "Parabéns, você encontrou uma nova planta! ";
                    return $msgFind;
                } else {
                    $msgFind = "Você já leu esse QR Code nessa partida. <br> Ou seja sem pontos pra você :(";
                    return $msgFind;
                }
            } else {
                $msgFind = "Essa planta não pertence à uma das zonas da sua partida!";
                return $msgFind;
            }
        } else {
            return false;
        }
    }

    public function checarRespostaQuiz($idQuestao, $idAlternativa, $idUsuario, $arrayQuestoes, $idPlanta)
    {
        $_SESSION['QUESTOES_LIDAS'] = $arrayQuestoes;
        //Checa se a alternativa da questão está certa
        $questaoCerta = $this->questaoDAO->checkQuestion($idQuestao, $idAlternativa);
        if ($questaoCerta && !in_array($idQuestao, $_SESSION['QUESTOES_LIDAS'])) {

            //Adiciona pontos por ter acertado a questão
            $partida = $this->buscarPartidaAndamentoPorIdUsuario($idUsuario);
            $jogadoresEquipe = $this->contarJogadoresEquipe($partida->getIdPartida(), $partida->getIdEquipe());

            $questao = $this->questaoDAO->findByIdPlantaAndIdQuestao($idPlanta, $idQuestao);
            $this->partidaDAO->addScoreQuestoes($idQuestao, $questao->getPontuacaoQuestao() / $jogadoresEquipe, $idUsuario);

            $arrayQuestoes[] = $idQuestao;
            $_SESSION['QUESTOES_LIDAS'] = $arrayQuestoes;
        } else if (!in_array($idQuestao, $_SESSION['QUESTOES_LIDAS'])) {
            //Adiciona a questão à questões respondidas mesmo se errada
            $this->partidaDAO->addQuestionsResponse($idQuestao, $idUsuario, 0);
            $arrayQuestoes[] = $idQuestao;
            $_SESSION['QUESTOES_LIDAS'] = $arrayQuestoes;
        } else {
        }
        //$questao->getPontuacaoQuestao()
        //retorna a resposta da questão (true - 1 ou false - 0)
        return $questaoCerta;
    }

    public function contarJogadores($idPartida)
    {
        return $this->partidaDAO->countPlayers($idPartida);
    }

    public function contarJogadoresEquipe($idPartida, $idEquipe)
    {
        return $this->partidaDAO->countPlayersTeam($idPartida, $idEquipe);
    }

    public function salvarPontuacaoEquipe()
    {
        $this->partidaDAO->teamScore();
    }

    public function atualizarPartida($partida)
    {
        $this->partidaDAO->updatePartida($partida);
    }

    public function excluir($partida)
    {
        $this->partidaDAO->delete($partida);
    }

    public function sairPartida($idPartida, $idUsuario) {
        $this->partidaDAO->leavePartida($idPartida, $idUsuario);
        $_SESSION['PARTIDA'] == false;
    }

    public function listarZonasPorPartida($idPartida){
        return $this->zonaDAO->listByPartida($idPartida);
    }

    public function listarQuestoesRespondidas($idPartida, $idUsuario){
        return $this->partidaDAO->listQuestionsAnswer($idPartida, $idUsuario);
    }
}
