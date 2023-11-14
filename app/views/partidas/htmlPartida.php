<link rel="stylesheet" href="../csscheer/verpartida.css">
<link rel="stylesheet" href="../csscheer/ranking.css">
<link rel="stylesheet" href="../css/listPlanta.css">

<style>
    .row.row-cols-4 {
        display: flex;
        flex-wrap: wrap;
    }

    .col-md-4 {
        flex-basis: calc(25% - 20px);
        margin-bottom: 20px;
        padding: 10px;
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


    .custom-container {
        display: flex;
    }

    .custom-div {
        padding: 10px;
        position: relative;
        /* Habilita o posicionamento relativo */
        top: -50px;
        /* Ajuste conforme necessário para posicionar acima da tabela */
        left: 1200px;
        /* Ajuste conforme necessário para posicionar à direita */
        /* Você pode ajustar top, right, bottom, left conforme necessário */
    }

    #nomeEquipe {
        background-color: #FFFFFF !important;
        color: #04574d;
        border-radius: 20px;
    }

    #codigoEquipe {
        margin-left: 57px;
        width: 200px;
        background-color: #FFFFFF;
        color: #C05367;
        border-radius: 20px;
    }


    #escolherEquipe {
        color: #338a5f;
        background-color: #ffffff;
        border-color: #ffffff;
        font-family: Poppins-semibold;
        font-size: 20px;
    }


    #escolherEquipe:hover {
        color: #ffffff;
        background-color: #338a5f;
        border-color: #338a5f;
    }



    .container.text-center.equipe {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: 60vh;
    }

    #lab-senha {
        color: #04574d;
    }

    .btn.submit:hover {
        color: #ebf0f1 !important;
        background-color: #04574d;
    }

    .btn.submit {
        color: #ebf0f1 !important;
        background-color: #338a5f;
    }

    .btn.cancel {
        color: #C05367;
        background-color: #FFFFFF;
        border-color: #C05367;
    }

    .btn.cancel:hover {
        color: var(--branco);
        background-color: #f0b6bc !important;
        border-radius: 5px;
    }

    #password {
        background-color: #f0b6bc;
        color: #ffffff;
        font-family: Poppins-semibold;
        margin-bottom: 50px;
        border-radius: 5px;
        height: auto;
        border-radius: 5px;
    }

    #pontosequipe,
    #nomequipe {
        color: #C05367;
        font-family: Poppins;
        font-size: 25px;
    }

    #tabelapontos {
        color: #078071;
        font-family: Poppins-semibold;
        font-size: 15px;
        text-decoration: underline dotted;
    }

    #tabelanome {
        color: #078071;
        font-family: Poppins-semibold;
        font-size: 15px;
        text-decoration: underline dotted;
    }

    #fecharpassword {
        color: #C05367;
        border-color: #C05367;
        font-size: 17px;
        font-family: Poppins-semibold;
    }

    #fecharpassword:hover {
        color: #ffffff;
        background-color: #C05367 !important;
    }

    #submit-password {
        color: #ffffff;
        background-color: #078071;
        font-size: 17px;
        font-family: Poppins-semibold;
    }

    #submit-password:hover {
        color: #ffffff;
        background-color: #04574d;
    }

    #exampleModalLabel {
        font-family: Poppins-medium;
    }
</style>

<?php
include_once("../../controllers/PartidaController.php");
include_once("../../controllers/UsuarioController.php");
class PartidaHTML
{

    public static function desenhaPartida($partidas)
    {
        $partCont = new PartidaController();
        $usuarioCont = new UsuarioController();
        echo "<div class='container text-center'>";
        echo "<div class='row row-cols-4'>";

        foreach ($partidas as $partida) {

            $usuario = $usuarioCont->buscarPorId($partida->getIdAdm());
            $nomeAdm = $usuario->getNomeUsuario();
            $numEquipes = count($partida->getEquipes());
            $jogadores = $partCont->contarJogadores($partida->getIdPartida());
            $maxJogadores = $partida->getLimiteJogadores() * $numEquipes;

            if (null !== ($partida->getDataFim())) {
                $Status = "Finalizada";
                $Open = "END";
            } else if ($partida->getIdAdm() == $_SESSION['ID']) {
                $Status = "Administrador";
                $Open = "ADM";
            } else if (null !== ($partida->getDataInicio())) {
                $Status = "Em andamento";
                $Open = "NO";
            } else if ($maxJogadores == $jogadores) {
                $Status = "Cheia";
                $Open = "FULL";
            } else {
                $Status = "Aguardando";
                $Open = "YES";
            }
            echo "<div class='col-md-4'>";
            echo "<br>";
            echo "<div class='card' style='width: 22rem;'>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title' id='nomepartida'>" . $partida->getNomePartida() . "</h5>" . "<br>";
            echo "<p class='card-text nome-texto'> Jogadores: " . $jogadores . "/" . $maxJogadores . "<br></p>";
            echo "<p class='card-text nome-texto' id='status'> Status: " . $Status . "<br></p>";
            echo "<button type='button btn-info' id='info' data-toggle='modal' data-target='#infoModal' onclick='mostrarInfo(" . json_encode($partida->getZonas()) . "," . json_encode($partida->getEquipes()) . ")'>Informações</button>";
            echo "<br><br><p class='card-text nome-texto' id='criador'> Criado por: <br>" . $nomeAdm . " <br>" . "</p>";

            if ($Open == "FULL") {
                echo "<button type='button' class='btn entrar-btn'>Partida Cheia!</button>";
            } else if ($Open == "YES") {
                echo "<button type='button' class='btn entrar-btn' data-bs-toggle='modal' data-bs-target='#senhaModal' data-partida-id='" . $partida->getIdPartida() . "'>Entrar</button>";
            } else if ($Open == "END") {
                echo "<a href='rankPartida.php?id=" . $partida->getIdPartida() . "'><button type='button' class='btn entrar-btn'>Resultado</button></a>";
            } else if ($Open == "NO") {
                echo "<button type='button' class='btn entrar-btn'>Fechada!</button>";
            } else if ($Open = "ADM") {
                echo "<a href='PartidaADM.php?id=" . $partida->getIdPartida() . "'><button type='button' class='btn entrar-btn'>Administrar</button></a>";
            }
            echo "<br>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }

        echo "</div>";

        // Modal Senha
        echo "<div class='modal fade' id='senhaModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>";
        echo "<div class='modal-dialog'>";
        echo "<div class='modal-content'>";
        echo "<div class='modal-header'>";
        echo "<h1 class='modal-title text-center fs-5' id='exampleModalLabel'>Insira a senha:</h1>";
        echo "</div>";
        echo "<div class='modal-body'>";
        echo "<form id='password-form' action='verificar_senha.php' method='POST'>";
        echo "<input type='hidden' id='partida-id' name='partidaId'>";
        echo "<div class='mb-3'>";
        echo "<label for='password' id='lab-senha' class='col-form-label'> </label>";
        echo "<input type='password' autocomplete='off' class='form-control' id='password' name='password'>";
        echo "</div>";
        echo "</div>";
        echo "<div class='modal-footer'>";
        echo "<button type='button' class='btn cancel btn-secondary' data-bs-dismiss='modal' id='fecharpassword'>Fechar</button>";
        echo "<button type='submit' class='btn submit btn-primary' id='submit-password'>Entrar</button>";
        echo "</div>";
        echo "</form>";
        echo "</div>";
        echo "</div>";
        echo "</div>";

        // Modal Info
        echo "<div id='infoModal' class='modal fade' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>";
        echo "<div class='modal-dialog'>";
        echo "<div class='modal-content'>";
        echo "<div class='modal-header justify-content-center'>";
        echo "<h4 class='modal-title d-flex text-center'>Informações</h4>";
        echo "</div>";
        echo "<div class='modal-body'>";
        echo "<div id='informacoes'>";
        echo "</div>";
        echo "</div>";
        echo "<div class='modal-footer'>";
        echo "<button type='button' class='btn cancel btn-secondary' data-dismiss='modal' id='fecharpassword'>Fechar</button>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }

    public static function desenhaEquipe($usuarios, $partida, $idEquipe)
    {
        $partCont = new PartidaController();

        echo "<div class='text-center'>";
        echo "<table class='table text-center' >";
        echo "<thead>";
        echo "<tr class='text-center'>";
        echo "<th scope='col' id='nomequipe'>Nome</th>";
        echo "<th scope='col' class='text-left' id='pontosequipe'>Pontos</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        foreach ($usuarios as $usuario) {
            $usuarioPartida = $partCont->buscarUsuarioPorIdPartida($usuario->getIdUsuario(), $partida->getIdPartida());
            $pontos = $usuarioPartida->getPontuacaoUsuario() !== null ? $usuarioPartida->getPontuacaoUsuario() : 0;


            echo "<tr>";
            echo "<td id='tabelanome'>" . $usuario->getNomeUsuario() . "</td>";
            echo "<td id='tabelapontos' class='text-left'>" . $pontos . "</td>";
            // echo "<td>";
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
        echo "</div><br>";

        if (!is_null($partida->getDataFim())) {
            $Status = "Essa partida acabou!";
            $Open = "CLOSE";
            $link = '';
        } else if (!is_null($partida->getDataInicio())) {
            $Status = "Em andamento!";
            $Open = "CLOSE";
            $link = "<a href='mainJogo.php?idp=" . $partida->getIdPartida() . '&ide=' . $idEquipe . "'style='font-family: Poppins-medium; margin-top: 15px; color: #ED8E96; text-decoration: underline;'>Clique aqui para caçar as plantas!</a>";
        } else {
            $Status = '<a style="font-family: Poppins-medium; margin-top: 15px;">Aguarde! O jogo iniciará assim que o Professor permitir ★</a>';
            $Open = "OPEN";
            $link = '';
        }

        echo "<p class='text-center'>" . $Status . "</p>";

        if (!empty($link)) {
            echo "<p class='text-center'>" . $link . "</p>";
        }
    }


    public static function desenhaPartidaZona($partida)
    {

        echo "<div class=' text-center'>";
        echo "<div class='zonaP text-right'>"; // Adicione a classe zonaP aqui
        echo "<table class='table'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th scope='col'></th>";
        echo "<th scope='col' class='text-center'>ZONAS</th>";
        echo "<th scope='col'></th>";
        echo "</tr>";
        echo "<tr>";
        echo "<th scope='col'>Nome</th>";
        echo "<th scope='col'>Qntd Plantas</th>";
        echo "<th scope='col'>Pontos Totais</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        foreach ($partida->getZonas() as $zona) {

            echo "<tr>";
            echo "<td>" . $zona->getNomeZona() . "</td>";
            echo "<td style='color: #338a5f;'>" . $zona->getQntdPlanta() . "</td>";
            echo "<td style='color: #338a5f;'>" . $zona->getPontosTotais() . "</td>";
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
        echo "</div>"; // Feche a div com a classe zonaP
        echo "</div>";
    }

    public static function desenhaPartidaEquipe($partida)
    {

        echo "<div class=' text-center'>";
        echo "<div class='equipeP text-right'>"; // Adicione a classe equipeP aqui
        echo "<table class='table'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th scope='col'></th>";
        echo "<th scope='col' class='text-center'>EQUIPES</th>";
        echo "<th scope='col'></th>";
        echo "</tr>";
        echo "<tr>";
        echo "<th scope='col'>Nome</th>";
        echo "<th scope='col'>Cor</th>";
        echo "<th scope='col'>Icon</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        foreach ($partida->getEquipes() as $equipe) {
            echo "<tr>";
            echo "<td>" . $equipe->getNomeEquipe() . "</td>";
            echo "<td style='background-color: " . $equipe->getCorEquipe() . "'></td>";
            echo "<td style='color: #338a5f;'> <img style='width: 60px;' src='" . $equipe->getIconeEquipe() . "'/></td>";
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
        echo "</div>"; // Feche a div com a classe zonaP
        echo "</div>";
    }

    public static function desenhaJogadorEquipe($partida)
    {
        $partCont = new PartidaController();
        echo "<div class='container text-center equipe'>";
        echo "<div class='row row-cols-4'>";

        $idPartida = $partida->getIdPartida();

        foreach ($partida->getEquipes() as $equipe) :

            $jogadores = $partCont->contarJogadoresEquipe($partida->getIdPartida(), $equipe->getIdEquipe());
            $maxJogadores = $partida->getLimiteJogadores();
            $urlDisabled = ($jogadores == $maxJogadores) ? "'#'" : "'processEquipe.php?ide=" . $equipe->getIdEquipe() . "&idp=" . $idPartida . "'";
            $textoBotao = ($jogadores == $maxJogadores) ? "Essa equipe está cheia!" : "Quero essa!";

            echo "<div class='col-md-6'>";
            echo "<br>";
            echo "<div class='card' style='width: 22rem;'>";
            echo "<a><img src='" . $equipe->getIconeEquipe() . "' style='width: 55%; height: 50%;'class='card-img-top mais' alt='...'></a><br>";
            echo "<div class='card-body' style='background-color:" . $equipe->getCorEquipe() . "'>";
            echo "<h5 class='card-title nome-soc' id='nomeEquipe'>" . $equipe->getNomeEquipe() . "</h5>";
            echo "<p class='card-text nome-texto' style='background-color: #ffffff; border-radius: 3px;'> Jogadores: " . $jogadores . "/" . $maxJogadores . "</p>";
            echo "<a href=" . $urlDisabled . " class='btn btn-primary excluir' id='escolherEquipe' style='border-width: 3px;
            border-color: #ffffff;'>$textoBotao</a>";
            echo "<br>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        endforeach;

        echo "</div>";
        echo "</div>";
    }

    public static function desenhaRanking($partida)
    {

        echo "<div class='text-center'>";
        echo "<h1 class='titulorank text-center'>Placar de Líderes</h1>";
        echo "<div class='equipeP text-right'>"; // Adicione a classe equipeP aqui
        echo "<div class='text-center'> </div>";
        echo "</div>";
        echo "<br>";


        $equipes = $partida->getEquipes();

        // Classifique as equipes com base na pontuação final (em ordem decrescente)
        usort($equipes, function ($a, $b) {
            $pontuacaoA = (int)$a->getPontuacaoEquipe();  // Convertendo para inteiro
            $pontuacaoB = (int)$b->getPontuacaoEquipe();  // Convertendo para inteiro
            return $pontuacaoB - $pontuacaoA;  // Realizando a comparação
        });

        $lugar = 1;
        foreach ($equipes as $equipe) {
            $pontosEquipe = (int)$equipe->getPontuacaoEquipe();
            echo "<div style='background-color: " . $equipe->getCorEquipe() . "'>";
            echo "<br>";
            echo "<a id='lugarzinho'> <div class='d-flex justify-content-center' id='lugarzinho1'>" . $lugar . "º Lugar </a></div>";
            echo "<div id='nomezinho'>" . $equipe->getNomeEquipe() . "</div>";
            echo "<div style='color: #338a5f;'> <img style='width: 80px;' src='" . $equipe->getIconeEquipe() . "'/></div>";
            echo "<div id='pontosfinal'>" . $pontosEquipe . "</div>";
            echo "<div class='text-center' id='pontinhos'> Pontos </div>";
            echo "<br>";
            echo "</div>";
            echo "<br><br>";
            $lugar += 1;
        }

        echo "</div>"; // Feche a div com a classe zonaP
        echo "</div>";
    }
}
?>