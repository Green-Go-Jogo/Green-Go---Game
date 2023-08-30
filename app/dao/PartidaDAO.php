<?php
#Classe DAO para o model de personagem

#Classe DAO para o model de Personagem

include_once(__DIR__."/../connection/Connection.php");
include_once(__DIR__."/../models/EquipeModel.php");
include_once(__DIR__."/../models/ZonaModel.php");
include_once(__DIR__."/../models/PartidaModel.php");
include_once(__DIR__."/../models/UsuarioModel.php");

class PartidaDAO {

    private const SQL_PARTIDA = "SELECT p.* FROM partida p";
    
    private function mapPartidas($resultSql) {
            $partidas = array();
            foreach ($resultSql as $reg):
            
            $partida = new Partida();  
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

    public function list() {
        $conn = conectar_db();

        $sql = PartidaDAO::SQL_PARTIDA . 
                " ORDER BY p.nomePartida";
        $stm = $conn->prepare($sql);    
        $stm->execute();
        $result = $stm->fetchAll();

        return $this->mapPartidas($result);
    }



    public function findById($idPartida) {
        $conn = conectar_db();

        $sql = PartidaDAO::SQL_PARTIDA. 
                " WHERE p.idPartida = ?";

        $stmt = $conn->prepare($sql);
        $stmt->execute([$idPartida]);
        $result = $stmt->fetchAll();

        //Criar o objeto Partida
        $partidas = $this->mapPartidas($result);

        if(count($partidas) == 1)
            return $partidas[0];
        elseif(count($partidas) == 0)
            return null;
    }


      public function savePartida(Partida $partida) {
        $conn = conectar_db();
    
        $sql = "INSERT INTO partida (nomePartida, limiteJogadores, senhaPartida, tempoPartida, statusPartida) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            $partida->getNomePartida(),
            $partida->getLimiteJogadores(),
            $partida->getSenha(),
            $partida->getTempoPartida(),
            $partida->getStatusPartida()
        ]);

        $idPartida = $conn->lastInsertId();
        $partida->setIdPartida($conn->lastInsertId());
        $this->saveEquipe($partida, $idPartida);
        $this->saveZona($partida, $idPartida);
    }

    public function saveEquipe(Partida $partida, $idPartida) {
        $conn = conectar_db();
        $equipes = $partida->getEquipes();

        foreach($equipes as $equipe){
        $sql = "INSERT INTO partida_equipe (idEquipe, idPartida) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            $equipe,
            $idPartida,
        ]);
        
    };
    return;
}
    public function findByLoginSenha(string $IdPartida, string $Senha) {
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

    public function enterRoom($IdPartida, $Senha){

            $partida = $this->findByLoginSenha($IdPartida, $Senha);

            if ($partida !== null) {
                return true;
            } else {
                return false;
            }
        }
        

    public function saveZona(Partida $partida, $idPartida) {
        $conn = conectar_db();
        $zonas = $partida->getZonas();

        foreach($zonas as $zona){
        $sql = "INSERT INTO partida_zona (idZona, idPartida) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            $zona,
            $idPartida,
        ]);
    
    };
}

    public function update(Planta $planta) {
        $conn = conectar_db();
    
        $sql = "UPDATE planta SET nomeSocial = ?, codQR = ?, codNumerico = ?, pontuacaoPlanta = ?, historia = ?, imagemPlanta = ?, idZona = ?, idEspecie = ?, idUsuario = ? WHERE idPlanta = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$planta->getNomeSocial(), $planta->getQrCode(), $planta->getCodNumerico(), 
        $planta->getPontos(), $planta->getPlantaHistoria(), $planta->getImagemPlanta(), $planta->getZona()->getIdZona(), $planta->getEspecie()->getIdEspecie(), $planta->getUsuario()->getIdUsuario(), $planta->getIdPlanta()]);
    }

    
    public function delete(Planta $planta) {
    $conn = conectar_db();
    

    $sql = "DELETE FROM planta WHERE idPlanta = ?";
    $arquivo_del = $planta->getImagemPlanta();
    if (file_exists($arquivo_del)) {
        unlink($arquivo_del);
    }
    $qrcode_del = $planta->getQrCode();
    if (file_exists($qrcode_del)) {
        unlink($qrcode_del);
    }
    $stmt = $conn->prepare($sql);
    $stmt->execute([$planta->getIdPlanta()]);
}

    public function deleteImage($idPlanta) {
    $plantaCont = new PlantaController();
    $planta = $plantaCont->buscarPorId($idPlanta);
    
    $img_del = $planta->getImagemPlanta();
    if (file_exists($img_del)) {
        unlink($img_del);
    }
}
}

?>