<!DOCTYPE html>
<html lang="pt-br">

<head>

    <?php include_once("../bootstrap/header.php");?>

</head> 

<nav>

    <?php include_once("../bootstrap/navADM.php");?>

</nav>


<body>
    <div class="container">
        <div class="row justify-content-md-left">
            <div id="about-area">
                <div class="row">
                    <div class="col" id="textoindex">
                        <h1><br><br>Aprenda <br> com trilhas <br> ecológicas! </h1>
                        <div class="row">
                            <div class="col">
                                <a class="btn btn-secondary jogar" href="../Controllers/PlantaControllerADM.php?action=formIdentificarPlanta">JOGAR</a>

                                <!--SÓ HÁ UM MODO DE JOGO POR HORA
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true">
                                        JOGAR
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="modosolo">Modo solo</a>
                                        <a class="dropdown-item" href="emequipe">Em equipe</a>
                                    </div>
                                </div>
                                -->
                                
                            </div>
                        </div>
                    </div>
                    <div class="img-responsive">
                        <a href="..\controllers\EspecieControllerADM.php?action=EspeciesMapa"><img src="../public/mapa 1.svg" class="img-fluid" alt="logo-index"
                                id="mapa-da-home"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col quadrado">
                <img src="../public/projeto.svg" alt="" id="imagenscaixas">
                <p>Projeto de extensão <br> desenvolvido por alunas do IFPR</p>
            </div>
            <div class="col quadrado">
                <img src="../public/metodologias.svg" alt="" id="imagenscaixas">
                <p>Educação ambiental <br> através de metodologias ativas</p>
            </div>
            <div class="col quadrado">
                <img src="../public/codigo.svg" alt="" id="imagenscaixas">
                <p>Plataforma web <br>com código aberto e muito amor</p>
            </div>
        </div>
        <div class="finalhome" id="ultimo-cont-index">
            <div class="row justify-content-md-left">
                <div class="col">
                    <img class="img-fluid" src="../public/Group 52.svg" alt="celular-greengo" id="imagem-celular">
                </div>
            </div>
        </div>
    </div>
    <br><br><br>
</body>
</html>