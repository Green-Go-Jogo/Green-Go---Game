<?php

include_once("../../controllers/LoginController.php");

LoginController::manterUsuario();

include_once("../../controllers/PlantaController.php");
include_once("../../controllers/ZonaController.php");
include_once("../../controllers/PartidaController.php");
include_once("../../controllers/EspecieController.php");
include_once("../zones/htmlZonaForm.php");
include_once("../plantas/htmlPlanta.php");
include_once("../especies/htmlEspecie.php");


$fromQR = isset($_GET['qrcode']) && $_GET['qrcode'] == true;
$fromCod = isset($_GET['code']) && $_GET['code'] == true;
$ide = isset($_GET['ide']) ? $_GET['ide'] : null;
$idp = isset($_GET['idp']) ? $_GET['idp'] : null;
$cod = isset($_GET['cod']) ? $_GET['cod'] : null;
if (!isset($_SESSION['TIPO'])) {
    $tipo = null;
} else {
    $tipo = $_SESSION['TIPO'];
}

if ($cod !== null) {
    $plantaCont = new PlantaController();
    $planta = $plantaCont->buscarPorCodigo($cod);
}


if (($fromQR || $fromCod) && $tipo) {
    if ($_SESSION['PARTIDA']) {
        $partidaCont = new PartidaController();
        $idPlanta = ($idp != null) ? $idp : $planta->getIdPlanta();
        $partida = $partidaCont->buscarPartidaAndamentoPorIdUsuario($_SESSION['ID']);
        if($partida === null) {
            $_SESSION['PARTIDA'] == false;
            echo "<p class='text-center'>A partida não existe mais! <a style='color: #C05367' href='../home/indexJOG.php'>Clique aqui</a> para a retornar à página inicial!</p>";
            exit;
          }
        $arrayQuestoes = $partida->getQuestoesRespondidas();
        $msgFind = $partidaCont->checarQRCode($idPlanta, $_SESSION['PLANTAS_LIDAS'], $_SESSION['ID']);
        $msgReturn = "<a href='../partidas/mainJogo.php?idp=" . $partida->getIdPartida() . "&ide=" . $partida->getIdEquipe() . "' id='voltarjogo'> Encontrou outra planta? Volte para o jogo! </a>";
    } else {
    };
}

if ($ide !== null) {
    $especieCont = new EspecieController();
    $especie = $especieCont->buscarPorId($ide);
}

if ($idp !== null) {
    $plantaCont = new PlantaController();
    $planta = $plantaCont->buscarPorId($idp);
}

$frutifera = $especie->getFrutifera();
if ($frutifera == 1) {
    $frut = "<br>" . "Frutos Comestíveis";
} else {
    $frut = "";
};

$exotica = $especie->getExotica();
if ($exotica == 1) {
    $exot = "<br>" . "Exótica";
} else {
    $exot = "";
};

$toxidade = $especie->getToxidade();
if ($toxidade == 1) {
    $tox = "<br>" . "Tóxica";
} else {
    $tox = "";
};

$medicinal = $especie->getMedicinal();
if ($medicinal == 1) {
    $med = "<br>" . "Medicinal";
} else {
    $med = "";
};

$comestivel = $especie->getComestivel();
if ($comestivel == 1) {
    $come = "<br>" . "Comestível";
} else {
    $come = "";
};

$nativa = $especie->getNativa();
if ($nativa == 1) {
    $nat = "<br>" . "Nativa";
} else {
    $nat = "";
};

$endemica = $especie->getEndemica();
if ($endemica == 1) {
    $ende = "<br>" . "Endêmica";
} else {
    $ende = "";
};

$panc = $especie->getPanc();
if ($panc == 1) {
    $pan = "<br>" . "PANC";
} else {
    $pan = "";
};

$ornamental = $especie->getOrnamental();
if ($ornamental == 1) {
    $orn = "<br>" . "Ornamental";
} else {
    $orn = "";
};

if ($planta == null) {
    echo "Planta não encontrado!<br>";
    echo "<a href='listPlantas.php'>Voltar</a>";
    exit;
}

$nomeSocial = $planta->getNomeSocial();
$nomePopular = $especie->getNomePopular();
?>

<!DOCTYPE html>
<html lang="pt-br">

<title>
    <?php if (!empty($nomeSocial)) {
        echo $nomeSocial;
    } else {
        echo $nomePopular;
    }
    ?>
</title>

<head>
    <?php include_once("../../bootstrap/header.php"); ?>
    <link rel="stylesheet" href="../csscheer/verplanta.css">

</head>
<style>
    body {
        overflow-x: hidden !important;
    }
</style>

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

    <div class="container">

        <label id="labelnomesocial">
            <?php if (!empty($nomeSocial)) {
                echo "Nome Social:";
            } else {
                echo "Nome Popular:";
            } ?>
        </label> <br>
        <div class="titulo">
            <div class="row">
                <h1 class="nome text-center" id="nomePlanta">
                    <?php if (!empty($nomeSocial)) {
                        echo $nomeSocial;
                    } else {
                        echo $nomePopular;
                    } ?>
                </h1>
            </div> <br>

            <?php if (!empty($nomeSocial)) { ?>
                <h1 class="nome" id="nomeUm">
                    <a> Nome Popular: </a> <a style="color: #C05367; font-family: Poppins;"> <?= $especie->getNomePopular() ?> </a>
                </h1>
            <?php } ?>
            <h1 class="nome" id="nomeDois">
                <a> Nome Científico: </a> <i style="color: #C05367; font-family: Poppins;"> <?= $especie->getNomeCientifico() ?></i>
            </h1>
        </div>

        <div class="container">
            <p class="codigo text-right" id="codigoPlanta">
                Código: <?= $planta->getCodNumerico() ?>
            </p>
        </div>
    </div>


    <div class="text-center" id="imagem1Planta">
        <img id="imagemPlanta" src="<?= $imagemPlanta = !empty($planta->getImagemPlanta()) ? $planta->getImagemPlanta() : $especie->getImagemEspecie(); ?>" />
        <br> <br>
        <span id='autoria'>Autoria da Foto: <?= $especie->getAutoriaImagem(); ?></span>
    </div>
    <div class="container">
        <div>

            <div class=" text-center">
                <?php if (isset($_SESSION['PARTIDA']) && $_SESSION['PARTIDA'] == true) {
                    echo "<p class='descricao text-center' id='pontos'>";
                    echo    "Pontos:" . $planta->getPontos();
                    echo "</p>";
                }
                ?>
                <p class=" descricao" id="atributos">
                    <?php echo $tox; ?>
                    <?php echo $med; ?>
                    <?php echo $come; ?>
                    <?php echo $exot; ?>
                    <?php echo $frut; ?>
                    <?php echo $pan; ?>
                    <?php echo $ende; ?>
                    <?php echo $orn; ?>
                    <?php echo $nat; ?>
                </p>
            </div>

            <br>
            <br>
            <w id="nomespecie"> História da Espécie: </w>
            <h1 class="descricao" id="historiaespecie">
                <?= $especie->getDescricao() ?>
            </h1>
            </h1> <br><br>
            <w id="nomespecie"> Fontes: </w>
            <h1 class="descricao" id="historiaespecie">
                <div id="preview" class="ckeditor-content">
                    <?php if (!empty($especie->getFontes())) {
                        echo $especie->getFontes();
                    } else {
                        echo "<p>Nenhuma fonte para a história da espécie</p>";
                    } ?>
                </div>
            </h1> <br><br>
            

            <?php if (!empty($planta->getPlantaHistoria())) { ?>
            <w id="nomespecie"> História da Planta: </w>
            <h1 class="descricao" id="historiaplanta">
                <?= $planta->getPlantaHistoria() ?>
            </h1> 
            <?php } ?>
            <br><br>
            <div class="descricao">
                <p id="publicacao">Publicado por <?php echo "<span id='nomePub'>" . $especie->getUsuario()->getNomeUsuario() . "</span>"; ?>
                    em <?php
                        if (!empty($especie->getDataAtualizacao())) {
                            $dataOriginal = $especie->getDataAtualizacao();
                            $data = new DateTime($dataOriginal);
                            $dataFormatada = $data->format('d/m/y \à\s H:i');
                            echo "<span id='dataPub'>" . $dataFormatada . "</span>";
                        } else {
                            $dataOriginal = $especie->getDataCriacao();
                            $data = new DateTime($dataOriginal);
                            $dataFormatada = $data->format('d/m/y \à\s H:i');
                            echo "<span id='dataPub'>" . $dataFormatada . "</span>";
                        }

                        ?>
                </p>
            </div>

            <div class="text-center">
                <img id="mapa" src="../../public/mapa.png">
                <w id="zonaencontrada">
                    <?php if (!empty($nomeSocial)) {
                        echo $nomeSocial;
                    } else {
                        echo $nomePopular;
                    } ?>
                    encontra-se na
                    <?= $planta->getZona() ?>!
                </w>
            </div>
            <br>
            <br>
            <div class="text-center">
                <?php
                if (isset($_SESSION['PARTIDA']) && $_SESSION['PARTIDA'] == true && strpos($msgFind, 'Essa planta não pertence à uma das zonas da sua partida!') === false) {
                    PlantaHTML::desenhaQuestoes($idp, $arrayQuestoes);
                }
                ?>
            </div>
        </div>
        <br>
        

        <br><br><br>
        <div class="text-center">
            <?php if (isset($msgReturn)) {
                echo $msgReturn;
            } ?>
        </div>


        <br>
    </div>

    <?php include_once("../../bootstrap/footer.php"); ?>
</body>
<script>
    const enviarQuizBotao = document.getElementById('submitQuiz');
    var idUsuario = <?php echo $_SESSION['ID'] ?>;
    var idPlanta = <?php echo $idp ?>;
    var questoesArrayPHP = <?php
                            $arrayTemp = explode("|", $arrayQuestoes);
                            $questoesString = implode(" - ", $arrayTemp);
                            echo json_encode($questoesString);
                            ?>;
    let arrayQuestoes = questoesArrayPHP.split("-").filter(item => item !== "").map(Number);


    function validarQuiz() {
        var questionRadios = document.querySelectorAll(".pergunta input[type=radio]");
        var radioChecked = Array.prototype.some.call(questionRadios, function(radio) {
            return radio.checked;
        });
        return radioChecked; // Retorna true se pelo menos um rádio estiver checado, caso contrário false
    }

    function enviarQuiz() {

        //Valida se todas as questões foram respondidas
        var valida = validarQuiz()
        if (valida == false) {
            return alert("Por favor, selecione ao menos uma resposta para submeter o formulário.");
        }

        //Pega todos os radios marcados
        var radios = document.querySelectorAll('input[type="radio"]');
        var values = [];

        radios.forEach(function(radio) {
            // Verifica se o input está marcado
            if (radio.checked) {
                // Obtém o atributo "value" do input
                var value = radio.getAttribute('value');

                // Se o valor for "respondida", não faz nada
                if (value === "respondida") {
                    return; // Continua para o próximo radio
                }

                // Verifica se o valor já está no array
                if (values.indexOf(value) === -1) {
                    values.push(value); // Adiciona o valor ao array
                }
            }
        });

        if (values.length === 0) {
            return alert("Por favor, selecione ao menos uma resposta para submeter o formulário.");
        }
        
        enviarQuizBotao.setAttribute('onclick', '');
        enviarQuizBotao.disabled = true;
        enviarQuizBotao.innerHTML = "Resposta enviada!"

        $.ajax({
            type: "POST",
            url: "../partidas/verificarResposta.php",
            data: {
                idUsuario: idUsuario,
                alternativas: values,
                arrayQuestoes: arrayQuestoes,
                idPlanta: idPlanta
            },
            dataType: "json", // Espera uma resposta JSON
            success: function(userResponse) {
                if (userResponse.isValid === true) {

                    var respostas = userResponse.respostas;

                    var correcaoHTML = '<div class="correcao">';

                    Object.keys(respostas).forEach(function(key) {
                        var resposta = respostas[key];
                        var correcaoHTML = '<div class="correcao" id="' + (resposta === true ? 'correta' : 'incorreta') + '" >';

                        // Adicionar texto da correção com base na resposta
                        correcaoHTML += 'Questão: ' + (resposta === true ? 'Correta' : 'Incorreta');

                        correcaoHTML += '</div>';

                        // Adicionar a div correcaoHTML ao documento
                        $(correcaoHTML).insertAfter('.correcao_' + key);

                        //Tira o value das questões respondidas
                        alterarValorRadio("question=" + key, "respondida");
                    });
                } else {
                    console.log("Seus pontos possivelmente foram somados, mas o servidor não conseguiu te devolver a resposta.");
                }
            },
            error: function() {
                console.log("Ocorreu um erro de requisição, contate um professor ou administrador.");
            }
        });

        function alterarValorRadio(name, novoValor) {
            var radios = document.querySelectorAll('input[type=radio][name="' + name + '"]');
            radios.forEach(function(radio) {
                radio.value = novoValor;
            });
        }
    }
</script>
<script>
    function atualizarDados() {
        // Verifique se a variável de sessão PARTIDA é verdadeira
        var partidaAtiva = <?php echo ($_SESSION['PARTIDA'] ? 'true' : 'false'); ?>;

        if (partidaAtiva === true) {
            // A variável de sessão PARTIDA é verdadeira
            $.ajax({
                type: "POST",
                url: "rankingExec.php",
                dataType: "json",
                data: {
                    userID: <?php echo $_SESSION["ID"]; ?> // Envie o ID do usuário
                },
                success: function(userResponse) {
                    if (userResponse.isValid === true) {
                        // Redirecionar para a página se a resposta for verdadeira
                        window.location.href = "../partidas/rankPartida.php?id=" + userResponse.idPartida;
                    } else {

                    }
                },
                error: function() {
                    console.log("O Rank ainda não foi definido!");
                }
            });
        } else {
            // A variável de sessão PARTIDA não é verdadeira
            console.log("Partida não está ativa");
        }
    };

    atualizarDados();

    // Usar setInterval para chamar a função a cada x milissegundos.
    setInterval(atualizarDados, 15000); // Atualizar a cada segundo (1000 ms).
</script>

</html>