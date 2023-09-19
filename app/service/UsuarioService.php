<?php


$nomeUsuario = $_POST["field_nome"];
$login = $_POST['field_login'];
$email = $_POST['field_email'];
$senha = $_POST['field_password'];
$senhaConf = $_POST['field_password_conf'];
$genero = $_POST['field_genero'];
$escolaridade = $_POST['field_escolaridade'];

$erroCampo1 = '';
$erroCampo2 = '';
$erroCampo3 = '';
$erroCampo4 = '';
$erroCampo5 = '';
$erroCampo6 = '';
$erroCampo7 = '';

if (empty($nomeUsuario) || strlen($nomeUsuario) < 8) {
    $erroCampo1 = "O campo Nome Completo deve ter pelo menos 8 caracteres.";
} 

if (empty($login) || strlen($login) < 4) {
    $erroCampo2 = "O campo Nome de usuário deve ter pelo menos 4 caracteres.";
} 

if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $erroCampo3 = "O campo E-mail deve ser um e-mail válido.";
}

if (empty($senha) || !preg_match('/^(?=.*[a-zA-Z])(?=.*\d).+$/', $senha)) {
    $erroCampo4 = "A senha deve conter pelo menos uma letra e um número.";
} else if ($senha !== $senhaConf) {
    $erroCampo4 = "As senhas não correspondem."; 
}

if (empty($senhaConf)) {
    $erroCampo5 = "O campo Confirmação de Senha é obrigatório.";
} else if ($senhaConf !== $senha) {
    $erroCampo5 = "As senhas não correspondem."; 
}

if (empty($genero)) {
    $erroCampo6 = "O campo Genêro é obrigatório";
}

if (empty($escolaridade)) {
    $erroCampo7 = "O campo Escolaridade é obrigatório";
}

$respostaCampo1 = $erroCampo1 ? $erroCampo1 : "";
$respostaCampo2 = $erroCampo2 ? $erroCampo2 : "";
$respostaCampo3 = $erroCampo3 ? $erroCampo3 : "";
$respostaCampo4 = $erroCampo4 ? $erroCampo4 : "";
$respostaCampo5 = $erroCampo5 ? $erroCampo5 : "";
$respostaCampo6 = $erroCampo6 ? $erroCampo6 : "";
$respostaCampo7 = $erroCampo7 ? $erroCampo7 : "";

  $respostas = array("campo1" => $respostaCampo1, "campo2" => $respostaCampo2, 
  "campo3" => $respostaCampo3,
  "campo4" => $respostaCampo4,
  "campo5" => $respostaCampo5,
  "campo6" => $respostaCampo6,
  "campo7" => $respostaCampo7
);
  
  echo json_encode($respostas);
  ?>