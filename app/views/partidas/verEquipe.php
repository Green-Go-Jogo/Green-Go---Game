<?php
include_once("../../controllers/LoginController.php");
LoginController::manterUsuario();
LoginController::verificarAcesso([1, 2, 3]);
include_once(__DIR__ . "/../../controllers/PartidaController.php");
include_once(__DIR__ . "/../../controllers/EquipeController.php");
include_once(__DIR__ . "/../../controllers/UsuarioController.php");
include_once(__DIR__ . "/htmlPartida.php");


$idEquipe = $_GET['ide'];

$idPartida = $_GET['idp'];

if (isset($_GET['error'])) {
    $error = $_GET['error'];
}

$usuarioCont = new UsuarioController();
$usuarios = $usuarioCont->buscarUsuarios($idEquipe, $idPartida);

$equipeCont = new EquipeController();
$equipe = $equipeCont->buscarPorId($idEquipe);

$partidaCont = new PartidaController();
$partida = $partidaCont->buscarPorId($idPartida);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title><?php echo $equipe->getNomeEquipe(); ?></title>
    <?php include_once("../../bootstrap/header.php"); ?>


</head>

<style>
    #titulo {
        color: #04574d;
        font-family: Poppins;
        margin-bottom: 30px;
        font-family: Poppins;
        margin-top: 15px;
        font-size: 60px;
    }


    .btn:hover {
        color: #f58c95;
        transform: scale(1.05);
        text-decoration: none;
    }

    body {
        background-color: #ebf0f1;
    }

    .sair {
        display: flex;
        flex-direction: column-reverse;
        align-items: center;
    }

    .fa-solid {
        font-size: 25px;
    }
</style>

</head>

<body>
    <nav>

        <?php LoginController::navBar($_SESSION['TIPO']); ?>
        <br>

    </nav>

    <h1 class="text-center" id="titulo"><?php echo $equipe->getNomeEquipe(); ?></h1>
    <br>
    <p class="text-center" style="color: #f58c95"><?php if (isset($error)) {
                                                        echo $error;
                                                    } ?>
    <p><br><br>

    <div id="conteudo">
        <?php PartidaHTML::desenhaEquipe($usuarios, $partida, $idEquipe); ?>

    </div>


    </div>

    <br>
    <br>
    <br>
    <a class="container sair" href="<?php echo "sairPartida.php?id=" . $_SESSION['ID']; ?>">
        <i class="fa-solid fa-person-running"></i>
        <p class="text-center">Sair da Partida</p>
    </a>
    <br>
    <br>


    <?php include_once("../../bootstrap/footer.php"); ?>
</body>

<script>
    function atualizarDados() {
        // Fazer uma requisição AJAX para atualizar os dados
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Atualizar o conteúdo da div com os novos dados
                document.getElementById("conteudo").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "atualizarEquipe.php?ide=<?php echo $idEquipe; ?>&idp=<?php echo $idPartida; ?>", true);
        xhttp.send();
    }

    // Chamar a função para atualizar os dados inicialmente ao carregar a página.
    atualizarDados();

    // Usar setInterval para chamar a função a cada x milissegundos.
    setInterval(atualizarDados, 12000); // Atualizar a cada segundo (1000 ms).
</script>

</html>