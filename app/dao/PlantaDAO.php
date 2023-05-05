<?php
#Classe DAO para o model de personagem

#Classe DAO para o model de Personagem

include_once(__DIR__."/../connection/Connection.php");
include_once(__DIR__."/../models/EspecieModel.php");
include_once(__DIR__."/../models/ZonaModel.php");
include_once(__DIR__."/../models/PlantaModel.php");

class PlantaDAO {

    private const SQL_PLANTA = "SELECT p.*, e.idEspecie, e.nomePop, z.nomeZona FROM planta p".
    " JOIN zona z ON z.idZona = p.idZona". " JOIN especie e ON e.idEspecie = p.idEspecie";

    private function mapPlantas($resultSql) {
            $plantas = array();
            foreach ($resultSql as $reg):
            
            $planta = new Planta();  
            $planta->setIdPlanta($reg['idPlanta']);
            $planta->setNomeSocial($reg['nomeSocial']);
            $planta->setPontos($reg['pontuacaoPlanta']);
            $planta->setImagemPlanta($reg['imagemPlanta']);
            $planta->setCodNumerico($reg['codNumerico']);
            $planta->setPlantaHistoria($reg['historia']);

            $especie = new Especie($reg['idEspecie'], $reg['nomePop']);
            $planta->setEspecie($especie);

            $zona = new Zona($reg['idZona'], $reg['nomeZona']);
            $planta->setZona($zona);
            array_push($plantas, $planta);
        endforeach;

        return $plantas;
    
}

    public function list() {
        $conn = conectar_db();

        $sql = PlantaDAO::SQL_PLANTA . 
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

        die("PersonagemDAO.findById - Erro: mais de um personagem".
                " encontrado para o ID ".$idPlanta);
    }


    public function save(Planta $planta) {
        $conn = conectar_db();

        $sql = "INSERT INTO planta (nomeSocial, codNumerico, pontuacaoPlanta, historia, imagemPlanta, idZona, idEspecie)".
        " VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$planta->getNomeSocial(), $planta->getCodNumerico(), 
                        $planta->getPontos(), $planta->getPlantaHistoria(), $planta->getImagemPlanta(), $planta->getZona()->getIdZona(), $planta->getEspecie()->getIdEspecie()]);
    }

    public function update(Planta $planta) {
        $conn = conectar_db();
    
        $sql = "UPDATE planta SET nomeSocial = ?, codNumerico = ?, pontuacaoPlanta = ?, historia = ?, imagemPlanta = ?, idZona = ?, idEspecie = ? WHERE idPlanta = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$planta->getNomeSocial(), $planta->getCodNumerico(), 
        $planta->getPontos(), $planta->getPlantaHistoria(), $planta->getImagemPlanta(), $planta->getZona()->getIdZona(), $planta->getEspecie()->getIdEspecie(), $planta->getIdPlanta()]);
    }

    
    public function delete(Planta $planta) {
    $conn = conectar_db();
    

    $sql = "DELETE FROM planta WHERE idPlanta = ?";
    $arquivo_del = $planta->getImagemPlanta();
    if (file_exists($arquivo_del)) {
        unlink($arquivo_del);
    }
    $stmt = $conn->prepare($sql);
    $stmt->execute([$planta->getIdPlanta()]);
}
    
}

?>