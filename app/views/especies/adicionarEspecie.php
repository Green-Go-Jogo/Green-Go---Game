<?php include_once("../../controllers/LoginController.php");
LoginController::manterUsuario();
LoginController::verificarAcesso([2, 3]);
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Adicionar Especie</title>
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
        background-color: #f0b6bc !important;
        font-family: Poppins-Regular;
        border: 1px solid #ced4da;
        color: #FFFFFF;
        width: 500px;
    }

    div.ck-editor__editable strong {
        color: #c05367;
    }

    div.ck-toolbar {
        background-color: #FFFFFF !important;
        font-family: Poppins-Regular;
        border: 1px solid #ced4da;
        color: #FFFFFF;
        width: 500px !important;
    }

    .ck.ck-editor__main>.ck-editor__editable:not(.ck-focused) {
        border-color: #c05367;
    }

    .ck-rounded-corners .ck.ck-editor__main>.ck-editor__editable,
    .ck.ck-editor__main>.ck-editor__editable.ck-rounded-corners {
        border-color: #c05367;
    }

    .modo-escuro div.ck-editor__editable {
        background-color: #121212 !important;
        font-family: Poppins-Regular;
        border-color: #c05367;
        color: #FFFFFF;
        width: 500px;
    }

    input[type="file"] {
        display: none;
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
                            <h1 id="primeirotextoreg"> Adicione uma espécie!</h1>
                            <form action="adicionarEspecieExec.php" method="POST" enctype="multipart/form-data">

                                <label for="formtexto" id="txtNome">Nome Popular:</label>
                                <div class="w-100" id="campo_nomeEsp"></div>
                                <input type="text" name="Nome_Popular" class="form-control" id="txtNomeForm" aria-describedby="nome-cadastro" value="<?php echo isset($_POST['Nome_Popular']) ? $_POST['Nome_Popular'] : ''; ?>">
                                <div class="w-100"></div>
                                <?php if (isset($errors) && !empty($errors) && isset($errors['Nome_Popular'])) { ?>
                                    <div class="alert alert-warning" style="position: left;"><?php echo $errors['Nome_Popular']; ?></div>
                                <?php } ?>
                                <label for="formtexto" id="txtCodigo">Nome Cientifico:</label>
                                <div class="w-100"></div>
                                <input type="text" name="Nome_Cientifico" class="form-control" id="txtNomeForm" aria-describedby="nome-cadastro" value="<?php echo isset($_POST['Nome_Cientifico']) ? $_POST['Nome_Cientifico'] : ''; ?>">
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
                                                            <input type="checkbox" name="comestivel" class="form-check-input" id="botaocheck1" value="1">

                                                            <label class="form-check-label" for="botaocheck1" id="texto-checkbox">Comestível</label>
                                                        </div>
                                                        <div class="form-group form-check" id="formexo">
                                                            <input type="checkbox" name="exotica" class="form-check-input" id="botaocheck2" value="1">

                                                            <label class="form-check-label" for="botaocheck2" id="texto-checkbox">Exótica</label>
                                                        </div>
                                                        <div class="form-group form-check" id="formfrut">
                                                            <input type="checkbox" name="frutifera" class="form-check-input" id="botaocheck3" value="1">

                                                            <label class="form-check-label" for="botaocheck3" id="texto-checkbox">Frutífera</label>
                                                        </div>
                                                        <div class="form-group form-check" id="formmed">
                                                            <input type="checkbox" name="medicinal" class="form-check-input" id="botaocheck4" value="1">

                                                            <label class="form-check-label" for="botaocheck4" id="texto-checkbox">Medicinal</label>
                                                        </div>
                                                        <div class="form-group form-check" id="formrara">
                                                            <input type="checkbox" name="raridade" class="form-check-input" id="botaocheck5" value="1">

                                                            <label class="form-check-label" for="botaocheck5" id="texto-checkbox">Rara</label>
                                                        </div>
                                                        <div class="form-group form-check" id="formtoxi">
                                                            <input type="checkbox" name="toxidade" class="form-check-input" id="botaocheck6" value="1">

                                                            <label class="form-check-label" for="botaocheck6" id="texto-checkbox">Tóxica</label>
                                                        </div>
                                                        <div class="form-group form-check" id="formfrut">
                                                            <input type="checkbox" name="ornamental" class="form-check-input" id="botaocheck3" value="1">

                                                            <label class="form-check-label" for="botaocheck3" id="texto-checkbox">Ornamental</label>
                                                        </div>
                                                        <div class="form-group form-check" id="formmed">
                                                            <input type="checkbox" name="nativa" class="form-check-input" id="botaocheck4" value="1">

                                                            <label class="form-check-label" for="botaocheck4" id="texto-checkbox">Nativa</label>
                                                        </div>
                                                        <div class="form-group form-check" id="formrara">
                                                            <input type="checkbox" name="endemica" class="form-check-input" id="botaocheck5" value="1">

                                                            <label class="form-check-label" for="botaocheck5" id="texto-checkbox">Endêmica</label>
                                                        </div>
                                                        <div class="form-group form-check" id="formtoxi">
                                                            <input type="checkbox" name="panc" class="form-check-input" id="botaocheck6" value="1">

                                                            <label class="form-check-label" for="botaocheck6" id="texto-checkbox">PANC</label>
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

                                        <a id="carregueimagemtexto"> Carregue uma imagem:</a> <br><br>
                                        <div class="preview-image">
                                            <img class="preview-image__img" data-image-preview />
                                        </div><br>
                                        <label for="img" class="custom-file-upload"><img src="../../public/cameraicone.png" alt="Ícone" style="position: relative ;top: -9px ;width: 43px; height: 43px;" /></label>
                                        <input type="file" id="img" required name="imagem" id="picture__input" data-image-input accept=".png, .jpg, .jpeg" />
                                        <a id="carregueimagemtexto2"> <- Selecione um arquivo para a imagem da espécie </a>
                                    </div>
                                </div>

                                <div class="container" id="caixadetexto"> <br><br><br>
                                    <a id="textodescritivo">Descrição:</a> <br><br>
                                    <textarea id="editor" name="Descricao" value=""></textarea>
                                    <script>
                                        ClassicEditor
                                            .create(document.querySelector('#editor'))
                                            .then(editor => {

                                            })
                                            .catch(error => {
                                                console.error(error);
                                            });
                                    </script>

                                    <?php if (isset($errors) && !empty($errors) && isset($errors['Descricao'])) { ?>
                                        <div class="alert alert-warning"><?php echo $errors['Descricao']; ?></div>
                                    <?php } ?>
                                </div>

                                <div class="container"> <br><br>
                                    <button type="submit" class="btn btn-primary btn-lg" id="botoesregistrar"><a>Adicionar</a> </button>
                                    <button type="reset" class="btn btn-secondary btn-lg" id="botoeslimpar"> <a id="limpar"> Limpar</a>
                                    </button>
                                </div>


                            </form>

                        </div>
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