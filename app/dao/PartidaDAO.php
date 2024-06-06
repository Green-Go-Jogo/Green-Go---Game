<?php
#Classe DAO para o model de personagem

#Classe DAO para o model de Personagem

include_once(__DIR__ . "/../connection/Connection.php");
include_once(__DIR__ . "/../models/EquipeModel.php");
include_once(__DIR__ . "/../models/ZonaModel.php");
include_once(__DIR__ . "/../models/PartidaModel.php");
include_once(__DIR__ . "/../models/UsuarioModel.php");

class PartidaDAO
{

    private const SQL_PARTIDA = "SELECT p.* FROM partida p";

    private const SQL_USUARIO_PARTIDA = "SELECT pe.pontuacaoEquipe,p.dataFim,p.dataInicio,pe.idPartida,pe.idEquipe, pu.* FROM partida_usuario pu 
    JOIN partida_equipe pe ON pu.idPartidaEquipe = pe.idPartidaEquipe 
    JOIN partida p ON pe.idPartida = p.idPartida";

    private const SQL_PLANTA_ZONA = "SELECT plant.*,pz.* FROM partida_zona pz 
    JOIN partida part ON part.idPartida = pz.idPartida 
    JOIN zona z ON z.idZona = pz.idZona 
    JOIN planta plant ON plant.idZona = z.idZona";

    private const SQL_EQUIPE_PARTIDA = "SELECT pe.pontuacaoEquipe,p.dataFim,p.dataInicio,pe.idPartida,e.* FROM equipe e 
    JOIN partida_equipe pe ON e.idEquipe = pe.idEquipe 
    JOIN partida p ON pe.idPartida = p.idPartida";

    private function mapPartidas($resultSql)
    {
        $partidas = array();
        foreach ($resultSql as $reg) :

            $partida = new Partida();
            $partida->setIdAdm($reg['idUsuario']);
            $partida->setIdPartida($reg['idPartida']);
            $partida->setNomePartida($reg['nomePartida']);
            $partida->setDataInicio($reg['dataInicio']);
            $partida->setDataFim($reg['dataFim']);
            $partida->setTempoPartida($reg['tempoPartida']);
            $partida->setSenha($reg['senhaPartida']);
            $partida->setLimiteJogadores($reg['limiteJogadores']);

            array_push($partidas, $partida);
        endforeach;

        return $partidas;
    }
    private function mapUsuarioPartida($resultSql)
    {
        $partidas = array();
        foreach ($resultSql as $reg) :

            $partida = new Partida();
            $partida->setIdPartida($reg['idPartida']);
            $partida->setIdusuario($reg['idUsuario']);
            $partida->setIdPartidaUsuario($reg['idPartidaUsuario']);
            $partida->setIdPartidaEquipe($reg['idPartidaEquipe']);
            $partida->setIdEquipe($reg['idEquipe']);
            $partida->setDataFim($reg['dataFim']);
            $partida->setDataInicio($reg['dataInicio']);
            $partida->setPlantasLidas($reg['plantasLidas']);
            $partida->setQuestoesRespondidas($reg['questoesRespondidas']);
            $partida->setPontuacaoEquipe($reg['pontuacaoEquipe']);
            $partida->setPontuacaoPlantas($reg['pontuacaoPlantas']);
            $partida->setPontuacaoQuestoes($reg['pontuacaoQuestoes']);

            array_push($partidas, $partida);
        endforeach;

        return $partidas;
    }

    public function list()
    {
        $conn = conectar_db();

        $sql = PartidaDAO::SQL_PARTIDA .
            " ORDER BY p.nomePartida";
        $stm = $conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();

        return $this->mapPartidas($result);
    }



    public function findById($idPartida)
    {
        $conn = conectar_db();

        $sql = PartidaDAO::SQL_PARTIDA .
            " WHERE p.idPartida = ?";

        $stmt = $conn->prepare($sql);
        $stmt->execute([$idPartida]);
        $result = $stmt->fetchAll();

        //Criar o objeto Partida
        $partidas = $this->mapPartidas($result);

        if (count($partidas) == 1)
            return $partidas[0];
        elseif (count($partidas) == 0)
            return null;
    }

    public function findRelacaoByIdPartida($idPartida)
    {
        $conn = conectar_db();

        $sql = PartidaDAO::SQL_USUARIO_PARTIDA . " WHERE pu.idPartida = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            $idPartida
        ]);

        $result = $stmt->fetchAll();

        return $this->mapUsuarioPartida($result);
    }

    public function findPartidaFinalizadaByIdUsuario($idUsuario)
    {
        $conn = conectar_db();

        $sql = PartidaDAO::SQL_USUARIO_PARTIDA . " WHERE pu.idUsuario = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            $idUsuario
        ]);

        $result = $stmt->fetchAll();

        $partidas = $this->mapUsuarioPartida($result);

        if (count($result) >= 1) {
            foreach ($partidas as $partida)
                $partidaFinalizada = $partida->issetDataFim($partida->getDataFim());

            if ($partidaFinalizada) {
                return $partida;
            } else {
                return null;
            }
        }
    }

    public function findPartidaAndamentoByIdUsuario($idUsuario)
    {
        $conn = conectar_db();

        $sql = PartidaDAO::SQL_USUARIO_PARTIDA . " WHERE pu.idUsuario = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            $idUsuario
        ]);

        $result = $stmt->fetchAll();

        $partidas = $this->mapUsuarioPartida($result);

        if (count($result) >= 1) {
            foreach ($partidas as $partida)
                $partidaAndamento = $partida->issetDataInicio($partida->getDataInicio());

            if ($partidaAndamento) {
                return $partida;
            } else {
                return null;
            }
        }
    }

    public function findTableUsuario($idUsuario, $idPartida)
    {
        $conn = conectar_db();

        $sql = PartidaDAO::SQL_USUARIO_PARTIDA . " WHERE pu.idUsuario = ? AND p.idPartida = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            $idUsuario, $idPartida
        ]);

        $result = $stmt->fetchAll();

        $usuarios = $this->mapUsuarioPartida($result);

        if (count($usuarios) == 1)
            return $usuarios[0];
        elseif (count($usuarios) == 0)
            return null;
    }

    public function findPartidaByADM($idUsuario)
    {
        $conn = conectar_db();

        $sql = "SELECT * FROM partida WHERE idUsuario = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            $idUsuario
        ]);

        $result = $stmt->fetchAll();

        $partidas = $this->mapPartidas($result);

        if (count($result) >= 1) {
            foreach ($partidas as $partida)
                $partidaFinalizada = $partida->issetDataFim($partida->getDataFim());
            $partidaAndamento = $partida->issetDataInicio($partida->getDataInicio());

            if ($partidaFinalizada) {
                return null;
            } else if ($partidaAndamento) {
                return $partida;
            } else {
                return $partida;
            }
        } else {
            return null;
        }
    }


    public function savePartida(Partida $partida)
    {
        $conn = conectar_db();

        $sql = "INSERT INTO partida (idUsuario, nomePartida, limiteJogadores, senhaPartida, tempoPartida) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            $partida->getIdAdm(),
            $partida->getNomePartida(),
            $partida->getLimiteJogadores(),
            $partida->getSenha(),
            $partida->getTempoPartida(),
        ]);

        $idPartida = $conn->lastInsertId();
        $partida->setIdPartida($conn->lastInsertId());
        $this->saveEquipe($partida, $idPartida);
        $this->saveZona($partida, $idPartida);
    }

    public function saveEquipe(Partida $partida, $idPartida)
    {
        $conn = conectar_db();
        $equipes = $partida->getEquipes();

        foreach ($equipes as $equipe) {
            $sql = "INSERT INTO partida_equipe (idEquipe, idPartida) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                $equipe,
                $idPartida,
            ]);
        };
        return;
    }

    public function saveZona(Partida $partida, $idPartida)
    {
        $conn = conectar_db();
        $zonas = $partida->getZonas();

        foreach ($zonas as $zona) {
            $sql = "INSERT INTO partida_zona (idZona, idPartida) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                $zona,
                $idPartida,
            ]);
        };
    }

    public function saveUsuarioEquipe($idPartidaEquipe, $idUsuario)
    {

        var_dump($idPartidaEquipe);
        $conn = conectar_db();

        $sql = "INSERT INTO partida_usuario (idPartidaEquipe, idUsuario) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            $idPartidaEquipe,
            $idUsuario,
        ]);

        return;
    }

    public function findPartidaEquipe($idEquipe, $idPartida)
    {

        $conn = conectar_db();

        $sql = "SELECT * FROM partida_equipe WHERE idEquipe = ? AND idPartida = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            $idEquipe,
            $idPartida,
        ]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $idPartidaEquipe = $result['idPartidaEquipe'];
            return $idPartidaEquipe;
        } else {
            return null;
        }
    }

    public function usuarioInEquipe($idUsuario)
    {
        $conn = conectar_db();

        $sql = PartidaDAO::SQL_USUARIO_PARTIDA . " WHERE pu.idUsuario = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            $idUsuario
        ]);

        $result = $stmt->fetchAll();

        $partidas = $this->mapUsuarioPartida($result);

        if (count($result) >= 1) {
            foreach ($partidas as $partida)
                $partidaFinalizada = $partida->issetDataFim($partida->getDataFim());
            $partidaAndamento = $partida->issetDataInicio($partida->getDataInicio());

            if ($partidaFinalizada) {
                return null;
            } else if ($partidaAndamento) {
                return $partida;
            } else {
                return $partida;
            }
        } else {
            return null;
        }
    }

    public function findByLoginSenha(string $IdPartida, string $Senha)
    {
        $conn = conectar_db();
        $sql = PartidaDAO::SQL_PARTIDA . " WHERE idPartida = ? AND senhaPartida = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$IdPartida, $Senha]);
        $result = $stmt->fetchAll();

        $partidas = $this->mapPartidas($result);

        if (count($partidas) === 1) {
            return $partidas[0];
        }

        return null;
    }


    public function enterRoom($idPartida, $Senha)
    {
        $partida = $this->findByLoginSenha($idPartida, $Senha);

        if ($partida !== null) {
            return true;
        } else {
            return false;
        }
    }


    public function teamScore()
    {
        $conn = conectar_db();

        $sql = "UPDATE partida_equipe pe SET pe.pontuacaoEquipe = (SELECT SUM(pu.pontuacaoPlantas) FROM partida_usuario pu WHERE pu.idPartidaEquipe = pe.idPartidaEquipe)";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }

    public function countPlayers($idPartida)
    {
        $conn = conectar_db();

        $sql = "SELECT pu.* FROM partida_usuario pu JOIN partida_equipe pe ON pe.idPartidaEquipe = pu.idPartidaEquipe WHERE idPartida = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$idPartida]);

        $numLinhas = $stmt->rowCount();
        return $numLinhas;
    }

    public function countPlayersTeam($idPartida, $idEquipe)
    {
        $conn = conectar_db();

        $sql = "SELECT pu.* FROM partida_usuario pu JOIN partida_equipe pe ON pe.idPartidaEquipe = pu.idPartidaEquipe WHERE idPartida = ? AND idEquipe = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$idPartida, $idEquipe]);

        $numLinhas = $stmt->rowCount();
        return $numLinhas;
    }

    public function updatePartida(Partida $partida)
    {
        $conn = conectar_db();

        $sql = "UPDATE partida SET idUsuario = ?, nomePartida = ?, limiteJogadores = ?, senhaPartida = ?, tempoPartida = ? WHERE idPartida = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            $partida->getIdAdm(),
            $partida->getNomePartida(),
            $partida->getLimiteJogadores(),
            $partida->getSenha(),
            $partida->getTempoPartida(),
            $partida->getIdPartida()
        ]);

        $idPartida = $partida->getIdPartida();
        $this->updateEquipe($partida, $idPartida);
        $this->updateZona($partida, $idPartida);
    }

    public function updateEquipe($partida, $idPartida)
    {
        $conn = conectar_db();
        $equipes = $partida->getEquipes();

        $this->deleteEquipePartida($idPartida);

        foreach ($equipes as $equipe) {
            $sql = "INSERT INTO partida_equipe (idEquipe, idPartida) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                $equipe,
                $idPartida,
            ]);
        };
        return;
    }

    public function updateZona($partida, $idPartida)
    {
        $conn = conectar_db();
        $zonas = $partida->getZonas();

        $this->deleteZonaPartida($idPartida);

        foreach ($zonas as $zona) {
            $sql = "INSERT INTO partida_zona (idZona, idPartida) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                $zona,
                $idPartida,
            ]);
        };
    }

    public function deleteEquipePartida($idPartida)
    {
        $conn = conectar_db();
        $sql = "DELETE FROM partida_equipe WHERE idPartida = ?";

        $stmt = $conn->prepare($sql);
        $stmt->execute([$idPartida]);
    }

    public function deleteZonaPartida($idPartida)
    {
        $conn = conectar_db();
        $sql = "DELETE FROM partida_zona WHERE idPartida = ?";

        $stmt = $conn->prepare($sql);
        $stmt->execute([$idPartida]);
    }

    public function addScorePlantas($arrayPlantas, $pontos, $idUsuario)
    {
        $conn = conectar_db();

        $usuario = $this->usuarioInEquipe($idUsuario);

        if ($usuario) {

            $plantasString = implode(' | ', $arrayPlantas);

            // Atualize a coluna plantasLidas no banco de dados com a nova string
            $sql = "UPDATE partida_usuario SET pontuacaoPlantas = ?, plantasLidas = ? WHERE idPartidaUsuario = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$pontos, $plantasString, $usuario->getIdPartidaUsuario()]);
        } else {
            echo 'Usuário não encontrado.';
        }
    }


    public function addScoreQuestoes($idQuestao, $pontos, $idUsuario)
    {
        $conn = conectar_db();
        $usuario = $this->usuarioInEquipe($idUsuario);

        if ($usuario) {
            
            $this->addQuestionsResponse($idQuestao, $idUsuario);
            
            $sql = "UPDATE partida_usuario SET pontuacaoQuestoes = ? WHERE idPartidaUsuario = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$pontos, $usuario->getIdPartidaUsuario()]);
        } else {
            echo 'Usuário não encontrado.';
        }
    }

    public function addQuestionsResponse($idQuestao, $idUsuario){

        $conn = conectar_db();
        $usuario = $this->usuarioInEquipe($idUsuario);

        if ($usuario) {

        $questoesString = $idQuestao . " | ";

        $sql = "UPDATE partida_usuario SET questoesRespondidas = CONCAT(questoesRespondidas, ?) WHERE idPartidaUsuario = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$questoesString, $usuario->getIdPartidaUsuario()]);
        } else {
            echo 'Usuário não encontrado.';
        }
    }

    public function checkZona($idPlanta, $idPartida)
    {
        $conn = conectar_db();

        $sql = PartidaDAO::SQL_PLANTA_ZONA . " WHERE plant.idPlanta = ? AND part.idPartida = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$idPlanta, $idPartida]);

        $result = $stmt->fetchAll();

        if (count($result) == 1) {
            return true;
        } else {
            return false;
        }
    }
}
