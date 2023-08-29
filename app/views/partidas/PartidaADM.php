<?php
include_once(__DIR__."/../../controllers/PartidaController.php");
include_once(__DIR__."/../../controllers/ZonaController.php");
include_once(__DIR__."/../../controllers/EquipeController.php");
include_once(__DIR__."/htmlPartida.php");

$partidaCont = new PartidaController();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    echo "ID não encontrado na URL.";
}

$partidas = $partidaCont->buscarPorId($_GET['id']); 



?>
<?php include_once("../../controllers/LoginController.php");
LoginController::manterUsuario();
LoginController::verificarAcesso([2, 3]);
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title>Espécies</title>
    <?php include_once("../../bootstrap/header.php");?>


</head>



    <style>
    .btn:hover {
        color:#f58c95;
        transform: scale(1.05);
        text-decoration: none;
    }

    body {
        background-color: #ebf0f1;
    }
    .zonaP {
    float: right; /* Alinha a div à direita */
    /* Você pode adicionar mais estilos conforme necessário */
}

.custom-container {
    display: flex;
}

.custom-div {
    padding: 10px;
    position: relative; /* Habilita o posicionamento relativo */
    top: -50px; /* Ajuste conforme necessário para posicionar acima da tabela */
    left: 1200px; /* Ajuste conforme necessário para posicionar à direita */
    /* Você pode ajustar top, right, bottom, left conforme necessário */
}
    </style>

</head>
<body>
<nav>

<?php include_once("../../bootstrap/navADM.php");?>
<br>

</nav>


    
  <h1 class="text-center primeirotextoreg">PARTIDAS</h1>
  <br><br><br>
  <?php echo "<a href='editarPartida.php?id=".$id."' class='btn btn-primary editar'>Editar</a>"; ?>
  <br><br>
<div id="counter">00:00:00</div>
    <button onclick="inicia()">Iniciar</button>

        <?php 
            PartidaHTML::desenhaPartidaZona($partidas);
        ?>

</div>
</div>

        <?php 
            PartidaHTML::desenhaPartidaEquipe($partidas);
        ?>

</div>
<br>
<br>
<br>
<br>
<br>
<?php include_once("../../bootstrap/footer.php");?>
</body>

<script>
var segundos = 0;
var interval;
var contadorAtivo = false;

// Pega o valor do ID da URL
var urlParams = new URLSearchParams(window.location.search);
var id = urlParams.get('id');

function atualizaContador() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "atualiza_contador.php?id=" + id, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            document.getElementById("counter").innerHTML = xhr.responseText;
        }
    };
    xhr.send();
}

function inicia() {
    if (!contadorAtivo) {
        interval = setInterval(atualizaContador, 1000); // Chamada a cada 1 segundo
        contadorAtivo = true;
    }
}

function para() {
    clearInterval(interval);
    contadorAtivo = false;
}

function zera() {
    clearInterval(interval);
    segundos = 0;
    document.getElementById("counter").innerHTML = "00:00:00";
    contadorAtivo = false;
}

        
    </script>
</html>