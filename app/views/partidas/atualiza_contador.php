<?php
include_once(__DIR__."/../../controllers/PartidaController.php");


session_start();


  

function buscarPartida($id) {
    $partidaCont = new PartidaController();
    $partidas = $partidaCont->buscarPorId($id); 

    $processedPartidaTimes = array();
    $primeiroTempoPartida = null; // Definir como nulo inicialmente

    foreach ($partidas as $partida) {
        $horaInicio = $partida->getDataInicio();
        $tempoPartida = $partida->getTempoPartida();

        $registro = "$horaInicio-$tempoPartida";

        if (!in_array($registro, $processedPartidaTimes)) {
            $processedPartidaTimes[] = $registro;

            // Armazenar o primeiro valor de tempo de partida encontrado
            if ($primeiroTempoPartida === null) {
                $primeiroTempoPartida = $tempoPartida;
            }
        }
    }

    return $primeiroTempoPartida; // Retornar o primeiro valor encontrado
}


function formatatempo($segs) {
    $min = 0;
    $hr = 0;

    while ($segs >= 60) {
        $segs -= 60;
        $min++;
    }

    while ($min >= 60) {
        $min -= 60;
        $hr++;
    }

    $hr = str_pad($hr, 2, '0', STR_PAD_LEFT);
    $min = str_pad($min, 2, '0', STR_PAD_LEFT);
    $segs = str_pad($segs, 2, '0', STR_PAD_LEFT);

    $fin = $hr . ":" . $min . ":" . $segs;
    return $fin;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
$primeiroTempoPartida = buscarPartida($id) * 60;
}

$tempoTotal = isset($primeiroTempoPartida) ? intval($primeiroTempoPartida) : 0; // Tempo total em segundos (5 minutos)
if (!isset($_SESSION['TEMPO_PARTIDA'])) {
    $_SESSION['TEMPO_PARTIDA'] = $tempoTotal;
} else {
    $_SESSION['TEMPO_PARTIDA']--;
}

echo formatatempo($_SESSION['TEMPO_PARTIDA']);

    ?>







