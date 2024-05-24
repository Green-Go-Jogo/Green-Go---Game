<?php
##Classe DAO para o model de zona

include_once(__DIR__ . "/../connection/Connection.php");
include_once(__DIR__ . "/../models/ZonaModel.php");
include_once(__DIR__."/../models/UsuarioModel.php");

class zonaDAO {
    private const SQL_ZONA = "SELECT * FROM zona z";
    private const SQL_ZONA_PARTIDA = "SELECT z.*".
    " FROM partida_zona pz".
    " JOIN zona z ON pz.idZona = z.idZona";

    private function mapZonas($resultSql) {
        $zonas = array();
        foreach ($resultSql as $reg):

            $zona = new Zona();
            $zona->setIdZona($reg['idZona']);
            $zona->setNomeZona($reg['nomeZona']);
            $zona->setQntdPlanta($reg['qntPlantas']);
            $zona->setPontosTotais($reg['pontoZona']);
            $zona->setUsuario($reg['idUsuario']);

            array_push($zonas, $zona);
        endforeach;

        return $zonas;
    }

    public function list() {
        $conn = conectar_db();

        $sql = "SELECT z.idZona, z.nomeZona, z.idUsuario, COUNT(p.idPlanta) AS qntPlantas, SUM(p.pontuacaoPlanta) AS pontoZona
        FROM zona z 
        LEFT JOIN planta p ON z.idZona = p.idZona 
        GROUP BY z.idZona, z.nomeZona
        ORDER BY z.idZona DESC";
        $stm = $conn->prepare($sql);    
        $stm->execute();
        $result = $stm->fetchAll();

        $zonas = array();
        foreach ($result as $reg):
            $zona = new Zona($reg['idZona'], $reg['nomeZona'], $reg['qntPlantas'], $reg['pontoZona'], $reg['idUsuario']);
            array_push($zonas, $zona);
        endforeach;

        return $zonas;
    }
    
    public function findById($idZona) {
        $conn = conectar_db();

        $sql = zonaDAO::SQL_ZONA . 
                " WHERE z.idZona = ?";

        $stmt = $conn->prepare($sql);
        $stmt->execute([$idZona]);
        $result = $stmt->fetchAll();

        //Criar o objeto stand
        $zonas = $this->mapZonas($result);

        if(count($zonas) == 1)
            return $zonas[0];
        elseif(count($zonas) == 0)
            return null;

        die("zonaDAO.findById - Erro: mais de um Zona".
                " encontrado para o ID ".$idZona);
    }

    public function listByPartida($idPartida) {
        $conn = conectar_db();

        $sql = ZonaDAO::SQL_ZONA_PARTIDA. 
                " WHERE pz.idPartida = ?";

        $stmt = $conn->prepare($sql);
        $stmt->execute([$idPartida]);
        $result = $stmt->fetchAll();

      

        //Criar o objeto Partida
        $zonas = $this->mapZonas($result);

        return $zonas; 
    }


    public function save(Zona $zona) {
        $conn = conectar_db();

        $sql = "INSERT INTO zona (nomeZona, idUsuario)".
        " VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$zona->getNomeZona(), $zona->getUsuario()]);
    }

    public function update(Zona $zona) {
        $conn = conectar_db();
    
        $sql = "UPDATE zona SET nomeZona = ?, idUsuario = ? WHERE idZona = ?";
        $stmtUpdate = $conn->prepare($sql);
        $stmtUpdate->execute([$zona->getNomeZona(), $zona->getUsuario(), $zona->getIdZona()]);
    }    

    public function updatePlanta(Zona $zona) {
        $conn = conectar_db();
    
        $sqlQntPlantas = "SELECT COUNT(p.idPlanta) FROM planta AS p WHERE p.ativo = 1 AND p.idZona = ?";
        $sqlPontoZona = "SELECT SUM(p.pontuacaoPlanta) FROM planta AS p WHERE p.ativo = 1 AND p.idZona = ?";
    
        $stmtQntPlantas = $conn->prepare($sqlQntPlantas);
        $stmtQntPlantas->execute([$zona->getIdZona()]);
        $qntPlantas = $stmtQntPlantas->fetchColumn();
    
        $stmtPontoZona = $conn->prepare($sqlPontoZona);
        $stmtPontoZona->execute([$zona->getIdZona()]);
        $pontoZona = $stmtPontoZona->fetchColumn();
    
        $sqlUpdate = "UPDATE zona SET qntPlantas = ?, pontoZona = ? WHERE idZona = ?";
        $stmtUpdate = $conn->prepare($sqlUpdate);
        $stmtUpdate->execute([$qntPlantas, $pontoZona, $zona->getIdZona()]);
    }

    
    public function delete(Zona $zona) {
    $conn = conectar_db();

    $sql = "DELETE FROM zona WHERE idZona = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$zona->getIdZona()]);
}
    
}
