<?php
#Arquivo para executar a exclusão de um Personagem

include_once("../../controllers/ZonaController.php");

$idZona = $_GET["id"];

$zonaCont = new ZonaController();
$zona = $zonaCont->buscarPorId($idZona);

if ($zona != null) {

    try {
        $zonaCont->excluir($zona);
    } catch (PDOException $e) {
        header("Location: ../home/erro.php");
        exit;
    }

    header("location: listZonas.php");
} else {
    echo "O zona de ID " . $idZona . " não existe.";
    echo "<br>";
    echo "<a href='index.php'>Voltar</a>";
}
