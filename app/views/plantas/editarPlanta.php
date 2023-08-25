<?php include_once("../../controllers/LoginController.php");
LoginController::manterUsuario();
LoginController::verificarAcesso([2, 3]);
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

    <title>Editar planta</title>
    <?php include_once("../../bootstrap/header.php");?>
    <script>  $(document).ready(function() {
                     $('select').addClass('custom-selectize').selectize({
                    sortField: 'text'
                    });
    }); 
    </script>  
    <link rel="stylesheet" href="../csscheer/planta.css">

</head>
<style>

.selectize-control.single .selectize-input,
.selectize-control.single .selectize-input:focus, 
.selectize-control.single .selectize-input.full {
  width: 500px;
  margin-top: 1px;
  color: #ebf0f1;
  background-color: #f0b6bc;
  font-family: Poppins-semibold;
}


.selectize-dropdown-content .option {
  color: #ebf0f1;
  background-color: #f0b6bc;
  font-family: Poppins-semibold;
}

.selectize-dropdown-content .option:hover {
  background-color: #ec737c;
}




.selectize-control.single .item {
  background-color: #f0b6bc;
  color: #ebf0f1;
  font-family: Poppins-semibold;
}


.selectize-input.active {
  background-color: #f0b6bc;
  color: #ebf0f1;
  font-family: Poppins-semibold;
}

.preview-image__img {
    width: 200px;
    height: auto;
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
                                <h1 id="primeirotextoreg">Edite uma planta!</h1>


                            <form id="formplanta" action="editarPlantaExec.php" method="POST" enctype="multipart/form-data">
                            <div class="container" id="reg1">
                            <div class="row">
                            <div class="col-sm">


                            <div class="form-row align-items-left">
                            <div class="w-100">
                            <label for="formtexto" id="txtNome">Nome Social da Planta:</label>
                            <div class="w-100"></div>
                            <input type="text" name="Nome_Social" class="form-control" id="txtNomeForm" aria-describedby="nome-cadastro" value="<?php echo isset($_POST['Nome_Social']) ? $_POST['Nome_Social'] : $planta->getNomeSocial(); ?>">
                            <span class="mensagemRetorno" id="retornoCampo1"></span>
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
                            <span class="mensagemRetorno" id="retornoCampo2"></span>
                            
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
                            <span class="mensagemRetorno" id="retornoCampo3"></span>
                            
                            <div class="form-group"></div>
                            <label for="formtexto" id="txtPontos">Pontuação:</label>
                            <div class="w-100"> </div>
                            <input type="number" name="Pontuacao" class="form-control" id="txtCodigoForm" aria-describedby="nome-cadastro" value="<?php echo isset($_POST['Pontuacao']) ? $_POST['Pontuacao'] : $planta->getPontos(); ?>">
                            <div class="w-100"> </div>
                            
                            <br>
                            <?php if (isset($errors) && !empty($errors) && isset($errors['Pontuacao'])) { ?>
                            <div class="alert alert-warning"><?php echo $errors['Pontuacao']; ?></div>
                            <?php } ?>
                            <span class="mensagemRetorno" id="retornoCampo4"></span>
                            <br><br>

                            <div class="col-sm" id="imagemreg">
                            <div class="form-group" id="imagemreg">
                            <a id="carregueimagemtexto" > Carregue uma imagem:</a> <br><br>
                <div class="preview-image">
                <img class="preview-image__img" data-image-preview />
                </div><br>
                <label for="img" class="custom-file-upload"><i class="fa-solid fa-camera"></i></label>
                <input type="file" id="img" required name="imagem" id="picture__input" data-image-input accept=".png, .jpg, .jpeg"/>
                <a id="carregueimagemtexto2"> .png .jpg ou .jpeg tamanho mínimo: 2MB tamanho máximo: 5MB </a>
                </div></div>
                

                
            <br>
            <div class="w-100"></div>
            <div class="container" id="caixadetexto"> <br><br><br>
            <a id="textodescritivo">Descrição:</a> <br><br>
            <textarea id="editor" name="Historia" class="ckeditor" value=""></textarea>
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
            <span class="mensagemRetorno" id="retornoCampo1"></span>
            <?php if (isset($errors) && !empty($errors) && isset($errors['Descricao'])) { ?>
            <div class="alert alert-warning"><?php echo $errors['Descricao']; ?></div>
            <?php } ?>
            </div>

            <div class="container"> <br><br>
            <button type="submit" class="btn btn-primary btn-lg" id="botoesregistrar"><a>Editar</a> </button>
            <button type="reset" class="btn btn-secondary btn-lg" id="botoeslimpar"> <a id="limpar"> Limpar</a>
            </button>
            </div>

            <input type="hidden" name="id_planta" value="<?php echo $planta->getIdPlanta(); ?>" />
            <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['ID']; ?>" />


            </form>
            <div id="resultadoVerificacao"></div>

</div>
</div>
<br><br>


    </main>
    <?php include_once("../../bootstrap/footer.php");?>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/imagem.js" defer></script>
    <script>
  document.addEventListener("DOMContentLoaded", function () {
    const formulario = document.getElementById("formplanta");
    const mensagensRetorno = document.querySelectorAll(".mensagemRetorno");
    const resultadoVerificacao = document.getElementById("resultadoVerificacao");

    // Atualizar ao vivo para campos de entrada (inputs)
  const camposInputs = formulario.querySelectorAll("input");
  camposInputs.forEach(function (campo) {
    campo.addEventListener("input", function () {
      atualizarMensagem(campo);
    });
  });

  const selectZona = document.getElementsByName("zona_planta")[0];
  const selectEspecie = document.getElementsByName("especie_planta")[0];

  // Inicializar Selectize.js para o campo zona_planta
  const selectizeZona = $(selectZona).selectize({
    onInitialize: function () {
      this.trigger("change", this.getValue(), true);
    },
    onChange: function (value, isOnInitialize) {
      atualizarMensagem(selectZona);
   
    },
  });

  // Inicializar Selectize.js para o campo especie_planta
  const selectizeEspecie = $(selectEspecie).selectize({
    onInitialize: function () {
      this.trigger("change", this.getValue(), true);
    },
    onChange: function (value, isOnInitialize) {
      atualizarMensagem(selectEspecie);
  
    },
  });


  CKEDITOR.instances.editor1.on('change', function() { 
    console.log("TEST");
});


    function atualizarMensagem(elemento) {
      const xhr = new XMLHttpRequest();
      xhr.open("POST", "testeajax.php", true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

      let valorCampo1 = document.getElementsByName("Nome_Social")[0].value;
      let valorCampo2 = document.getElementsByName("Pontuacao")[0].value;
      let valorCampo3 = document.getElementsByName("Historia")[0].textContent;
      let valorCampo4 = document.getElementsByName("zona_planta")[0].value;
      let valorCampo5 = document.getElementsByName("especie_planta")[0].value;

      let nomeCampo = elemento.name;
      let valorCampo = "";

      if (elemento.tagName === "INPUT" || elemento.tagName === "TEXTAREA") {
        valorCampo = elemento.value;
      } else if (elemento.tagName === "SELECT") {
        valorCampo = elemento.options[elemento.selectedIndex].value;
      }

      const parametros = "Nome_Social=" + encodeURIComponent(valorCampo1) +
        "&Pontuacao=" + encodeURIComponent(valorCampo2) +
        "&Historia=" + encodeURIComponent(valorCampo3) +
        "&zona_planta=" + encodeURIComponent(valorCampo4) +
        "&especie_planta=" + encodeURIComponent(valorCampo5);

      xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            const respostas = JSON.parse(xhr.responseText);
            mensagensRetorno[0].textContent = respostas.campo1;
            mensagensRetorno[1].textContent = respostas.campo2;
            mensagensRetorno[2].textContent = respostas.campo3;
            mensagensRetorno[3].textContent = respostas.campo4;
            mensagensRetorno[4].textContent = respostas.campo5;
          } else {
            resultadoVerificacao.innerHTML = "Erro na requisição.";
          }
        }
      };

      xhr.send(parametros);
    }
  });


</script>
</body>

</html>
