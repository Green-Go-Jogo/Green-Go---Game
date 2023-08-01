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

    <!--scripts-->
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
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
</head>
<body>
<main>
        <nav id="primeirotextoindex">
            <div class="container">
                <div class="row justify-content-md-left">

                    <div id="corpo-registro">

                        <div class="row">
                            <div class="col">
                                <h1 id="primeirotextoreg"> Crie uma partida!</h1>


                            <form action="adicionarPlantaExec.php" method="POST" enctype="multipart/form-data">
                            <div class="container" id="reg1">
                            <div class="row">
                            <div class="col-sm">


                            <div class="form-row align-items-left">
                            <div class="w-100">
                            <label for="formtexto" id="txtNome">Nome da Partida:</label>
                            <div class="w-100"></div>
                            <input type="text" name="Nome_Partida" class="form-control" id="txtNomeForm" aria-describedby="nome-cadastro" value="<?php echo isset($_POST['Nome_Partida']) ? $_POST['Nome_Partida'] : ''; ?>">
                            <div class="w-100"></div>
                            <br>
                            <?php if (isset($errors) && !empty($errors) && isset($errors['Nome_Partida'])) { ?>
                            <div class="alert alert-warning" style="position: left;"><?php echo $errors['Nome_Partida']; ?></div>
                            <?php } ?>

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
</html>