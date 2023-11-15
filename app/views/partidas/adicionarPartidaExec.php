<?php
include_once(__DIR__."/../../models/PartidaModel.php");
include_once(__DIR__."/../../models/ZonaModel.php");
include_once(__DIR__."/../../models/EquipeModel.php");
include_once(__DIR__."/../../controllers/PartidaController.php");

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


if (strlen($nomePartida) <= 4) {
    $errors['Nome_Partida'] = "Erro: Nome da Partida deve ter mais que 4 caracteres.";
}

// Verificação do Limite de Jogadores
if (!ctype_digit($limiteJogadores) || $limiteJogadores == '00' || strlen($limiteJogadores) > 2) {
    $errors['Limite_Jogadores'] = "Erro: Limite de Jogadores deve ter até no máximo 2 dígitos numéricos e não pode ser 00.";
}

if (!ctype_digit($tempoPartida) || $tempoPartida < 5 || strlen($tempoPartida) > 3) {
    $errors['Tempo_Partida'] = "Erro: Tempo de Partida pode ter até 3 dígitos numéricos e não pode ser menos que 5.";
    
}

if (strlen($senhaSala) <= 4 || $senhaSala !== $senhaSalaConf) {
    $errors['Senha_Sala'] = "Erro: Senha da Sala deve ter mais que 4 caracteres e a confirmação deve ser igual à senha.";

}

if (empty($zonas) || empty($equipes)) {
    $errors['Equipe_Zona'] = "Erro: Zonas e Equipes não podem estar vazias.";
}

if (!empty($errors)) {
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
  
    ?>