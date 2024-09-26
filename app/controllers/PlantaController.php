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

    public function salvar($planta, $idQuestoes) {
        $this->plantaDAO->save($planta, $idQuestoes);
        $this->zonaDAO->updatePlanta($planta->getZona());
    }

    public function atualizar($planta, $questoes) {
        $this->plantaDAO->update($planta, $questoes);
        $this->zonaDAO->updatePlanta($planta->getZona());
    }

    public function excluir($planta) {
        $this->plantaDAO->delete($planta);
        $this->zonaDAO->updatePlanta($planta->getZona());
    }

    public function excluirPlantasDaEspecie($especie) {
        $plantas = [];
        $plantas = $this->plantaDAO->listByEspecie($especie);
        

        foreach($plantas as $planta) {
            $this->zonaDAO->updatePlanta($planta->getZona());
            $this->excluir($planta);
        }  
    }
    public function excluirPlantasDaZona(Zona $zona) {
        $plantas = [];
        $plantas = $this->plantaDAO->listByZona($zona->getIdZona());

        foreach($plantas as $planta) {
            $this->zonaDAO->updatePlanta($planta->getZona());
            $this->excluir($planta);
        }  
    }

    public function apagarImagem($idPlanta) {
        $this->plantaDAO->deleteImage($idPlanta);
    }

    public function filtrar(Array $caracteristicas, string $busca, array $ADMs, array $zonas) {
        return $this->plantaDAO->filter($caracteristicas, $busca, $ADMs, $zonas);        
     }

     public function pegarArrayIdsZona($idZona){
        $plantasId = array();
        $plantas = $this->plantaDAO->listByZona($idZona);

        foreach($plantas as $planta) {
         $plantasId[] = $planta->getIdPlanta();   
        }
        
        return $plantasId;
     }
}

?>



