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
    <?php LoginController::navBar($tipo);

    echo "<br>";
    echo "<p class='text-center' id='msg'><b>";
    if (isset($msgFind)) {
        echo $msgFind;
    }
    echo "<b></p>"; ?>
</nav>

<body>
    <h1 id="quest" class=" text-center tituloPagina">
        Editar Questão
    </h1>

    <div class="container">

        <div class="row" style="margin-top: 10px;">

            <div class="col-6">
                <form id="frmQuestao" action="editarPerguntaExec.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class=" nomeAtributo" for="txtDescricaoQ"><span class="asterisco">﹡</span> Descrição:</label>
                        <input class="form-control" type="text" id="txtDescricaoQ" name="descricao" maxlength="200" placeholder="Informe a descrição da questão" value="<?php echo isset($_POST['descricao']) ? $_POST['descricao'] : $questao->getDescricaoQuestao(); ?>" />
                    </div>
                    <div class="form-group">
                        <label class="nomeAtributo" for="txtGrauDificuldade"><span class="asterisco">﹡</span> Grau de dificuldade:</label>
                        <fieldset>
                            <div>
                                <input type="radio" id="facil" name="grauDificuldade" value="facil" <?php echo (null !== ($questao->getGrauDificuldade()) && $questao->getGrauDificuldade() === "facil") ? "checked" : ""; ?>>
                                <label class=" nomeAtributo" for="facil">Fácil</label>
                            </div>

                            <div>
                                <input type="radio" id="medio" name="grauDificuldade" value="medio" <?php echo (null !== ($questao->getGrauDificuldade()) && $questao->getGrauDificuldade() === "medio") ? "checked" : ""; ?>>
                                <label class="nomeAtributo" for="medio">Médio</label>
                            </div>

                            <div>
                                <input type="radio" id="dificil" name="grauDificuldade" value="dificil" <?php echo (null !== ($questao->getGrauDificuldade()) && $questao->getGrauDificuldade() === "dificil") ? "checked" : ""; ?>>
                                <label class="nomeAtributo" for="dificil">Difícil</label>
                            </div>
                        </fieldset>
                    </div>

                    <div class="form-group">
                        <label for="uplImagem" class="nomeAtributo">Selecione o arquivo:</label>
                        <br>
                        <input class="form-control" type="file" name="imagem" id="uplImagem" accept="image/*" />
                    </div>

                    <div class="form-group">
                        <label class="nomeAtributo" for="alt1"><span class="asterisco">﹡</span> Alternativa 1</label>
                        <input class="form-control" type="text" id="alt1" name="alternativa1" maxlength="200" placeholder="Informe a descrição da alternativa" value=" <?php echo $alternativas[0]->getDescricaoAlternativa(); ?>">
                    </div>
                    <div class="form-group">
                        <label class="nomeAtributo" for="alt2"><span class="asterisco">﹡</span> Alternativa 2</label>
                        <input class="form-control" type="text" id="al2" name="alternativa2" maxlength="200" placeholder="Informe a descrição da alternativa" value=" <?php echo $alternativas[1]->getDescricaoAlternativa(); ?>">
                    </div>
                    <div class="form-group">
                        <label class="nomeAtributo" for="alt3"><span class="asterisco">﹡</span> Alternativa 3</label>
                        <input class="form-control" type="text" id="alt3" name="alternativa3" maxlength="200" placeholder="Informe a descrição da alternativa" value=" <?php echo $alternativas[2]->getDescricaoAlternativa(); ?>">
                    </div>
                    <div class="form-group">
                        <label class="nomeAtributo" for="alt4"><span class="asterisco">﹡</span> Alternativa 4</label>
                        <input class="form-control" type="text" id="alt4" name="alternativa4" maxlength="200" placeholder="Informe a descrição da alternativa" value=" <?php echo $alternativas[3]->getDescricaoAlternativa(); ?>">
                    </div>

                    <div class="form-group">
                        <label class="nomeAtributo"><span class="asterisco">﹡</span> Selecione a alternativa correta:</label><br>
                        <div> <input type="radio" name="alternativa_correta" value="1" <?php echo (null !== ($alternativas[0]->getAlternativaCerta()) && $alternativas[0]->getAlternativaCerta() === 1) ? "checked" : ""; ?>>
                            <label class="nomeAtributo">Alternativa 1</label>
                        </div>

                        <div> <input type="radio" name="alternativa_correta" value="2" <?php echo (null !== ($alternativas[1]->getAlternativaCerta()) && $alternativas[1]->getAlternativaCerta() === 1) ? "checked" : ""; ?>>
                            <label class="nomeAtributo">Alternativa 2</label>
                        </div>

                        <div> <input type="radio" name="alternativa_correta" value="3" <?php echo (null !== ($alternativas[2]->getAlternativaCerta()) && $alternativas[2]->getAlternativaCerta() === 1) ? "checked" : ""; ?>>
                            <label class="nomeAtributo">Alternativa 3</label>
                        </div>

                        <div> <input type="radio" name="alternativa_correta" value="4" <?php echo (null !== ($alternativas[3]->getAlternativaCerta()) && $alternativas[3]->getAlternativaCerta() === 1) ? "checked" : ""; ?>>
                            <label class="nomeAtributo">Alternativa 4</label>
                        </div>
                    </div>

                    <div>
                        <input type="hidden" name="id_questao" value="<?php echo $idq; ?>" />
                        <input type="hidden" name="ids_alternativas" value="<?php foreach ($alternativas as $alternativa) {echo $alternativa->getIdAlternativa()." ";} ?>" />
                        <a class="btn btn-secondary botaoVoltar" href="">Voltar</a>
                        <button type="submit" class="btn btn-secondary botaoGravar">Gravar</button>
                        <button type="reset" class="btn btn-secondary botaoLimpar">Limpar</button>
                    </div>
                </form>
            </div>

            <div class="col-6">
            </div>
        </div>

    </div>
</body>
<?php include_once("../../bootstrap/footer.php"); ?>

</html>