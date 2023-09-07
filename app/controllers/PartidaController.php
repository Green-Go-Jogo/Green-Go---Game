<?php
#Classe de controller para partida

include_once(__DIR__."/../dao/PartidaDAO.php");
include_once(__DIR__."/../dao/EquipeDAO.php");
include_once(__DIR__."/../dao/PlantaDAO.php");
include_once(__DIR__."/../dao/ZonaDAO.php");

class PartidaController {

    private $partidaDAO;
    private $equipeDAO;
    private $zonaDAO;
    private $plantaDAO;

    public function __construct() {
        $this->partidaDAO = new PartidaDAO();
        $this->plantaDAO = new PlantaDAO();
        $this->equipeDAO = new EquipeDAO();
        $this->zonaDAO = new ZonaDAO();
    }

    public function listar() {
        return $this->partidaDAO->list();
    }
    
    public function buscarPorId($idPartida) {
        $partida = $this->partidaDAO->findById($idPartida);
        if($partida) {
            $zonas = $this->zonaDAO->listByPartida($idPartida);
            $equipes = $this->equipeDAO->listByPartida($idPartida);
            $partida->setEquipes($equipes);
            $partida->setZonas($zonas);
        }
        return $partida;
    }

    public function salvarPartida($partida) {
        $this->partidaDAO->savePartida($partida);
    }

    public function partidaStatus($idUsuario){
        $partida = $this->partidaDAO->findByPartidaByIdUsuario($idUsuario);
        return $partida;
    }

    public function salvarUsuarioEquipe($idEquipe, $idPartida) {
       
        $idPartidaEquipe = $this->partidaDAO->findPartidaEquipe($idEquipe, $idPartida);
        
        $idUsuario = $_SESSION["ID"];
        $inEquipe = $this->partidaDAO->usuarioInEquipe($idUsuario);

        if($inEquipe){
        $error = "Você já pertence a uma equipe!";
        return $error;
    } else {
       $_SESSION['PARTIDA'] = true;
       $this->partidaDAO->saveUsuarioEquipe($idPartidaEquipe, $idUsuario);
    }
    }

    public function checarQRCode($statusPartida, $idPlanta, $arrayPlantas, $idUsuario) {

        $partida = $this->partidaDAO->usuarioInEquipe($idUsuario);

        if ($partida !== null) {

            
            $idPartida = $partida->getIdPartida();
            $inZona = $this->partidaDAO->checkZona($idPlanta, $idPartida);
            if($inZona){
            if (!in_array($idPlanta, $arrayPlantas)) {
                $planta = $this->plantaDAO->findById($idPlanta);
                $_SESSION["PONTOS"] += $planta->getPontos();
                $arrayPlantas[] = $idPlanta;
                $_SESSION['PLANTAS_LIDAS'] = $arrayPlantas;

                $this->partidaDAO->addScore($_SESSION['PLANTAS_LIDAS'], $_SESSION['PONTOS'], $idUsuario);
                echo "Parabéns, você encontrou uma nova planta! <br>";
                
            } else {
                echo "Você já leu esse QR Code para esta planta. <br>";
            }
        }
        else {
            echo "Essa planta não pertence às zonas que você atualmente está procurando! <br>";
        }
        } else {
            return false;
        }
    }

    public function atualizar($planta) {
        $this->partidaDAO->update($planta);
    }

    public function excluir($planta) {
        $this->partidaDAO->delete($planta);
    }

    public function apagarImagem($idPlanta) {
        $this->partidaDAO->deleteImage($idPlanta);
    }
}

?>



