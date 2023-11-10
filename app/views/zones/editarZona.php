<?php include_once("../../controllers/LoginController.php");
LoginController::manterUsuario();
LoginController::verificarAcesso([2, 3]);
?>
<?php if (isset($_SESSION['msg_erro'])) : ?>
    <span>
        <?= $_SESSION['msg_erro'] ?>
    </span>
<?php endif ?>
<?php include_once("../../controllers/ZonaController.php");


global $idEditarZona;
if (!isset($_GET['id'])) {
    $id = null;
} else {
    $id = $_GET['id'];
}

if ($id !== null) {
    $zonaCont = new ZonaController();
    $zona = $zonaCont->buscarPorId($id);
} else if ($idEditarZona !== null) {
    $zonaCont = new ZonaController();
    $zona = $zonaCont->buscarPorId($idEditarZona);
} else {
    echo "Zona não encontrada!<br>";
    echo "<a href='listZonas.php'>Voltar</a>";
    exit;
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>

    <title>Editar Zona</title>
    <?php include_once("../../bootstrap/header.php"); ?>
    <link rel="stylesheet" href="../csscheer/zona.css">

</head>

<style>
    html,
    body {
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

    <?php include_once("../../bootstrap/navADM.php"); ?>

</nav>

<body>
    <main>
        <nav id="primeirotextoindex">
            <div class="container">
                <div class="row justify-content-md-left">

                    <div id="corpo-registro">

                        <div class="row">
                            <div class="col">
                                <h1 id="primeirotextoreg"> Edite uma Zona!</h1>


                                <form action="editarZonaExec.php" method="POST" enctype="multipart/form-data">
                                    <div class="container" id="reg1">
                                        <div class="row">
                                            <div class="col-sm">


                                                <div class="form-row align-items-left">

                                                    <label for="formtexto" id="txtNome">Nome da Zona: </label>
                                                    <div class="w-100"></div>
                                                    <input type="text" name="Nome_Zona" class="form-control" id="txtNomeZona" style="width: 80%;" aria-describedby="nome-cadastro" value="<?php echo isset($_POST['Nome_Zona']) ? $_POST['Nome_Zona'] : $zona->getNomeZona(); ?>">
                                                    <?php if (isset($errors) && !empty($errors) && isset($errors['Nome_Zona'])) { ?>
                                                        <div class="alert alert-warning" style="position: left;"><?php echo $errors['Nome_Zona']; ?></div>
                                                    <?php } ?>
                                                    <div class="w-100"></div>

                                                    <div class="container">
                                                        <button type="submit" class="btn btn-primary btn-lg" id="botoesregistrar"><a>Editar</a> </button>
                                                        <button type="reset" class="btn btn-secondary btn-lg" id="botoeslimpar"> <a id="limpar"> Limpar</a>
                                                        </button>
                                                    </div>

                                                    <input type="hidden" name="id_zona" value="<?php echo $zona->getIdZona(); ?>" /> 
                                                    <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['ID']; ?>" />

                                </form>


    </main>
    <?php include_once("../../bootstrap/footer.php"); ?>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/grayscale.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>

</html>