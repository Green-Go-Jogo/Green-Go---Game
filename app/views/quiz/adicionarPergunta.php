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
if (!isset($_GET['ide'])) {
    $ide = null;
} else {
    $ide = $_GET['ide'];
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
        Adicionar Questão
    </h1>

    <div class="container">

        <div class="row" style="margin-top: 10px;">

            <div class="col-6">
                <form id="frmQuestao" action="adicionarPerguntaExec.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class=" nomeAtributo" for="txtDescricaoQ"><span class="asterisco">﹡</span> Descrição:</label>
                        <input class="form-control" type="text" id="txtDescricaoQ" name="descricao" maxlength="200" placeholder="Informe a descrição da questão" value="<?php echo (isset($dados["questao"]) ? $dados["questao"]->getDescricaoQ() : ''); ?>" />
                    </div>
                    <div class="form-group">
                        <label class="nomeAtributo" for="txtGrauDificuldade"><span class="asterisco">﹡</span> Grau de dificuldade:</label>
                        <fieldset>
                            <div>
                                <input type="radio" id="facil" name="grauDificuldade" value="facil">
                                <label class=" nomeAtributo" for="facil">Fácil</label>
                            </div>

                            <div>
                                <input type="radio" id="medio" name="grauDificuldade" value="medio">
                                <label class="nomeAtributo" for="medio">Médio</label>
                            </div>

                            <div>
                                <input type="radio" id="dificil" name="grauDificuldade" value="dificil">
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
                        <input class="form-control" type="text" id="alt1" name="alternativa1" maxlength="200" placeholder="Informe a descrição da alternativa">
                    </div>
                    <div class="form-group">
                        <label class="nomeAtributo" for="alt2"><span class="asterisco">﹡</span> Alternativa 2</label>
                        <input class="form-control" type="text" id="al2" name="alternativa2" maxlength="200" placeholder="Informe a descrição da alternativa">
                    </div>
                    <div class="form-group">
                        <label class="nomeAtributo" for="alt3"><span class="asterisco">﹡</span> Alternativa 3</label>
                        <input class="form-control" type="text" id="alt3" name="alternativa3" maxlength="200" placeholder="Informe a descrição da alternativa">
                    </div>
                    <div class="form-group">
                        <label class="nomeAtributo" for="alt4"><span class="asterisco">﹡</span> Alternativa 4</label>
                        <input class="form-control" type="text" id="alt4" name="alternativa4" maxlength="200" placeholder="Informe a descrição da alternativa">
                    </div>

                    <div class="form-group">
                        <label class="nomeAtributo"><span class="asterisco">﹡</span> Selecione a alternativa correta:</label><br>
                        <div> <input type="radio" name="alternativa_correta" value="1">
                            <label class="nomeAtributo">Alternativa 1</label>
                        </div>

                        <div> <input type="radio" name="alternativa_correta" value="2">
                            <label class="nomeAtributo">Alternativa 2</label>
                        </div>

                        <div> <input type="radio" name="alternativa_correta" value="3">
                            <label class="nomeAtributo">Alternativa 3</label>
                        </div>

                        <div> <input type="radio" name="alternativa_correta" value="4">
                            <label class="nomeAtributo">Alternativa 4</label>
                        </div>
                    </div>

                    <div>
                        <input type="hidden" name="id_especie" value="<?php echo $ide; ?>" />
                        <a class="btn btn-secondary botaoVoltar" href="">Voltar</a>
                        <button type="submit" class="btn btn-secondary botaoGravar">Gravar</button>
                        <button type="reset" class="btn btn-secondary botaoLimpar">Limpar</button>
                    </div>
                </form>
            </div>

            <div class="col-6">
                <h1 style="display: flex; justify-content: center">LISTAGEM DE QUESTÕES</h1>
                <br>
                <?php
                $questaoCont = new QuestaoController;
                $questoes = $questaoCont->listarPorEspecie($ide);

                foreach ($questoes as $questao) {
                    $grauD = $questao->getGrauDificuldade();
                    if ($grauD == "dificil") {
                        $cor = "#ff0000";
                    } else if ($grauD == "medio") {
                        $cor = "#FFD43B";
                    } else {
                        $cor = "#04ff00";
                    }
                    echo "<div class='row' style='align-items: center'>";

                        echo "<div class='col-10' style='display: flex; align-items: center'>";
                            echo "<p class='descricaoQuestao' style='margin: auto'>" . $questao->getDescricaoQuestao();"</p>";
                        echo "</div>";

                        echo "<div class='col-2' style='display: flex; justify-content: space-between'>";
                            echo "<a href='editarPergunta.php?idq=".$questao->getIdQuestao()."'><i class='fa-solid fa-pencil'></i></a>";
                            echo "<a><i class='fa-solid fa-circle' style='color:" . $cor . "'></i></a>";
                            echo "<a href='deletarPergunta.php?id=".$questao->getIdQuestao()."'><i class='fa-solid fa-trash'></i></a>";
                        echo "</div>";
                    echo "</div>";
                }
                ?>
                <!-- <div class="row-2">
                    
                </div> -->
            </div>
        </div>

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

</html>