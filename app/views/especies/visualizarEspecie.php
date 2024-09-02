<?php
include_once("../../controllers/EspecieController.php");
include_once("../especies/htmlEspecie.php");
include_once("../../controllers/LoginController.php");

LoginController::manterUsuario();

$ide = isset($_GET['id']) ? $_GET['id'] : null;

if (!isset($_SESSION['TIPO'])) {
    $tipo = null;
} else {
    $tipo = $_SESSION['TIPO'];
}

if ($ide !== null) {
    $especieCont = new EspecieController();
    $especie = $especieCont->buscarPorId($ide);
}

$frutifera = $especie->getFrutifera();
if ($frutifera == 1) {
    $frut = "<br>" . "Frutos Comestíveis";
} else {
    $frut = "";
};

$exotica = $especie->getExotica();
if ($exotica == 1) {
    $exot = "<br>" . "Exótica";
} else {
    $exot = "";
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

if ($especie == null) {
    echo "Espécie não encontrada!<br>";
    echo "<a href='listEspecies.php'>Voltar</a>";
    exit;
}

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
    echo "<b></p>"; ?>
</nav>

<body>

    <div class="container">

        <label id="labelnomesocial">
            <?php
            echo "Nome Popular:";
            ?>
        </label> <br>
        <div class="titulo">
            <div class="row">
                <h1 class="nome text-center" id="nomePlanta">
                    <?php
                    echo $nomePopular;
                    ?>
                </h1>
            </div> <br>


            <h1 class="nome" id="nomeDois">
                <a> Nome Científico: </a> <i style="color: #C05367; font-family: Poppins;"> <?= $especie->getNomeCientifico() ?></i>
            </h1>
        </div>

    </div>


    <div class="text-center" id="imagem1Planta">
        <img id="imagemPlanta" src="<?php echo $especie->getImagemEspecie(); ?>" />
        <br> <br>
        <span id='autoria'>Autoria: <?= $especie->getAutoriaImagem(); ?></span>
    </div>
    <div class="container">
        <div>

            <div class=" text-center">

                <p class=" descricao" id="atributos">
                    <?php echo $tox; ?>
                    <?php echo $med; ?>
                    <?php echo $come; ?>
                    <?php echo $exot; ?>
                    <?php echo $frut; ?>
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
                <div id="preview" class="ckeditor-content">
                    <?= $especie->getDescricao() ?>
                </div>
            </h1> <br><br>
            <w id="nomespecie"> Fontes: </w>
            <h1 class="descricao" id="historiaespecie">
                <div id="preview" class="ckeditor-content">
                    <?php if (!empty($especie->getFontes())) {
                        echo $especie->getFontes();
                    } else {
                        echo "<p>Nenhuma fonte para a história da espécie</p>";
                    } ?>
                </div>
            </h1>
            <br><br>

            <div class="descricao">
                <p id="publicacao">Publicado por <?php echo "<span id='nomePub'>" . $especie->getUsuario()->getNomeUsuario() . "</span>"; ?>
                    em <?php
                        if (!empty($especie->getDataAtualizacao())) {
                            $dataOriginal = $especie->getDataAtualizacao();
                            $data = new DateTime($dataOriginal);
                            $dataFormatada = $data->format('d/m/y \à\s H:i');
                            echo "<span id='dataPub'>" . $dataFormatada . "</span>";
                        } else {
                            $dataOriginal = $especie->getDataCriacao();
                            $data = new DateTime($dataOriginal);
                            $dataFormatada = $data->format('d/m/y \à\s H:i');
                            echo "<span id='dataPub'>" . $dataFormatada . "</span>";
                        }

                        ?>
                </p>
            </div>



        </div>

        <br><br><br>



        <br>
    </div>
    <script src="../bootstrap/bootstrap.min.js"></script>
    <script src="../js/responsiveTable.js"></script>

    <?php include_once("../../bootstrap/footer.php"); ?>
</body>

</html>