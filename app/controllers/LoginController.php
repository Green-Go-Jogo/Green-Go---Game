<?php
#Classe de controller para especie

include_once(__DIR__."/../dao/UsuarioDAO.php");

class LoginController {

    private $usuarioDAO;

    public function __construct() {
        $this->usuarioDAO = new UsuarioDAO();
    }

    public function listar() {
        return $this->usuarioDAO->list();
    }

    public function buscarPorId($idUsuario) {
        return $this->usuarioDAO->findById($idUsuario);
    }

    public function salvar($usuario) {
        $this->usuarioDAO->save($usuario);
    }

    public function atualizar($usuario) {
        $this->usuarioDAO->update($usuario);
    }

    public function excluir($usuario) {
        $this->usuarioDAO->delete($usuario);
    }
}

?>



