<?php include_once("../../controllers/LoginController.php");
LoginController::manterUsuario();
?>
<?php include_once("../../controllers/ZonaController.php");
      include_once("../../controllers/EspecieController.php");
      include_once("../../controllers/PlantaController.php");
      include_once("../zones/htmlZonaForm.php");
      include_once("../especies/htmlEspecieForm.php");
      include_once("../../controllers/LoginController.php");



      global $idEditarPlanta;
      if (!isset($_GET['id'])) {
        $id = null;
    } else {
        $id = $_GET['id'];
    }

      if ($id !== null) {
        $plantaCont = new PlantaController();
        $planta = $plantaCont->buscarPorId($id);
    } else if ($idEditarPlanta !== null) {
        $plantaCont = new PlantaController();
        $planta = $plantaCont->buscarPorId($idEditarPlanta);
    } else {
        echo "Planta não encontrada!<br>";
        echo "<a href='listPlantas.php'>Voltar</a>";
        exit;
    }
?>




<!DOCTYPE html>
<html lang="pt-br">

<head>

    <title>Adicionar planta</title>
    <?php include_once("../../bootstrap/header.php");?>
    <script>  $(document).ready(function() {
                     $('select').addClass('custom-selectize').selectize({
                    sortField: 'text'
                    });
    }); 
    </script>  
    <link rel="stylesheet" href="../csscheer/planta.css">

</head>

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
                                <h1 id="primeirotextoreg">Editar uma planta!</h1>


                            <form action="editarPlantaExec.php" method="POST" enctype="multipart/form-data">
                            <div class="container" id="reg1">
                            <div class="row">
                            <div class="col-sm">


                            <div class="form-row align-items-left">
                            <div class="w-100">
                            <label for="formtexto" id="txtNome">Nome Social da Planta:</label>
                            <div class="w-100"></div>
                            <input type="text" name="Nome_Social" class="form-control" id="txtNomeForm" aria-describedby="nome-cadastro" value="<?php echo isset($_POST['Nome_Social']) ? $_POST['Nome_Social'] : $planta->getNomeSocial(); ?>">
                            <div class="w-100"></div>
                            <br>
                            <?php if (isset($errors) && !empty($errors) && isset($errors['Nome_Social'])) { ?>
                            <div class="alert alert-warning" style="position: left;"><?php echo $errors['Nome_Social']; ?></div>
                            <?php } ?>
                            
                            <div class="w-100"></div>
                            <label for="formtexto" id="txtCodigo">Código numérico:</label>
                            <div class="w-100"></div>
                            <input readonly type="number" name="Cod_Numerico" class="form-control" id="txtCodigoForm" aria-describedby="nome-cadastro" value="<?php echo $planta->getCodNumerico(); ?>">
                                           

                            <div class="form-group">
                            <label for="selectStand" id="txtNome">Zona:</label>
                            <div class="w-100"></div>
                            <a id="txtZonaForm">
                            <?php
                            $zonaCont = new ZonaController();
                            $zonas = $zonaCont->listar();

                            ZonaHTMLForm::desenhaSelect($zonas, "zona_planta", "SomPlanta", $planta->getZona()->getIdZona());
                            ?>
                        
                            </div> </a>
                            <?php if (isset($errors) && !empty($errors) && isset($errors['zona_planta'])) { ?>
                            <div class="alert alert-warning"> <?php echo $errors['zona_planta']; ?></div>
                            <?php } ?>
                            
                            <div class="form-group">
                            <label for="selectStand" id="txtNome">Espécie:</label>
                            <div class="w-100"></div>
                            <a id="txtNomeForm">
                            <?php
                            $especieCont = new EspecieController();
                            $especies = $especieCont->listar();

                            EspecieHTMLForm::desenhaSelect($especies, "especie_planta", "nome_especie", $planta->getEspecie()->getIdEspecie());
                            ?>
                            </div> </a>

                            <?php if (isset($errors) && !empty($errors) && isset($errors['especie_planta'])) { ?>
                            <div class="alert alert-warning"><?php echo $errors['especie_planta']; ?></div>
                            <?php } ?>

                            <label for="formtexto" id="txtPontos">Pontuação:</label>
                            <div class="w-100"> </div>
                            <input type="number" name="Pontuacao" class="form-control" id="txtCodigoForm" aria-describedby="nome-cadastro" value="<?php echo isset($_POST['Pontuacao']) ? $_POST['Pontuacao'] : $planta->getPontos(); ?>">
                            <div class="w-100"> </div>
                            <br>
                            <?php if (isset($errors) && !empty($errors) && isset($errors['Pontuacao'])) { ?>
                            <div class="alert alert-warning"><?php echo $errors['Pontuacao']; ?></div>
                            <?php } ?>

                            <br><br>

<div class="col-sm" id="imagemreg">

    <div class="form-group" id="imagemreg">
                </div></div>
                <a id="carregueimagemtexto"> Carregue uma imagem:</a> <br><br>
                <label class="picture align-content-center" for="picture__input" tabIndex="0">
                <span class="picture__image">
                <img class="img-camera" src="/img/d8ca819f5feac5192c31cb17633e1f1f.png">
                </span>
                </label>  
                <input type="file" required name="imagem" id="picture__input" accept=".png, .jpg, .jpeg"/>
                <a id="carregueimagemtexto2"> .png .jpg ou .jpeg tamanho mínimo: 2MB tamanho máximo: 5MB </a>
                </div> </div> 

                
            <br>
            <div class="w-100"></div>
            <div class="container" id="caixadetexto"> <br><br><br>
            <a id="textodescritivo">Descrição:</a> <br><br>
            <textarea id="editor" name="Historia" value=""></textarea>
            <script>
            CKEDITOR.replace('editor', {
            contentsCss: ['../csscheer/especie.css'],
            removePlugins: 'elementspath',
            toolbar: [
            { name: 'clipboard', items: [ 'Cut', 'Copy' ] },
            { name: 'undo', items: [ 'Undo', 'Redo' ] },
            { name: 'basicstyles', items: [ 'Italic', 'Bold', 'Strike', 'Underline' ] },
            { name: 'links', items: [ 'Link' ] }
            ]
            });
            </script>
            
            <?php if (isset($errors) && !empty($errors) && isset($errors['Descricao'])) { ?>
            <div class="alert alert-warning"><?php echo $errors['Descricao']; ?></div>
            <?php } ?>
            </div>

            <div class="container"> <br><br>
            <button type="submit" class="btn btn-primary btn-lg" id="botoesregistrar"><a>Adicionar</a> </button>
            <button type="reset" class="btn btn-secondary btn-lg" id="botoeslimpar"> <a id="limpar"> Limpar</a>
            </button>
            </div>

            <input type="hidden" name="id_planta" value="<?php echo $planta->getIdPlanta(); ?>" />
            <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['ID']; ?>" />


            </form>

</div>
</div>
<br><br>


    </main>
    <?php include_once("../../bootstrap/footer.php");?>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/imagem.js" defer></script>
</body>

</html>
