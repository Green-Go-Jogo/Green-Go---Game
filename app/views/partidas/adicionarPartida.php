<?php include_once("../../controllers/ZonaController.php");
      include_once("../../controllers/EquipeController.php");
      include_once("../zones/htmlZonaForm.php");
      include_once("../equipes/htmlEquipeForm.php");
      include_once("../users/sessions.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Partida</title>
    

    <!--FAVICON-->
    <link rel="icon" href="../public/favicon.svg">
    <!-- Fonte -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;700&display=swap" rel="stylesheet">
    <!--BOOTSTRAP-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!--scripts-->
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
        <script>  $(document).ready(function() {
                     $('select').addClass('custom-selectize').selectize({
                    sortField: 'text'
                    });
        }); </script>
        <!-- Progress bar -->
    <script src="js/progressbar.min.js"></script>
    <!-- Parallax -->
    <script src="https://cdn.jsdelivr.net/parallax.js/1.4.2/parallax.min.js"></script>
    <link rel="stylesheet" href="../css/adicionarplanta.css">
    <link rel="stylesheet" href="../css/plantas.css">
    <link rel="stylesheet" href="../css/listPlanta.css">
    
    <?php include_once("../../bootstrap/header.php");?>
    <link rel="stylesheet" href="css/index.css">


    <link rel="stylesheet" href="css/editorwys.css" type="text/css" media="all" />
    <script type="text/javascript" src="../js/script.js"></script>
    <script type="text/javascript" src="../js/addValue.js"></script>
</head>
<style>

img {
    width: 30%;
    height: auto;
}

.cke_resizer {
display: none !important;
}

      

#txtNomeForm {
    border-radius: 5px;
}

#txtPontos {
    border-radius: 5px;
}

#carregueimagemtexto {
    margin-bottom: 5px;
}

.container > :is(.preview-image, .form) {
  width: 100%;
}

.container > .preview-image > img {
  width: 100%;
  object-fit: contain;
}

.container > .form {
  display: flex;
  gap: 16px;
  flex-wrap: wrap;
}

.container > .form > input {
  width: 100%;
  border: 1px solid rgba(200, 200, 200, 1);
  padding: 8px;
  font-size: 16px;
  border-radius: 4px;
}
.container > .form > input::-webkit-file-upload-button {
  font-size: 12px;
  font-family: "Space Grotesk";
  border: 1px solid rgba(200, 200, 200, 1);
  border-radius: 4px;
  cursor: pointer;
}

.container > .form > button {
  padding: 8px 16px;
  font-size: 16px;
  cursor: pointer;
  border: 1px solid rgba(200, 200, 200, 1);
  border-radius: 4px;
}

/* Estilos para o campo de texto do Selectize.js */
.selectize-control.single .selectize-input,
.selectize-control.single .selectize-input:focus, 
.selectize-control.single .selectize-input.full {
  width: 500px;
  margin-top: 1px;
  color: #ebf0f1;
  background-color: #f0b6bc;
  font-family: Poppins-semibold;
}

/* Estilos para o dropdown do Selectize.js */
.selectize-dropdown-content .option {
  color: #ebf0f1;
  background-color: #f0b6bc;
  font-family: Poppins-semibold;
}

.selectize-dropdown-content .option:hover {
  background-color: #ec737c;
}



/* Estilos para o item selecionado no Selectize.js */
.selectize-control.single .item {
  background-color: #f0b6bc;
  color: #ebf0f1;
  font-family: Poppins-semibold;
}

/* Estilos para o item selecionado quando o dropdown está ativo */
.selectize-input.active {
  background-color: #f0b6bc;
  color: #ebf0f1;
  font-family: Poppins-semibold;
}


</style>
<body>
<main>

<?php include_once("../../bootstrap/navADM.php") ?>

        <nav id="primeirotextoindex">
            <div class="container">
                <div class="row justify-content-md-left">

                    <div id="corpo-registro">

                        <div class="row">
                            <div class="col">
                                <h1 id="primeirotextoreg"> Crie uma partida!</h1>


                            <form action="adicionarPartidaExec.php" method="POST" enctype="multipart/form-data">
                            <div class="container" id="reg1">
                            <div class="row">
                            <div class="col-sm">


                            <div class="form-row align-items-left">
                            <div class="w-100">
                            <label for="formtexto" id="txtNome">Nome da Partida:</label>
                            <div class="w-100"></div>
                            <input type="text" name="Nome_Partida" class="form-control" id="txtNomeForm" aria-describedby="nome-cadastro" value="<?php echo isset($_POST['Nome_Partida']) ? $_POST['Nome_Partida'] : ''; ?>">
                            <div class="w-100"></div>
                            <?php if (isset($errors) && !empty($errors) && isset($errors['Nome_Partida'])) { ?>
                            <div class="alert alert-warning" style="position: left;"><?php echo $errors['Nome_Partida']; ?></div>
                            <?php } ?>

                            <div class="form-group">
                            <label for="selectZona" id="txtNome">Zona:</label>  
                            <button type="button" id="addButtonZona" class="btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="30" fill="#04574d" viewBox="0 0 16 16">
                            <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zM8.5 6v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 1 0z"/> </svg>
                            </button>
                            <div class="w-100"></div>
                            <br>
                            <a id="txtZonaForm">
                            <?php
                            $zonaCont = new ZonaController();
                            $zonas = $zonaCont->listar();

                             ZonaHTMLForm::desenhaSelect($zonas, "zona_partida", "SomPlanta");
                            ?>

                            <div class="form-group">
                            <label for="selectEquipe" id="txtNome">Equipe:</label>
                            <button type="button" id="addButtonEquipe" class="btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="30" fill="#04574d" viewBox="0 0 16 16">
                            <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zM8.5 6v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 1 0z"/> </svg>
                            </button>
                            <div class="w-100"></div>
                            <br>
                            <a id="txtEquipeForm">
                            <?php
                            $equipeCont = new EquipeController();
                            $equipes = $equipeCont->listar();

                             EquipeHTMLForm::desenhaSelect($equipes, "equipe_partida", "nome_equipe");
                            ?>
                            </a>
                            

                            <br>
                            <label for="formtexto" id="txtNome">Limite de Jogadores:</label>
                            <div class="w-100"></div>
                            <input type="number" name="Limite_Jogadores" class="form-control" id="txtNomeForm" aria-describedby="nome-cadastro" value="<?php echo isset($_POST['Limite_Jogadores']) ? $_POST['Limite_Jogadores'] : ''; ?>">
                            <div class="w-100"></div>  

                            <label for="formtexto" id="txtNome">Tempo de Partida:</label>
                            <div class="w-100"></div>
                            <input type="number" name="Tempo_Partida" class="form-control" id="txtNomeForm" aria-describedby="nome-cadastro" value="<?php echo isset($_POST['Tempo_Partida']) ? $_POST['Tempo_Partida'] : ''; ?>">
                            <div class="w-100"></div>

                            <label for="formtexto" id="txtNome">Senha da Sala:</label>
                            <div class="w-100"></div>
                            <input type="text" name="Senha_Sala" class="form-control" id="txtNomeForm" aria-describedby="nome-cadastro" value="<?php echo isset($_POST['Senha_Sala']) ? $_POST['Senha_Sala'] : ''; ?>">
                            <div class="w-100"></div>

                            <label for="formtexto" id="txtNome">Confirmação Senha da Sala:</label>
                            <div class="w-100"></div>
                            <input type="text" name="ConfSenha_Sala" class="form-control" id="txtNomeForm" aria-describedby="nome-cadastro" value="<?php echo isset($_POST['ConfSenha_Sala']) ? $_POST['ConfSenha_Sala'] : ''; ?>">
                            <div class="w-100"></div>

                            <div class="container">
                            <button type="submit" class="btn btn-primary btn-lg" id="botoesregistrar"><a>Adicionar</a> </button>
                            <button type="reset" class="btn btn-secondary btn-lg" id="botoeslimpar"> <a id="limpar"> Limpar</a>
                            </button>
                            <br>
                            <br>
                            </div>

                            <input type="hidden" name="id_usuario" value="<?php echo $idADM ?>" />

                            </form>


    </main>
    
</body>
<script src="https://kit.fontawesome.com/f4553a5b7e.js" crossorigin="anonymous"></script>
</html>