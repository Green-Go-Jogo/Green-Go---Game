<?php

include_once(__DIR__."/../../connection/Connection.php");

$conexao = conectar_db();

$email = $_POST['email'];
$senha = $_POST['senha'];

if(isset($_POST['email']) && isset($_POST['senha'])) {
    
    
    $query = "SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha'";
    $stmt = $conexao->prepare($query);
    $stmt->execute();

    $num = $stmt->rowCount();
    
    if($num == 1){
        while ($percorrer = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Manipule os dados conforme necessário
            $tipo = $percorrer['tipoUsuario'];
            $nome = $percorrer['nomeUsuario'];
            $id = $percorrer['idUsuario'];

            session_start();
            if($tipo == 2){
                $_SESSION['id'] = $id;
                $_SESSION['adm'] = $nome;
                header("location: ../home/indexADM.php");
            }
            else if($tipo == 1){
                $_SESSION['normal'] = $nome;
                header("location: ../home/indexJOG.php");
            }
            else if($tipo == 3){
                echo "professor";
            }
        }
    }
    else {
        $aviso = "E-mail ou Senha incorretos!!!";
        header('location: login.php?aviso=' . urlencode($aviso));
        exit;
    }
}