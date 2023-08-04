<?php
#Classe de controller para partida

include_once(__DIR__."/../dao/PartidaDAO.php");

class PartidaController {

    private $partidaDAO;

    public function __construct() {
        $this->partidaDAO = new PartidaDAO();
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

    public function salvarPartida($partida) {
        $this->partidaDAO->savePartida($partida);
    }

    public function atualizar($planta) {
        $this->plantaDAO->update($planta);
    }

    public function excluir($planta) {
        $this->plantaDAO->delete($planta);
    }

    public function apagarImagem($idPlanta) {
        $this->plantaDAO->deleteImage($idPlanta);
    }
}

?>



