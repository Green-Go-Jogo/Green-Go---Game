<?php
#Classe de controller para Zona

include_once(__DIR__ . "/../dao/ZonaDAO.php");
include_once(__DIR__ . "/../dao/PlantaDAO.php");

class ZonaController {

    private $zonaDAO;
    private $plantaDAO;

    public function __construct() {
        $this->zonaDAO = new ZonaDAO();
        $this->plantaDAO = new PlantaDAO();
    }

    public function listar() {
        $zonaDAO = new ZonaDAO();
        return $zonaDAO->list();
    }

    public function buscarPorId($idZona) {
        return $this->zonaDAO->findById($idZona);
    }

    public function buscarPlantasZona($idZona) {
        return $this->plantaDAO->listByZona($idZona);
    }

    public function salvar($zona) {
        $this->zonaDAO->save($zona);
    }

    public function atualizar($zona) {
        $this->zonaDAO->update($zona);
    }

    public function excluir($zona) {
        $this->zonaDAO->delete($zona);
    }
}
