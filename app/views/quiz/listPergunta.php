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
    <link rel="stylesheet" href="../csscheer/listPergunta.css">


</head>
<style>
    .botaomais {
        transform: scale(1.05);
        position: relative;
        right: -2rem;
        box-shadow: none;
    }
    
    .questoesh1 {
        color: #04574D;
        font-family: Poppins;
        font-size: 60px;
    }

    @media (max-width: 767px) {
        .col-md-4 {
            flex-basis: calc(50% - 20px);
        }

        .container.text-center {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .row.row-cols-4 {
            justify-content: center;
        }
    }


    @media (min-width: 768px) and (max-width: 991px) {
        .col-md-4 {
            flex-basis: calc(50% - 20px);
        }
    }


    @media (min-width: 992px) {
        .col-md-4 {
            flex-basis: calc(25% - 20px);
        }
    }

</style>
<body>
    <nav>

        <?php LoginController::navBar($_SESSION['TIPO']); ?>
        <br>

    </nav>

            
<div>
    
                <h1 style="display: flex; justify-content: center" class= "questoesh1" >QUESTÕES</h1>

</div>  
        <div class="container text-center">
        <div class="container text-right">
                <?php echo "<a href='../quiz/adicionarPergunta.php?ide=" . $ide . "' id='addict' class='botaomais'>
<svg xmlns='http://www.w3.org/2000/svg' width='90' height='60' fill='#20A494' viewBox='0 0 16 16'>
<path d='M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zM8.5 6v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 1 0z'/>
</svg></a><br>"; ?>
</div>
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