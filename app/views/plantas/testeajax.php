<?php


$pontuacao = $_POST['Pontuacao'];
$zonaSelecionada = $_POST['zona_planta'];
$especieSelecionada = $_POST['especie_planta'];

$erroCampo1 = '';
$erroCampo2 = '';
$erroCampo3 = '';
$erroCampo4 = '';
$erroCampo5 = '';


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


$respostaCampo2 = $erroCampo2 ? $erroCampo2 : "";
$respostaCampo3 = $erroCampo3 ? $erroCampo3 : "";
$respostaCampo4 = $erroCampo4 ? $erroCampo4 : "";

  $respostas = array("campo2" => $respostaCampo2, 
  "campo3" => $respostaCampo3,
  "campo4" => $respostaCampo4);
  
  echo json_encode($respostas);
  ?>