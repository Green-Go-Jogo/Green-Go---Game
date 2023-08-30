<?php
#Classe de controller para especie

include_once(__DIR__."/../dao/UsuarioDAO.php");
include_once(__DIR__."/../dao/PartidaDAO.php");

class LoginController {

    private $usuarioDAO;
    private $partidaDAO;

    public function __construct() {
        $this->usuarioDAO = new UsuarioDAO();
        $this->partidaDAO = new PartidaDAO();
    }

    public function logar($usuario) {
        $this->usuarioDAO->logon($usuario);
    }

    public function entrarPartida($IdPartida, $senha) {
        return $this->partidaDAO->enterRoom($IdPartida, $senha);
    }


    public static function manterUsuario() {

    session_start();

    $nomeADM = $_SESSION['NOME']; 
    $idADM = $_SESSION['ID'];
    $tipoUsuario = $_SESSION['TIPO'];
    
    }

    public static function sair() {
        session_start();

        session_write_close();
        header("Location: login.php");   
    }
    
    public static function verificarAcesso($allowedTypes) {

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    
        if (!isset($_SESSION['ID'])) { 
            $nologin = "Você precisa se conectar primeiro!";
            header('location: ../users/login.php?aviso=' . urlencode($nologin));;
            exit;
        }
    
        $tipoUsuario = $_SESSION['TIPO'];
    
        if (!in_array($tipoUsuario, $allowedTypes)) {
            header("location: ../home/erro.php");
            exit;
        }
    }

   public static function navBar ($tipoUsuario) {

    if ($tipoUsuario == 2){
        include_once("../../bootstrap/navADM.php");
    }

    else if ($tipoUsuario == 3){
        include_once("../../bootstrap/navADM.php");
    }

    else if ($tipoUsuario == 1){
        include_once("../../bootstrap/navJog.php");
    }

    else {
        include_once("../../bootstrap/nav.php");
    }

   }
    
}

?>



