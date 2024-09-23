<?php
#Arquivo: conexao.php
#Finalidade: criar uma conexão com a base de dados
require __DIR__.'/../api/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../../');
$dotenv->load();
/*Verificar as variáveis globais abaixo para configurar 
a conexão com o banco de dados compatível com a sua máquina*/

function conectar_db() {

    $options = array(
        //Define o charset da conexão
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        //Define o tipo do erro como exceção
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        //Define o tipo de retorno do array de resultas
        //(campo => valor)
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);

    $str_conn = "mysql:host=" .$_ENV["HOST"]. ";dbname=" .$_ENV["NOME_BANCO"];
    
    try {
        $conn = new PDO($str_conn,
                    $_ENV["USUARIO"], $_ENV["SENHA"], $options);
    } catch(PDOException $e) {
        echo "Falha ao conectar na base de dados: " . $e->getMessage();
    }   

    return $conn;
}

?>
