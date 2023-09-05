<?php include_once("../../controllers/LoginController.php");
LoginController::manterUsuario();
LoginController::verificarAcesso([2, 3]);
?>
<?php if (isset($_SESSION['msg_erro'])): ?>
    <span>
        <?= $_SESSION['msg_erro'] ?>
    </span>
<?php endif ?>
<?php include_once("../../controllers/ZonaController.php");

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Adicionar Zona</title>
    <?php include_once("../../bootstrap/header.php");?>
    <link rel="stylesheet" href="../csscheer/zona.css">

</head>

<style>
    html, body {
        height: 100%;
    }

    body {
        display: flex;
        flex-direction: column;
        margin: 0;
        padding: 0;
    }

    main {
        flex: 1;
    }
</style>

<nav>

    <?php include_once("../../bootstrap/navADM.php");?>

</nav>


<body>
    <main>
        <nav id="primeirotextoindex">
            <div class="container">
                <div class="row justify-content-md-left">

                    <div id="corpo-registro">

                        <div class="row">
                            <div class="col">
                                <h1 id="primeirotextoreg"> Adicione uma Zona!</h1>


                            <form action="adicionarZonaExec.php" method="POST" enctype="multipart/form-data">
                            <div class="container" id="reg1">
                            <div class="row">
                            <div class="col-sm">


                            <div class="form-row align-items-left">
                            <div class="w-100" >
                            <label for="formtexto" id="txtNome">Nome da Zona: <br> <span id="resultzona"></span></label>
                            <div class="w-100"></div>
                            <input type="text" name="Nome_Zona" class="form-control" id="txtNomeZona" style="width: 88%;" aria-describedby="nome-cadastro" value="<?php echo isset($_POST['Nome_Zona']) ? $_POST['Nome_Zona'] : ''; ?>">
                            <?php if (isset($errors) && !empty($errors) && isset($errors['Nome_Zona'])) { ?>
                            <div class="alert alert-warning" style="position: left;"><?php echo $errors['Nome_Zona']; ?></div>
                            <?php } ?>
                            <div class="w-100" ></div>
                            
                            
                            </div>

                            <div class="container">
                            <button type="submit" class="btn btn-primary btn-lg" id="botoesregistrar"><a>Adicionar</a> </button>
                            <button type="reset" class="btn btn-secondary btn-lg" id="botoeslimpar"> <a id="limpar"> Limpar</a>
                            </button>
                            </div>
                            </div>

                            </form>
                            <br><br><br><br>

    </main>
    <?php include_once("../../bootstrap/footer.php");?>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/grayscale.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</body>
<style> 
    html, body {
        height: 100%;
    }

    body {
        display: flex;
        flex-direction: column;
        margin: 0;
        padding: 0;
    }

    main {
        flex: 1;
    }
</style>
</html>
