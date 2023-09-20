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
        $usuarioLogin = $this->usuarioDAO->logon($usuario);
        $this->createSession($usuarioLogin);
    }

    public function createSession(Usuario $usuario) {

        session_start();
        $_SESSION['ID'] = $usuario->getIdUsuario();
        $_SESSION['NOME'] = $usuario->getNomeUsuario();
        $_SESSION['TIPO'] = $usuario->getTipoUsuario();
        $inPartida = $this->partidaDAO->usuarioInEquipe($_SESSION['ID']);
        if ($inPartida) {
            $_SESSION['PARTIDA'] = true;
            $_SESSION['PONTOS'] = $inPartida->getPontuacaoUsuario();
            $_SESSION['PLANTAS_LIDAS'] = explode(' | ', $inPartida->getPlantasLidas());
        } else {
        $_SESSION['PLANTAS_LIDAS'] = array();
        $_SESSION['PARTIDA'] = false;
        $_SESSION['PONTOS'] = 0;
        }
        
        $tipo = $usuario->getTipoUsuario();

              
       if($tipo == 1){
       header("location: ../home/indexJOG.php");
       }

       else{
       $_SESSION['TIPO'] = $usuario->getTipoUsuario();
       header("location: ../home/indexADM.php");
       }
            

   }

    public function entrarPartida($idPartida, $senha) {
        $bool = $this->partidaDAO->enterRoom($idPartida, $senha);
        if($bool) {
            $_SESSION['PARTIDA'] = true;
            return true;
        }
        else {
            return false;
        }
    }

    public function checarAdmPartida($idPartida, $idUsuario) {
        $partida = $this->partidaDAO->findById($idPartida);

        if($partida->getIdAdm() != $idUsuario) {
            header('location: ../home/acessonegado.php');
        }
    }

    public static function manterUsuario() {
        session_start();
    
        // Verifique se as variáveis de sessão estão definidas antes de acessá-las
        $nomeADM = isset($_SESSION['NOME']) ? $_SESSION['NOME'] : null;
        $idUser = isset($_SESSION['ID']) ? $_SESSION['ID'] : null;
        $tipoUsuario = isset($_SESSION['TIPO']) ? $_SESSION['TIPO'] : null;
        $arrayPlantas = isset($_SESSION['PLANTAS_LIDAS']) ? $_SESSION['PLANTAS_LIDAS'] : null ;
        $statusPartida = isset($_SESSION['PARTIDA']) ? $_SESSION['PARTIDA'] : null;
        $pontosJogador = isset($_SESSION['PONTOS']) ? $_SESSION['PONTOS'] : null;
    }

    public static function sair() {
        session_start();

        session_destroy();
        header("Location: ../home/index.php");   
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



