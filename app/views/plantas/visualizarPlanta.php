<?php
include_once("../../controllers/PlantaController.php");
include_once("../../controllers/ZonaController.php");
include_once("../../controllers/PartidaController.php");
include_once("../../controllers/EspecieController.php");
include_once("../zones/htmlZonaForm.php");
include_once("../especies/htmlEspecie.php");

include_once("../../controllers/LoginController.php");

LoginController::manterUsuario();

$fromQR = isset($_GET['qrcode']) && $_GET['qrcode'] == true;
$fromCod = isset($_GET['code']) && $_GET['code'] == true;
$ide = isset($_GET['ide']) ? $_GET['ide'] : null;
$idp = isset($_GET['idp']) ? $_GET['idp'] : null;
$cod = isset($_GET['cod']) ? $_GET['cod'] : null;
if (!isset($_SESSION['TIPO'])) {
    $tipo = null;
} else {
    $tipo = $_SESSION['TIPO'];
}

if ($cod !== null) {
    $plantaCont = new PlantaController();
    $planta = $plantaCont->buscarPorCodigo($cod);
}


if (($fromQR || $fromCod) && $tipo) {
    if ($_SESSION['PARTIDA']) {
        $partidaCont = new PartidaController();
        $idPlanta = ($idp != null) ? $idp : $planta->getIdPlanta();
        $partida = $partidaCont->buscarPartidaAndamentoPorIdUsuario($_SESSION['ID']);
        $msgFind = $partidaCont->checarQRCode($_SESSION['PARTIDA'], $idPlanta, $_SESSION['PLANTAS_LIDAS'], $_SESSION['ID']);
        $msgReturn = "<a href='../partidas/mainJogo.php?idp=" . $partida->getIdPartida() . "&ide=" . $partida->getIdEquipe() . "' id='voltarjogo'> Encontrou outra planta? Volte para o jogo! </a>";
    } else {
    };
}

if ($ide !== null) {
    $especieCont = new EspecieController();
    $especie = $especieCont->buscarPorId($ide);
}

if ($idp !== null) {
    $plantaCont = new PlantaController();
    $planta = $plantaCont->buscarPorId($idp);
}

$frutifera = $especie->getFrutifera();
if ($frutifera == 1) {
    $frut = "<br>" . "Frutífera";
} else {
    $frut = "";
};

$exotica = $especie->getExotica();
if ($exotica == 1) {
    $exot = "<br>" . "Exótica";
} else {
    $exot = "";
};

$raridade = $especie->getRaridade();
if ($raridade == 1) {
    $rara = "<br>" . "Rara";
} else {
    $rara = "";
};

$toxidade = $especie->getToxidade();
if ($toxidade == 1) {
    $tox = "<br>" . "Tóxica";
} else {
    $tox = "";
};

$medicinal = $especie->getMedicinal();
if ($medicinal == 1) {
    $med = "<br>" . "Medicinal";
} else {
    $med = "";
};

$comestivel = $especie->getComestivel();
if ($comestivel == 1) {
    $come = "<br>" . "Comestível";
} else {
    $come = "";
};

$nativa = $especie->getNativa();
if ($nativa == 1) {
    $nat = "<br>" . "Nativa";
} else {
    $nat = "";
};

$endemica = $especie->getEndemica();
if ($endemica == 1) {
    $ende = "<br>" . "Endêmica";
} else {
    $ende = "";
};

$panc = $especie->getPanc();
if ($panc == 1) {
    $pan = "<br>" . "PANC";
} else {
    $pan = "";
};

$ornamental = $especie->getOrnamental();
if ($ornamental == 1) {
    $orn = "<br>" . "Ornamental";
} else {
    $orn = "";
};

if ($planta == null) {
    echo "Planta não encontrado!<br>";
    echo "<a href='listPlantas.php'>Voltar</a>";
    exit;
}

$nomeSocial = $planta->getNomeSocial();
$nomePopular = $especie->getNomePopular();
?>

<!DOCTYPE html>
<html lang="pt-br">

<title>
    <?php if (!empty($nomeSocial)) {
        echo $nomeSocial;
    } else {
        echo $nomePopular;
    }
    ?>
</title>

<head>
    <?php include_once("../../bootstrap/header.php"); ?>
    <link rel="stylesheet" href="../csscheer/verplanta.css">

</head>
<style>
    body {
        overflow-x: hidden !important;
    }
</style>

<nav>

    <?php LoginController::navBar($tipo);

    echo "<br>";
    echo "<p class='text-center' id='msg'><b>";
    if (isset($msgFind)) {
        echo $msgFind;
    }
    echo "<b></p>"; ?>
</nav>

<body>

    <div class="container">

        <label id="labelnomesocial">
            <?php if (!empty($nomeSocial)) {
                echo "Nome Social:";
            } else {
                echo "Nome Popular:";
            } ?>
        </label> <br>
        <div class="titulo">
            <div class="row">
                <h1 class="nome text-center" id="nomePlanta">
                    <?php if (!empty($nomeSocial)) {
                        echo $nomeSocial;
                    } else {
                        echo $nomePopular;
                    } ?>
                </h1>
            </div> <br>

            <?php if (!empty($nomeSocial)) { ?>
                <h1 class="nome" id="nomeUm">
                    <a> Nome Popular: </a> <a style="color: #C05367; font-family: Poppins;"> <?= $especie->getNomePopular() ?> </a>
                </h1>
            <?php } ?>
            <h1 class="nome" id="nomeDois">
                <a> Nome Científico: </a> <i style="color: #C05367; font-family: Poppins;"> <?= $especie->getNomeCientifico() ?></i>
            </h1>
        </div>

        <div class="container">
            <p class="codigo text-right" id="codigoPlanta">
                Código: <?= $planta->getCodNumerico() ?>
            </p>
        </div>
    </div>


    <div class="text-center" id="imagem1Planta">
        <img id="imagemPlanta" src="<?php echo $planta->getImagemPlanta(); ?>" />
        <br> <br>
    </div>
    <div class="container">
        <div>

            <div class=" text-center">
                <p class="descricao text-center" id="pontos">
                    Pontos: <?= $planta->getPontos(); ?>
                </p>

                <p class=" descricao" id="atributos">
                    <?php echo $tox; ?>
                    <?php echo $med; ?>
                    <?php echo $come; ?>
                    <?php echo $exot; ?>
                    <?php echo $frut; ?>
                    <?php echo $rara; ?>
                    <?php echo $pan; ?>
                    <?php echo $ende; ?>
                    <?php echo $orn; ?>
                    <?php echo $nat; ?>
                </p>
            </div>

            <br>
            <br>
            <w id="nomespecie"> História da Espécie: </w>
            <h1 class="descricao" id="historiaespecie">
                <?= $especie->getDescricao() ?>
            </h1> <br><br>

            <w id="nomespecie"> História da Planta: </w>
            <h1 class="descricao" id="historiaplanta">
                <?= $planta->getPlantaHistoria() ?>
            </h1> <br><br>

            <div class="text-center">
                <img id="mapa" src="../../public/mapa.png">
                <w id="zonaencontrada">
                    <?php if (!empty($nomeSocial)) {
                        echo $nomeSocial;
                    } else {
                        echo $nomePopular;
                    } ?>
                    encontra-se na
                    <?= $planta->getZona() ?>!
                </w>
            </div>

        </div>

        <br><br><br>
        <div class="text-center">
            <?php if (isset($msgReturn)) {
                echo $msgReturn;
            } ?>
        </div>


        <br>
    </div>
    <script src="../bootstrap/bootstrap.min.js"></script>

    <?php include_once("../../bootstrap/footer.php"); ?>
</body>
<script>
    function atualizarDados() {
        // Verifique se a variável de sessão PARTIDA é verdadeira
        var partidaAtiva = <?php echo ($_SESSION['PARTIDA'] ? 'true' : 'false'); ?>;

        if (partidaAtiva === true) {
            // A variável de sessão PARTIDA é verdadeira, agora você pode chamar o código para verificar o usuário ou fazer outras ações aqui
            $.ajax({
                type: "POST",
                url: "rankingExec.php",
                dataType: "json",
                data: {
                    userID: <?php echo $_SESSION["ID"]; ?> // Envie o ID do usuário
                },
                success: function(userResponse) {
                    if (userResponse.isValid === true) {
                        // Redirecionar para a página X se a resposta for verdadeira
                        window.location.href = "../partidas/rankPartida.php?id=" + userResponse.idPartida;
                    } else {

                    }
                },
                error: function() {
                    console.log("Erro ao processar a requisição AJAX do usuário");
                }
            });
        } else {
            // A variável de sessão PARTIDA não é verdadeira, faça algo diferente aqui, se necessário
            console.log("Partida não está ativa");
        }
    };

    atualizarDados();

    // Usar setInterval para chamar a função a cada x milissegundos.
    setInterval(atualizarDados, 15000); // Atualizar a cada segundo (1000 ms).
</script>

</html>