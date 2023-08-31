<?php
#Classe de controller para partida

include_once(__DIR__."/../dao/PartidaDAO.php");
include_once(__DIR__."/../dao/EquipeDAO.php");
include_once(__DIR__."/../dao/ZonaDAO.php");

class PartidaController {

    private $partidaDAO;
    private $equipeDAO;
    private $zonaDAO;

    public function __construct() {
        $this->partidaDAO = new PartidaDAO();
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

    public function salvarUsuarioEquipe($idEquipe) {
        $idUsuario = $_SESSION["ID"];
        $inEquipe = $this->partidaDAO->usuarioInEquipe($idUsuario);

        if($inEquipe){
        $error = "Você já pertence a uma equipe!";
        return $error;
    } else {
        $this->partidaDAO->saveUsuarioEquipe($idEquipe, $idUsuario);
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



