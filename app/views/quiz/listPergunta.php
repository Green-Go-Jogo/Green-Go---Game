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

    <title>Questões</title>

    <?php include_once("../../bootstrap/header.php"); ?>
    <link rel="stylesheet" href="../csscheer/verpartida.css">


</head>

<body>
    <nav>

        <?php LoginController::navBar($_SESSION['TIPO']); ?>
        <br>

    </nav>

            
<div>
<?php echo "<a href='../quiz/adicionarPergunta.php?ide=" . $ide . "' id='addict' class='btn-primary'>ADICIONAR</a><br>"; ?>
        
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
</body>
</html>