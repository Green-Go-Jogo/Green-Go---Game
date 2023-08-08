<?php
#Classe de controller para especie

include_once(__DIR__."/../dao/UsuarioDAO.php");

class LoginController {

    private $usuarioDAO;

    public function __construct() {
        $this->usuarioDAO = new UsuarioDAO();
    }

    public function logar($usuario) {
        $this->usuarioDAO->logon($usuario);
    }

    public static function manterUsuario() {

    session_start();

    $nomeADM = $_SESSION['NOME']; 
    $idADM = $_SESSION['ID'];
    $tipoUsuario = $_SESSION['TIPO'];
    
    }

    public static function sair() {
        session_start();

session_destroy();
header("Location: login.php");   
    }
    
    
}

?>



