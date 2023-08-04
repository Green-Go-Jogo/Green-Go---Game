<?php
#Classe DAO para o model de personagem

#Classe DAO para o model de Personagem

include_once(__DIR__."/../connection/Connection.php");
include_once(__DIR__."/../models/EquipeModel.php");
include_once(__DIR__."/../models/ZonaModel.php");
include_once(__DIR__."/../models/PartidaModel.php");
include_once(__DIR__."/../models/UsuarioModel.php");

class PartidaDAO {

    private const SQL_PARTIDA = "SELECT p.*, pz.idPartidaZona, pe.idPartidaEquipe FROM partida p"
    ."LEFT JOIN partida_zona pz ON pz.idPartida = p.idPartida"."LEFT JOIN" ." partida_equipe pe ON pe.idPartida = p.idPartida";

    private function mapPartidas($resultSql) {
            $partidas = array();
            foreach ($resultSql as $reg):
            
            $partida = new partida();  
            $partida->setIdPartida($reg['idpartida']);

            $equipe = new Equipe($reg['idEspecie'], $reg['nomePop']);
            $partida->setEspecie($especie);

            $zona = new Zona($reg['idZona'], $reg['nomeZona']);
            $partida->setZona($zona);

            $usuario = new Usuario($reg['idUsuario'], $reg['nomeUsuario']);
            $partida->setUsuario($usuario);

            array_push($partidas, $partida);
        endforeach;

        return $partidas;
    
}

    public function list() {
        $conn = conectar_db();

        $sql = PartidaDAO::SQL_PARTIDA . 
                " ORDER BY p.nomeSocial";
        $stm = $conn->prepare($sql);    
        $stm->execute();
        $result = $stm->fetchAll();

        return $this->mapPlantas($result);
    }


    public function findById($idPlanta) {
        $conn = conectar_db();

        $sql = PlantaDAO::SQL_PLANTA . 
                " WHERE p.idPlanta = ?";

        $stmt = $conn->prepare($sql);
        $stmt->execute([$idPlanta]);
        $result = $stmt->fetchAll();

        //Criar o objeto Planta
        $plantas = $this->mapPlantas($result);

        if(count($plantas) == 1)
            return $plantas[0];
        elseif(count($plantas) == 0)
            return null;

        die("PlantaDAO.findById - Erro: mais de uma planta".
                " encontrado para o ID ".$idPlanta);
    }

    public function findByCod($CodNumerico) {
        $conn = conectar_db();

        $sql = PlantaDAO::SQL_PLANTA . 
                " WHERE p.codNumerico = ?";

        $stmt = $conn->prepare($sql);
        $stmt->execute([$CodNumerico]);
        $result = $stmt->fetchAll();

        //Criar o objeto Codigos
        $plantas = $this->mapPlantas($result);

        if(count($plantas) == 1)
            return $plantas[0];
        elseif(count($plantas) == 0)
            return null;

        die("PlantaDAO.findByCod - Erro: mais de um codigo".
                " encontrado para o ID ".$CodNumerico);
    }

    public function gerarCodigoAleatorio() {
        $conn = conectar_db();

        $sql = PlantaDAO::SQL_PLANTA . 
        " WHERE codNumerico = :codNumerico";

        $numeros = mt_rand(1000, 9999); // Gera um número aleatório de 4 dígitos
    
        // Verifica se o número já existe no banco de dados
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':codNumerico', $numeros);
        $stmt->execute();
    
        $count = $stmt->fetchColumn();
    
        if ($count > 0) {
          // Se o número já existir, gera um novo número chamando recursivamente a função
          return self::gerarCodigoAleatorio();
        }
    
        return $numeros;
      }
    

      public function savePartida(Partida $partida) {
        $conn = conectar_db();
    
        $sql = "INSERT INTO partida (nomePartida, limiteJogadores, senhaPartida, tempoPartida) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            $partida->getNomePartida(),
            $partida->getLimiteJogadores(),
            $partida->getSenha(),
            $partida->getTempoPartida()
        ]);
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