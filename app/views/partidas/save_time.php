<?php
if (isset($_POST['timeType']) && isset($_POST['timestamp'])) {
    $timeType = $_POST['timeType'];
    $timestamp = $_POST['timestamp'];
    $idPartida = $_POST['partidaId'];
    
    include_once(__DIR__."/../../connection/Connection.php");
    
    include_once(__DIR__."/../../controllers/PartidaController.php");
    
    $partCont = new PartidaController;

    $conn = conectar_db();
    
    if ($timeType === 'startTime') {

        $dateTime = new DateTime('@' . $timestamp);

        $timeZone = new DateTimeZone('America/Sao_Paulo');
        $dateTime->setTimezone($timeZone);

        $formattedTimestamp = $dateTime->format('Y-m-d H:i:s');
        $sql = "UPDATE partida SET dataInicio = ? WHERE idPartida = ?";
    } 
    
    elseif ($timeType === 'endTime') {

    $dateTime = new DateTime('@' . $timestamp);

    $timeZone = new DateTimeZone('America/Sao_Paulo');
    $dateTime->setTimezone($timeZone);

    $formattedTimestamp = $dateTime->format('Y-m-d H:i:s');
        $sql = "UPDATE partida SET dataFim = ? WHERE idPartida = ?";
        $partCont->salvarPontuacaoEquipe();

    } else {
        echo "Erro: Tipo de tempo inválido";
        exit;
    }
    
    $stmt = $conn->prepare($sql);
    
    if ($stmt->execute([$formattedTimestamp, $idPartida])) {
        echo "Tempo salvo com sucesso";
    } else {
        echo "Erro ao salvar tempo: " . $stmt->errorInfo()[2];
    }
} else {
    echo "Erro: Parâmetros ausentes";
}




?>
