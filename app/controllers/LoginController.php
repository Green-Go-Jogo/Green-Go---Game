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

    public function entrarPartida($idPartida, $senha) {
        $bool = $this->partidaDAO->enterRoom($idPartida, $senha);
        if($bool) {
            $this->manterPartida($idPartida);
            return true;
        }
        else {
            return false;
        }
    }


    public static function manterUsuario() {

    session_start();

    $nomeADM = $_SESSION['NOME']; 
    $idUser = $_SESSION['ID'];
    $tipoUsuario = $_SESSION['TIPO'];
    
    // $_SESSION['PARTIDA'] = 34;
    // $_SESSION['STATUS_PARTIDA'] = true;
    // $_SESSION["PONTOS"];
    
    }

    public static function manterPartida($idPartida) {

    $_SESSION['STATUS_PARTIDA'] = true;
    $_SESSION['PARTIDA'] = $idPartida;
    }



    public static function sair() {
        session_start();

        session_destroy();
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



