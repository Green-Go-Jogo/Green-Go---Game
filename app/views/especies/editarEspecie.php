<?php include_once("../../controllers/LoginController.php");
LoginController::manterUsuario();
LoginController::verificarAcesso([2, 3]);
?>
<?php if (isset($_SESSION['msg_erro'])) : ?>
    <span>
        <?= $_SESSION['msg_erro'] ?>
    </span>
<?php endif ?>

<?php include_once("../../controllers/EspecieController.php");


global $idEditarEspecie;

if (!isset($_GET['id'])) {
    $id = null;
} else {
    $id = $_GET['id'];
}

if ($id !== null) {
    $especieCont = new EspecieController();
    $especie = $especieCont->buscarPorId($id);
} else if ($idEditarEspecie !== null) {
    $especieCont = new EspecieController();
    $especie = $especieCont->buscarPorId($idEditarEspecie);
} else {
    echo "Especie não encontrado!<br>";
    echo "<a href='listEspecies.php'>Voltar</a>";
    exit;
}

$frutifera = $especie->getFrutifera();
if ($frutifera == 1) {
    $frut = "checked";
} else {
    $frut = "";
};

$exotica = $especie->getExotica();
if ($exotica == 1) {
    $exot = "checked";
} else {
    $exot = "";
};

$raridade = $especie->getRaridade();
if ($raridade == 1) {
    $rara = "checked";
} else {
    $rara = "";
};

$toxidade = $especie->getToxidade();
if ($toxidade == 1) {
    $tox = "checked";
} else {
    $tox = "";
};

$medicinal = $especie->getMedicinal();
if ($medicinal == 1) {
    $med = "checked";
} else {
    $med = "";
};

$comestivel = $especie->getComestivel();
if ($comestivel == 1) {
    $come = "checked";
} else {
    $come = "";
};

$nativa = $especie->getNativa();
if ($nativa == 1) {
    $nat = "checked";
} else {
    $nat = "";
};

$endemica = $especie->getEndemica();
if ($endemica == 1) {
    $ende = "checked";
} else {
    $ende = "";
};

$panc = $especie->getPanc();
if ($panc == 1) {
    $pan = "checked";
} else {
    $pan = "";
};

$ornamental = $especie->getOrnamental();
if ($ornamental == 1) {
    $orn = "checked";
} else {
    $orn = "";
};
?>




<!DOCTYPE html>
<html lang="pt-br">

<head>

    <title>Editar Especie</title>
    <?php include_once("../../bootstrap/header.php"); ?>
    <link rel="stylesheet" href="../csscheer/especie.css">

</head>

<style>
    .preview-image__img,
    #imgatual {
        width: 400px;
        height: auto;
    }

    div.ck-editor__editable {
        font-family: Poppins-Regular;
        border: 1px solid #ced4da;
        width: 600px;
    }

    div.ck.ck-sticky-panel__content {
        border: none !important;
    }


    div.ck-toolbar {
        background-color: #FFFFFF !important;
        font-family: Poppins-Regular;
        border: 1px solid #c05367 !important;
        color: #FFFFFF;
        width: 600px !important;
    }

    .ck-content .table table,
    .ck-content .table table tbody,
    .ck-content .table table td,
    .ck-content .table table th,
    .ck-content .table table tr,
    .modo-escuro .ck-content .table table,
    .modo-escuro .ck-content .table tbody,
    .modo-escuro .ck-content .table td,
    .modo-escuro .ck-content .table th,
    .modo-escuro .ck-content .table tr,
    .ck-content .table table {
        border: 1px solid #C05367 !important;
        background-color: #FFFFFF;
    }

    .modo-escuro div.ck-editor__editable {
        background-color: #1b1b1b !important;
        font-family: Poppins-Regular;
        border-color: #c05367;
        color: #FFFFFF;
        width: 600px;
    }

    .modo-escuro div.ck-toolbar {
        font-family: Poppins-Regular;
        border: 1px solid #c05367 !important;
        color: #FFFFFF;
    }

    .ck.ck-editor__main>.ck-editor__editable:not(.ck-focused) {
        border-color: #c05367;
    }

    .ck-rounded-corners .ck.ck-editor__main>.ck-editor__editable,
    .ck.ck-editor__main>.ck-editor__editable.ck-rounded-corners {
        border-color: #c05367;
    }

    .modo-escuro div.ck-editor__editable {
        font-family: Poppins-Regular;
        border-color: #c05367;
        width: 500px;
    }

    input[type="file"] {
        display: none;
    }

    #cancelar {
        position: relative;
        color: #C05367;
        font-family: Poppins-medium;
        top: 10px;
        left: 40px;
        text-decoration: underline dotted;
        font-size: 20px;
    }

    #cancelar:hover {
        color: #ED8E96;
        font-family: Poppins-medium;
    }
</style>


<nav>
    <?php include_once("../../bootstrap/navADM.php"); ?>
</nav>

<body>
    <main>
        <nav id="primeirotextoindex">
            <div class="container">
                <div class="row justify-content-md-left">

                    <div class="row">
                        <div class="col">
                            <h1 id="primeirotextoreg"> Edite uma espécie!</h1>

                            <form action="editarEspecieExec.php" method="POST" enctype="multipart/form-data">

                                <label for="formtexto" id="txtNome">Nome Popular:</label>
                                <div class="w-100"></div>
                                <input type="text" name="Nome_Popular" class="form-control" id="txtNomeForm" aria-describedby="nome-cadastro" value="<?php echo isset($_POST['Nome_Popular']) ? $_POST['Nome_Popular'] : $especie->getNomePopular(); ?>">
                                <div class="w-100"></div>
                                <?php if (isset($errors) && !empty($errors) && isset($errors['Nome_Popular'])) { ?>
                                    <div class="alert alert-warning" style="position: left;"><?php echo $errors['Nome_Popular']; ?></div>
                                <?php } ?>
                                <label for="formtexto" id="txtCodigo">Nome Cientifico:</label>
                                <div class="w-100"></div>
                                <input type="text" name="Nome_Cientifico" class="form-control" id="txtCodigoForm" aria-describedby="nome-cadastro" value="<?php echo isset($_POST['Nome_Cientifico']) ? $_POST['Nome_Cientifico'] : $especie->getNomeCientifico(); ?>">
                                <div class="w-100"> <br>
                                    <?php if (isset($errors) && !empty($errors) && isset($errors['Nome_Cientifico'])) { ?>
                                        <div class="alert alert-warning" style="position: left;"><?php echo $errors['Nome_Cientifico']; ?></div>
                                    <?php } ?>
                                    <div>
                                        <div class="container" id="container-checkbox">
                                            <div class="row">
                                                <div class="col-md">
                                                    <div class="form-group form-check">
                                                        <div id="txtNomeAtributo">
                                                            <a>Atributos específicos:</a>
                                                            <div class="w-100"></div>
                                                            <br>
                                                        </div>
                                                        <div class="form-group form-check" id="formcome">
                                                            <input type="checkbox" name="comestivel" class="form-check-input" id="botaocheck1" value="1" <?php echo $come; ?>>

                                                            <label class="form-check-label" for="botaocheck1" id="texto-checkbox">Comestível</label>
                                                        </div>
                                                        <div class="form-group form-check" id="formexo">
                                                            <input type="checkbox" name="exotica" class="form-check-input" id="botaocheck2" value="1" <?php echo $exot; ?>>

                                                            <label class="form-check-label" for="botaocheck2" id="texto-checkbox">Exótica</label>
                                                        </div>
                                                        <div class="form-group form-check" id="formfrut">
                                                            <input type="checkbox" name="frutifera" class="form-check-input" id="botaocheck3" value="1" <?php echo $frut; ?>>

                                                            <label class="form-check-label" for="botaocheck3" id="texto-checkbox">Frutos Comestíveis</label>
                                                        </div>
                                                        <div class="form-group form-check" id="formmed">
                                                            <input type="checkbox" name="medicinal" class="form-check-input" id="botaocheck4" value="1" <?php echo $med; ?>>

                                                            <label class="form-check-label" for="botaocheck4" id="texto-checkbox">Medicinal</label>
                                                        </div>
                                                        <!-- <div class="form-group form-check" id="formrara">
                                                            <input type="checkbox" name="raridade" class="form-check-input" id="botaocheck5" value="1" <?php echo $rara; ?>>

                                                            <label class="form-check-label" for="botaocheck5" id="texto-checkbox">Rara</label>
                                                        </div> -->
                                                        <div class="form-group form-check" id="formtoxi">
                                                            <input type="checkbox" name="toxidade" class="form-check-input" id="botaocheck6" value="1" <?php echo $tox; ?>>

                                                            <label class="form-check-label" for="botaocheck6" id="texto-checkbox">Tóxica</label>
                                                        </div>
                                                        <div class="form-group form-check" id="formfrut">
                                                            <input type="checkbox" name="panc" class="form-check-input" id="botaocheck3" value="1" <?php echo $pan; ?>>

                                                            <label class="form-check-label" for="botaocheck3" id="texto-checkbox">PANC</label>
                                                        </div>
                                                        <div class="form-group form-check" id="formmed">
                                                            <input type="checkbox" name="ende" class="form-check-input" id="botaocheck4" value="1" <?php echo $ende; ?>>

                                                            <label class="form-check-label" for="botaocheck4" id="texto-checkbox">Endêmica</label>
                                                        </div>
                                                        <div class="form-group form-check" id="formrara">
                                                            <input type="checkbox" name="ornamental" class="form-check-input" id="botaocheck5" value="1" <?php echo $orn; ?>>

                                                            <label class="form-check-label" for="botaocheck5" id="texto-checkbox">Ornamental</label>
                                                        </div>
                                                        <div class="form-group form-check" id="formtoxi">
                                                            <input type="checkbox" name="nativa" class="form-check-input" id="botaocheck6" value="1" <?php echo $nat; ?>>

                                                            <label class="form-check-label" for="botaocheck6" id="texto-checkbox">Nativa</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br><br>

                                <div class="col-sm" id="imagemreg">

                                    <div class="form-group" id="imagemreg">
                                        <a id="carregueimagemtexto"> Imagem Atual:</a> <br><br>
                                        <div class="preview-image">
                                            <input type="hidden" name='imagemAtual' value="<?php echo $especie->getImagemEspecie() ?>">
                                            <img id="imgatual" src="<?php echo $especie->getImagemEspecie() ?>" />
                                        </div><br>
                                        <a id="carregueimagemtexto"> Carregue uma imagem para alterar a atual:</a> <br><br>
                                        <div class="preview-image">
                                            <img class="preview-image__img" data-image-preview />
                                        </div><br>
                                        <label for="img" class="custom-file-upload"><img src="../../public/cameraicone.png" alt="Ícone" style="position: relative ;top: -9px ;width: 43px; height: 43px;" /></label>
                                        <input type="file" id="img" name="imagem" id="picture__input" data-image-input accept=".png, .jpg, .jpeg" />
                                        <a id="carregueimagemtexto2"> <- Selecione um arquivo para a imagem da espécie </a>
                                    </div>

                                    <label for="formtexto" id="txtCodigo">Autoria da Foto:</label>
                                    <div class="w-100"></div>
                                    <input type="text" name="Autoria_Foto" class="form-control" id="txtNomeForm" aria-describedby="nome-cadastro" value="<?php echo isset($_POST['Autoria_Foto']) ? $_POST['Autoria_Foto'] : $especie->getAutoriaImagem(); ?>">
                                    <?php if (isset($errors) && !empty($errors) && isset($errors['Autoria_Foto'])) { ?>
                                        <div class="alert alert-warning"><?php echo $errors['Autoria_Foto']; ?></div>
                                    <?php } ?>
                                </div>

                                <div class="container" id="caixadetexto"> <br>
                                    <a id="textodescritivo">Descrição:</a> <br><br>
                                    <textarea id="editor" name="Descricao" value=""></textarea>
                                    <script>
                                        ClassicEditor
                                            .create(document.querySelector('#editor'), {
                                                ckfinder: {
                                                    uploadUrl: '../plantas/processarImagem.php'
                                                }
                                            })
                                            .then(editor => {
                                                const historiaContent = `<?php echo $especie->getDescricao() ?>`;

                                                editor.setData(historiaContent);
                                            })
                                            .catch(error => {
                                                console.error(error);
                                            });
                                    </script>
                                    <?php if (isset($errors) && !empty($errors) && isset($errors['Descricao'])) { ?>
                                        <div class="alert alert-warning"><?php echo $errors['Descricao']; ?></div>
                                    <?php } ?>
                                </div>

                                <div class="container" id="caixadetexto"> <br>
                                    <a id="textodescritivo">Fontes:</a> <br><br>
                                    <textarea id="editorFonte" name="Fontes" value=""></textarea>
                                    <script>
                                        ClassicEditor
                                            .create(document.querySelector('#editorFonte'), {
                                                ckfinder: {
                                                    uploadUrl: '../plantas/processarImagem.php'
                                                }
                                            })
                                            .then(editor => {
                                                const historiaContent = `<?php echo $especie->getFontes() ?>`;

                                                editor.setData(historiaContent);
                                            })
                                            .catch(error => {
                                                console.error(error);
                                            });
                                    </script>
                                    <?php if (isset($errors) && !empty($errors) && isset($errors['Fontes'])) { ?>
                                        <div class="alert alert-warning"><?php echo $errors['Fontes']; ?></div>
                                    <?php } ?>
                                </div>

        </nav>

        <div class="container"> <br><br>
            <button type="submit" class="btn btn-primary btn-lg" id="botoesregistrar"><a>Salvar</a> </button>
            <button type="reset" class="btn btn-secondary btn-lg" id="botoeslimpar"> <a id="limpar"> Limpar</a></button>
            <a class="btn btn-secondary btn-lg" id="botoescancelar" href="../../views/especies/listEspecies.php">Cancelar e Voltar</a>
        </div>

        <input type="hidden" name="id_especie" value="<?php echo $especie->getIdEspecie(); ?>" />
        <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['ID']; ?>" />

        </form>

        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        <br><br>
    </main>
    <?php include_once("../../bootstrap/footer.php"); ?>
</body>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/grayscale.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="js/registro.js"></script>
<script type="text/javascript" src="../js/imagem.js" defer></script>

</html>