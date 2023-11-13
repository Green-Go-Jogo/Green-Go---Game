<?php include_once("../../controllers/ZonaController.php");
      include_once("../../controllers/EquipeController.php");
      include_once("../../controllers/PartidaController.php");
      include_once("../zones/htmlZonaForm.php");
      include_once("../equipes/htmlEquipeForm.php");
      include_once("../users/sessions.php");

      if (!isset($_GET['id'])) {
        $id = null;
    } else {
        $id = $_GET['id'];
    }

      if ($id !== null) {
        $partidaCont = new PartidaController();
        $partida = $partidaCont->buscarPorId($id);
    } else if ($idEditarpartida !== null) {
        $partidaCont = new PartidaController();
        $partida = $partidaCont->buscarPorId($idEditarPartida);
    } else {
        echo "Planta não encontrada!<br>";
        echo "<a href='listPlantas.php'>Voltar</a>";
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Editar Partida</title>
<?php include_once("../../bootstrap/header.php");?>
     <script>  $(document).ready(function() {
                     $('select').addClass('custom-selectize').selectize({
                    sortField: 'text'
                    });
        }); </script>

    <link rel="stylesheet" href="../csscheer/partida.css">
    
    <style>
        #cancelar {
        position: relative;
        color: #C05367;
        font-family: Poppins-medium;
        top: 10px;
        left: 40px;
        text-decoration: underline dotted;
        font-size: 20px;
    }

    #cancelar:hover {
    color: #ED8E96;
    font-family: Poppins-medium;
}

    </style>

</head>


<?php include_once("../../bootstrap/navADM.php") ?>
<body>
<main>



        <nav id="primeirotextoindex">
            <div class="container">
                <div class="row justify-content-md-left">

                    <div id="corpo-registro">

                        <div class="row">
                            <div class="col">
                                <h1 id="primeirotextoreg"> Edite sua partida!</h1>


                            <form action="adicionarPartidaExec.php" method="POST" enctype="multipart/form-data">
                            <div class="container" id="reg1">
                            <div class="row">
                            <div class="col-sm">


                            <div class="form-row align-items-left">
                            <div class="w-100">
                            <label for="formtexto" id="txtNome">Nome da Partida:</label>
                            <div class="w-100"></div>
                            <input type="text" name="Nome_Partida" class="form-control" id="txtNomeForm" aria-describedby="nome-cadastro" value="<?php echo isset($_POST['Nome_Partida']) ? $_POST['Nome_Partida'] : $partida->getNomePartida(); ?>">
                            <div class="w-100"></div>
                            <?php if (isset($errors) && !empty($errors) && isset($errors['Nome_Partida'])) { ?>
                            <div class="alert alert-warning" style="position: left;"><?php echo $errors['Nome_Partida']; ?></div>
                            <?php } ?>

                            <div class="form-group">
                            <label for="selectZona" id="txtNome">Adicionar Zona:</label>
                            <div class="input-group">
                            <?php
                            $zonaCont = new ZonaController();
                            $zonas = $zonaCont->listar();

                            ZonaHTMLForm::desenhaSelect($zonas, "partida_zona", "SomPlanta");
                            ?>
                            <div  class="input-group-append">
                            <button type="button" id="addButtonZona" class="btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="30" fill="#20A494" viewBox="0 0 16 16"> <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zM8.5 6v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 1 0z"/> </svg>
                            </button>
                            <br>
                            
                            
                            </div>
                            </div>
                            </div>
                            <div id="txtZona"></div>

                            <div class="form-group">
                            <label for="selectEquipe" id="txtNomeEquipe">Adicionar Equipe:</label>
                            <div class="input-group">
                            <?php
                            $equipeCont = new EquipeController();
                            $equipes = $equipeCont->listar();

                            EquipeHTMLForm::desenhaSelect($equipes, "partida_equipe", "nome_equipe");
                            ?>
                            <div class="input-group-append">
                            <button type="button" id="addButtonEquipe" class="btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="30" fill="#20A494" viewBox="0 0 16 16"> <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zM8.5 6v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 1 0z"/> </svg>
                            </button>
                            </div>
                            </div>
                            </div>
                            <div id="txtEquipe"></div>
                            

                            <br>
                            <label for="formtexto" id="txtNome">Máximo de Jogadores por Equipe:</label>
                            <div class="w-100"></div>
                            <input type="number" name="Limite_Jogadores" class="form-control" id="txtNomeForm" aria-describedby="nome-cadastro" value="<?php echo isset($_POST['Limite_Jogadores']) ? $_POST['Limite_Jogadores'] : ''; ?>">
                            <div class="w-100"></div>  
                            <?php if (isset($errors) && !empty($errors) && isset($errors['Limite_Jogadores'])) { ?>
                            <div class="alert alert-warning" style="position: left;"><?php echo $errors['Limite_Jogadores']; ?></div>
                            <?php } ?>

                            <br>
                            <label for="formtexto" id="txtNome">Tempo de Partida (em minutos):</label>
                            <div class="w-100"></div>
                            <input type="number" name="Tempo_Partida" class="form-control" id="txtNomeForm" aria-describedby="nome-cadastro" value="<?php echo isset($_POST['Tempo_Partida']) ? $_POST['Tempo_Partida'] : ''; ?>">
                            <div class="w-100"></div>
                            <?php if (isset($errors) && !empty($errors) && isset($errors['Limite_Jogadores'])) { ?>
                            <div class="alert alert-warning" style="position: left;"><?php echo $errors['Limite_Jogadores']; ?></div>
                            <?php } ?>

                            <label for="formtexto" id="txtNome">Senha da Sala:</label>
                            <div class="w-100"></div>
                            <input type="text" name="Senha_Sala" class="form-control" id="txtNomeForm" aria-describedby="nome-cadastro" value="<?php echo isset($_POST['Senha_Sala']) ? $_POST['Senha_Sala'] : ''; ?>">
                            <div class="w-100"></div>
                            <?php if (isset($errors) && !empty($errors) && isset($errors['Senha_Sala'])) { ?>
                            <div class="alert alert-warning" style="position: left;"><?php echo $errors['Senha_Sala']; ?></div>
                            <?php } ?>

                            <label for="formtexto" id="txtNome">Confirmação da Senha da Sala:</label>
                            <div class="w-100"></div>
                            <input type="text" name="ConfSenha_Sala" class="form-control" id="txtNomeForm" aria-describedby="nome-cadastro" value="<?php echo isset($_POST['ConfSenha_Sala']) ? $_POST['ConfSenha_Sala'] : ''; ?>">
                            <div class="w-100"></div>
                            <?php if (isset($errors) && !empty($errors) && isset($errors['ConfSenha_Sala'])) { ?>
                            <div class="alert alert-warning" style="position: left;"><?php echo $errors['ConfSenha_Sala']; ?></div>
                            <?php } ?>
                            <br> <br> <br>

                            <div class="container">
                            <button type="submit" class="btn btn-primary btn-lg" id="botoesregistrar"><a>Salvar</a> </button>
                            <button type="reset" class="btn btn-secondary btn-lg" id="botoeslimpar"> <a id="limpar"> Limpar</a>
                            </button>
                            <br> <a class="text-center" id="cancelar" href="../../views/partidas/PartidaADM.php"> Cancelar e Voltar </a>
                            <br>
                            <br>
                            </div>

                            <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['ID']; ?>" />

                            </form>


    </main>
    <?php include_once("../../bootstrap/footer.php") ?>
    <script type="text/javascript" src="../js/addValue.js"></script>
</body>

</html>