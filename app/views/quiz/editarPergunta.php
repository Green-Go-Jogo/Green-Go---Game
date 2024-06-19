<?php

include_once("../../controllers/LoginController.php");
LoginController::manterUsuario();
LoginController::verificarAcesso([2, 3]);
include_once("../../controllers/QuestaoController.php");

if (!isset($_SESSION['TIPO'])) {
    $tipo = null;
} else {
    $tipo = $_SESSION['TIPO'];
}
if (!isset($_GET['idq'])) {
    $idq = null;
} else {
    $idq = $_GET['idq'];
}

if (!isset($_GET['ide'])) {
    $ide = null;
} else {
    $ide = $_GET['ide'];
}

$questaoController = new QuestaoController;
$questao = $questaoController->buscarPorId($idq);
$alternativas = $questaoController->buscarAlternativa($idq);
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
                    <h1 id="primeirotextoreg"> Editar Questão</h1>
                    <form id="frmQuestao" action="editarPerguntaExec.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="nomeAtributo" for="txtDescricaoQ" id="txtNome"> Descrição:</label>
                            <input class="form-control" type="text" id="txtDescricaoQ" name="descricao" maxlength="200" placeholder="Informe a descrição da questão" value="<?php echo isset($_POST['descricao']) ? $_POST['descricao'] : $questao->getDescricaoQuestao(); ?>" />
                        </div>
                        <div class="form-group">
                            <label class="nomeAtributo" for="txtGrauDificuldade" id="txtNomeDificuldade"> Grau de dificuldade:</label>
                            <fieldset>
                                <div>
                                    <input type="radio" id="facil" name="grauDificuldade" value="facil" <?php echo (null !== ($questao->getGrauDificuldade()) && $questao->getGrauDificuldade() === "facil") ? "checked" : ""; ?>>
                                    <label class=" nomeAtributo" for="facil" id="texto-checkbox">Fácil</label>
                                </div>

                                <div>
                                    <input type="radio" id="medio" name="grauDificuldade" value="medio" <?php echo (null !== ($questao->getGrauDificuldade()) && $questao->getGrauDificuldade() === "medio") ? "checked" : ""; ?>>
                                    <label class="nomeAtributo" for="medio" id="texto-checkbox">Médio</label>
                                </div>

                                <div>
                                    <input type="radio" id="dificil" name="grauDificuldade" value="dificil" <?php echo (null !== ($questao->getGrauDificuldade()) && $questao->getGrauDificuldade() === "dificil") ? "checked" : ""; ?>>
                                    <label class="nomeAtributo" for="dificil" id="texto-checkbox">Difícil</label>
                                </div>
                            </fieldset>
                        </div>

                        <div class="col-sm" id="imagemreg">

                            <div class="form-group" id="imagemreg">
                                <a id="carregueimagemtexto"> Imagem Atual:</a> <br><br>
                                <div class="preview-image">
                                    <input type="hidden" name='imagemAtual' value="<?php echo $questao->getImagemQuestao() ?>">
                                    <img id="imgatual" src="<?php echo $questao->getImagemQuestao() ?>" />
                                </div><br>
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

                            <label class="nomeAtributo" for="alt1" id="alternativa"> Alternativa 1</label>
                            <input class="form-control" type="text" id="alt1" name="alternativa1" maxlength="200" placeholder="Informe a descrição da alternativa" value=" <?php echo $alternativas[0]->getDescricaoAlternativa(); ?>">
                        </div>
                        <div class="form-group">
                            <label class="nomeAtributo" for="alt2" id="alternativa"> Alternativa 2</label>
                            <input class="form-control" type="text" id="alt2" name="alternativa2" maxlength="200" placeholder="Informe a descrição da alternativa" value=" <?php echo $alternativas[1]->getDescricaoAlternativa(); ?>">
                        </div>
                        <div class="form-group">
                            <label class="nomeAtributo" for="alt3" id="alternativa"> Alternativa 3</label>
                            <input class="form-control" type="text" id="alt3" name="alternativa3" maxlength="200" placeholder="Informe a descrição da alternativa" value=" <?php echo $alternativas[2]->getDescricaoAlternativa(); ?>">
                        </div>
                        <div class="form-group">
                            <label class="nomeAtributo" for="alt4" id="alternativa"> Alternativa 4</label>
                            <input class="form-control" type="text" id="alt4" name="alternativa4" maxlength="200" placeholder="Informe a descrição da alternativa" value=" <?php echo $alternativas[3]->getDescricaoAlternativa(); ?>">
                        </div>

                        <div class="form-group">
                            <label class="nomeAtributo" id="txtNome"> Selecione a alternativa correta:</label><br>
                            <div> <input type="radio" name="alternativa_correta" value="1" <?php echo (null !== ($alternativas[0]->getAlternativaCerta()) && $alternativas[0]->getAlternativaCerta() === 1) ? "checked" : ""; ?>>
                                <label class="nomeAtributo" id="texto-checkbox">Alternativa 1</label>
                            </div>

                            <div> <input type="radio" name="alternativa_correta" value="2" <?php echo (null !== ($alternativas[1]->getAlternativaCerta()) && $alternativas[1]->getAlternativaCerta() === 1) ? "checked" : ""; ?>>
                                <label class="nomeAtributo" id="texto-checkbox">Alternativa 2</label>
                            </div>

                            <div> <input type="radio" name="alternativa_correta" value="3" <?php echo (null !== ($alternativas[2]->getAlternativaCerta()) && $alternativas[2]->getAlternativaCerta() === 1) ? "checked" : ""; ?>>
                                <label class="nomeAtributo" id="texto-checkbox">Alternativa 3</label>
                            </div>

                            <div> <input type="radio" name="alternativa_correta" value="4" <?php echo (null !== ($alternativas[3]->getAlternativaCerta()) && $alternativas[3]->getAlternativaCerta() === 1) ? "checked" : ""; ?>>
                                <label class="nomeAtributo" id="texto-checkbox">Alternativa 4</label>
                            </div>
                        </div>

                        <div>
                            <input type="hidden" name="id_especie" value="<?php echo $ide; ?>" />
                            <input type="hidden" name="id_questao" value="<?php echo $idq; ?>" />
                            <input type="hidden" name="ids_alternativas" value="<?php foreach ($alternativas as $alternativa) {
                                                                                    echo $alternativa->getIdAlternativa() . " ";
                                                                                } ?>" />
                            <button type="submit" class="btn btn-secondary botaoGravar" id="botoesregistrar">Adicionar</button>
                            <button type="reset" class="btn btn-secondary botaoLimpar" id="botoeslimpar">Limpar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</body>
<?php include_once("../../bootstrap/footer.php"); ?>
<script type="text/javascript" src="../js/imagem.js" defer></script>

</html>