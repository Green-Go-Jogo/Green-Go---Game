<?php

include_once("../../controllers/LoginController.php");
LoginController::manterUsuario();
LoginController::verificarAcesso([2, 3]);
include_once("../../controllers/QuestaoController.php");

global $idEspecieQuestaoValidacao;

if (!isset($_SESSION['TIPO'])) {
    $tipo = null;
} else {
    $tipo = $_SESSION['TIPO'];
}
if (isset($_GET['ide'])) {
    $ide = $_GET['ide'];
} else if (isset($idEspecieQuestaoValidacao)) {
    $ide = $idEspecieQuestaoValidacao;
} else {
    $ide = null;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Adicionar Pergunta</title>
    <?php include_once("../../bootstrap/header.php"); ?>
    <link rel="stylesheet" href="../csscheer/quiz.css">
</head>

<nav>
    <?php LoginController::navBar($tipo); ?>

</nav>

<body>
    <div class="container">
        <div class="row justify-content-md-left">

            <div class="row">
                <div class="col">
                    <h1 id="primeirotextoreg"> Crie uma Questão!</h1>

                    <form id="frmQuestao" action="adicionarPerguntaExec.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="nomeAtributo" for="txtDescricaoQ" id="txtNome"> Descrição:</label>
                            <input class="form-control" type="text" id="txtDescricaoQ" name="descricao" maxlength="200" />
                        </div>
                        <?php if (isset($errors) && !empty($errors) && isset($errors['descricao'])) { ?>
                            <div class="alert alert-warning" style="position: left;"><?php echo $errors['descricao']; ?></div>
                        <?php } ?>
                        <div class="form-group">
                            <label class="nomeAtributo" for="txtGrauDificuldade" id="txtNomeDificuldade"> Grau de dificuldade:</label>
                            <fieldset>
                                <div>
                                    <input type="radio" id="facil" name="grauDificuldade" value="facil">
                                    <label class="nomeAtributo" for="facil" id="texto-checkbox">Fácil</label>
                                </div>

                                <div>
                                    <input type="radio" id="medio" name="grauDificuldade" value="medio">
                                    <label class="nomeAtributo" for="medio" id="texto-checkbox">Médio</label>
                                </div>

                                <div>
                                    <input type="radio" id="dificil" name="grauDificuldade" value="dificil">
                                    <label class="nomeAtributo" for="dificil" id="texto-checkbox">Difícil</label>
                                </div>
                            </fieldset>
                            <?php if (isset($errors) && !empty($errors) && isset($errors['grau_dificuldade'])) { ?>
                                <div class="alert alert-warning" style="position: left;"><?php echo $errors['grau_dificuldade']; ?></div>
                            <?php } ?>
                        </div> <br><br>

                        <div class="col-sm" id="imagemreg">

                            <div class="form-group" id="imagemreg">

                                <a id="carregueimagemtexto"> Carregue uma imagem:</a> <br><br>
                                <div class="preview-image">
                                    <img class="preview-image__img" data-image-preview />
                                </div><br>
                                <label for="img" class="custom-file-upload"><img src="../../public/cameraicone.png" alt="Ícone" style="position: relative ;top: -9px ;width: 43px; height: 43px;" /></label>
                                <input type="file" id="img" name="imagem" id="picture__input" data-image-input accept=".png, .jpg, .jpeg" />
                                <a id="carregueimagemtexto2"> <- Selecione um arquivo para a imagem da espécie </a>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="text" id="txtNomeAlternativa"> Crie as alternativas: </label> <br>

                            <label class="nomeAtributo" for="alt1" id="alternativa"> Alternativa 1: </label>
                            <input class="form-control" type="text" id="alt1" name="alternativa1" maxlength="200">
                        </div>
                        <div class="form-group">
                            <label class="nomeAtributo" for="alt2" id="alternativa"> Alternativa 2: </label>
                            <input class="form-control" type="text" id="alt2" name="alternativa2" maxlength="200">
                        </div>
                        <div class="form-group">
                            <label class="nomeAtributo" for="alt3" id="alternativa"> Alternativa 3: </label>
                            <input class="form-control" type="text" id="alt3" name="alternativa3" maxlength="200">
                        </div>
                        <div class="form-group">
                            <label class="nomeAtributo" for="alt4" id="alternativa"> Alternativa 4: </label>
                            <input class="form-control" type="text" id="alt4" name="alternativa4" maxlength="200">
                            <?php if (isset($errors) && !empty($errors) && isset($errors['alternativas'])) { ?>
                                <div class="alert alert-warning" style="position: left;"><?php echo $errors['alternativas']; ?></div>
                            <?php } ?>
                        </div>

                        <div class="form-group">
                            <label class="nomeAtributo" id="txtNome"> Selecione a alternativa correta:</label><br>

                            <div> <input type="radio" name="alternativa_correta" value="1">
                                <label class="nomeAtributo" id="texto-checkbox">Alternativa 1</label>
                            </div>

                            <div> <input type="radio" name="alternativa_correta" value="2">
                                <label class="nomeAtributo" id="texto-checkbox">Alternativa 2</label>
                            </div>

                            <div> <input type="radio" name="alternativa_correta" value="3">
                                <label class="nomeAtributo" id="texto-checkbox">Alternativa 3</label>
                            </div>

                            <div> <input type="radio" name="alternativa_correta" value="4">
                                <label class="nomeAtributo" id="texto-checkbox">Alternativa 4</label>
                            </div>
                            <?php if (isset($errors) && !empty($errors) && isset($errors['alternativa_correta'])) { ?>
                                <div class="alert alert-warning" style="position: left;"><?php echo $errors['alternativa_correta']; ?></div>
                            <?php } ?>
                        </div>
                        <br>

                        <div>
                            <input type="hidden" name="id_especie" value="<?php echo $ide; ?>" />
                            <button type="submit" class="btn btn-secondary botaoGravar" id="botoesregistrar">Adicionar</button>
                            <button type="reset" class="btn btn-secondary botaoLimpar" id="botoeslimpar">Limpar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- <div class="row-2">
                    
                </div> -->

    </div>
</body>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var divDescQuestoes = document.getElementsByClassName("descricaoQuestao");
        var limiteCaracteres = 50;

        for (var i = 0; i < divDescQuestoes.length; i++) {
            var divAtual = divDescQuestoes[i];
            var textoAtual = divAtual.textContent;

            if (textoAtual.length > limiteCaracteres) {
                var novaFrase = textoAtual.substring(0, limiteCaracteres) + "...";
                divAtual.textContent = novaFrase;
            }
        }
    });
</script>
<?php include_once("../../bootstrap/footer.php"); ?>
<script type="text/javascript" src="../js/imagem.js" defer></script>

</html>