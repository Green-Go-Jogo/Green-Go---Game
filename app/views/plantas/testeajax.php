<?php


$nomeSocial = $_POST['Nome_Social'];
$pontuacao = $_POST['Pontuacao'];
$zonaSelecionada = $_POST['zona_planta'];
$especieSelecionada = $_POST['especie_planta'];
$historia = $_POST['Historia'];

$erroCampo1 = '';
$erroCampo2 = '';
$erroCampo3 = '';
$erroCampo4 = '';
$erroCampo5 = '';

if (empty($nomeSocial)) {
    $erroCampo1 = "O campo Nome Social é obrigatório.";
} elseif (!preg_match('/^[a-zA-ZÀ-ÖØ-öø-ÿ\s\-]+$/', $nomeSocial)) {
    $erroCampo1 = "O campo Nome Social contém caracteres especiais.";
}

if (empty($pontuacao)) {
    $erroCampo4 = "O campo Pontuação é obrigatório!";
} elseif (!preg_match('/^\d{2}$/', $pontuacao)) {
    $erroCampo4 = "O campo Pontuação deve conter 2 ou menos dígitos!";
}

if (empty($zonaSelecionada)) {
    $erroCampo2 = "O campo Zona é obrigatório";
}

if (empty($especieSelecionada)) {
    $erroCampo3 = "O campo Espécie é obrigatório";
}

if (empty($historia)) {
    $erroCampo5 = "O campo Historia é obrigatório";
}

$respostaCampo1 = $erroCampo1 ? $erroCampo1 : "";
$respostaCampo2 = $erroCampo2 ? $erroCampo2 : "";
$respostaCampo3 = $erroCampo3 ? $erroCampo3 : "";
$respostaCampo4 = $erroCampo4 ? $erroCampo4 : "";
$respostaCampo5 = $erroCampo5 ? $erroCampo5 : "";

  $respostas = array("campo1" => $respostaCampo1, "campo2" => $respostaCampo2, 
  "campo3" => $respostaCampo3,
  "campo4" => $respostaCampo4,
  "campo5" => $respostaCampo5);
  
  echo json_encode($respostas);
  ?>