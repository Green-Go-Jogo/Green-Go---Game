<?php
#Classe de controller para planta

include_once(__DIR__."/../dao/PlantaDAO.php");
include_once(__DIR__."/../dao/ZonaDAO.php");

class PlantaController {

    private $plantaDAO;
    private $zonaDAO;

    public function __construct() {
        $this->plantaDAO = new PlantaDAO();
        $this->zonaDAO = new ZonaDAO();
    }

    public function listar() {
        return $this->plantaDAO->list();
    }

    public function buscarPorId($idPlanta) {
        return $this->plantaDAO->findById($idPlanta);
    }

    public function buscarPorCodigo($CodNumerico) {
        return $this->plantaDAO->findByCod($CodNumerico);
    }

    public function gerarCodigo() {
        return $this->plantaDAO->gerarCodigoAleatorio();
    }

    public function salvar($planta) {
        $this->plantaDAO->save($planta);
        $this->zonaDAO->updatePlanta($planta->getZona());
    }

    public function atualizar($planta) {
        $this->plantaDAO->update($planta);
        $this->zonaDAO->updatePlanta($planta->getZona());
    }

    public function excluir($planta) {
        $this->plantaDAO->delete($planta);
        $this->zonaDAO->updatePlanta($planta->getZona());
    }

    public function apagarImagem($idPlanta) {
        $this->plantaDAO->deleteImage($idPlanta);
    }

    public function filtrar(Array $caracteristicas, string $busca, array $ADMs) {
        return $this->plantaDAO->filter($caracteristicas, $busca, $ADMs);        
     }
}

?>



