<?php
include_once(__DIR__."/../../models/PartidaModel.php");
include_once(__DIR__."/../../models/ZonaModel.php");
include_once(__DIR__."/../../models/EquipeModel.php");
include_once(__DIR__."/../../controllers/PartidaController.php");

//Capturar os valores vindos do formulário
$nomePartida = $_POST["Nome_Partida"];
$limiteJogadores = $_POST['Limite_Jogadores'];
$tempoPartida = $_POST['Tempo_Partida'];
$senhaSala = $_POST['Senha_Sala'];
$senhaSalaConf = $_POST['ConfSenha_Sala'];

$zonas = array();
$equipes = array();

foreach ($_POST as $name => $value) {
  if (strpos($name, 'zona_') === 0) {
      $zonas[] = $value;
  } elseif (strpos($name, 'equipe_') === 0) {
      $equipes[] = $value;
  }
}

    print_r($zonas); 
    print_r($equipes); 
    echo $nomePartida;
    echo $limiteJogadores;
    echo $tempoPartida;
    echo $senhaSala;
    echo $senhaSalaConf;

$partida = new Partida();
$partida->setNomePartida($nomePartida);
$partida->setLimiteJogadores($limiteJogadores);
$partida->setSenha($senhaSala);
$partida->setTempoPartida($tempoPartida);

$partidaCont = new PartidaController();
$partidaCont->salvarPartida($partida);

//Redireciona para o início
header("location: listPlantas.php");

  
    ?>