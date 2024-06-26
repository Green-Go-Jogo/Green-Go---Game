<?php
include_once(__DIR__ . "/../../models/PartidaModel.php");
include_once(__DIR__ . "/../../models/ZonaModel.php");
include_once(__DIR__ . "/../../models/EquipeModel.php");
include_once(__DIR__ . "/../../controllers/PartidaController.php");

//Capturar os valores vindos do formulário
$idUsuario = $_POST["id_usuario"];
$nomePartida = $_POST["Nome_Partida"];
$limiteJogadores = $_POST['Limite_Jogadores'];
$tempoPartida = $_POST['Tempo_Partida'];
$senhaSala = $_POST['Senha_Sala'];
$senhaSalaConf = $_POST['ConfSenha_Sala'];

$zonas = array();
$equipes = array();
$errors = array();

foreach ($_POST as $name => $value) {
    if (strpos($name, 'zona_') === 0) {
        $zonas[] = $value;
    } elseif (strpos($name, 'equipe_') === 0) {
        $equipes[] = $value;
    }
}


if (strlen($nomePartida) <= 3) {
    $errors['Nome_Partida'] = "O nome da partida deve ter mais que 3 caracteres.";
}

if (!ctype_digit($limiteJogadores) || $limiteJogadores == '00' || strlen($limiteJogadores) > 2) {
    $errors['Limite_Jogadores'] = "O limite de jogadores pode ir até 99 e não pode ser 0.";
}

if (!ctype_digit($tempoPartida) || $tempoPartida < 1 || strlen($tempoPartida) > 3) {
    $errors['Tempo_Partida'] = "O tempo de partida pode ir até 999 minutos e não pode ser menor que 1 minutos.";
}

if (strlen($senhaSala) <= 3) {
    $errors['Senha_Sala'] = "A senha da sala deve ter mais que 3 caracteres.";
}

if ($senhaSala !== $senhaSalaConf) {
    $errors['ConfSenha_Sala'] = "A confirmação e a senha devem ser iguais.";
}

if (empty($zonas)) {
    $errors['Zona'] = "A partida deve conter ao menos uma zona.";
}

if (empty($equipes)) {
    $errors['Equipe'] = "A partida deve conter ao menos uma equipe.";
}

if (!empty($errors)) {
    $errors['zonas'] = $zonas;
    $errors['equipes'] = $equipes;
    require_once("adicionarPartida.php");
    exit;
}

$partida = new Partida();
$partida->setIdAdm($idUsuario);
$partida->setNomePartida($nomePartida);
$partida->setLimiteJogadores($limiteJogadores);
$partida->setSenha($senhaSala);
$partida->setTempoPartida($tempoPartida);
$partida->setZonas($zonas);
$partida->setEquipes($equipes);



$partidaCont = new PartidaController();
$partidaCont->salvarPartida($partida);

$idPartidaInserida = $partida->getIdPartida();
header("Location: PartidaADM.php?id=" . $idPartidaInserida);
