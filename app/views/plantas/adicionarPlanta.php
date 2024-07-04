<?php include_once("../../controllers/LoginController.php");
LoginController::manterUsuario();
LoginController::verificarAcesso([2, 3]);
?>
<?php include_once("../../controllers/ZonaController.php");
include_once("../../controllers/EspecieController.php");
include_once("../../controllers/PlantaController.php");
include_once("../zones/htmlZonaForm.php");
include_once("../especies/htmlEspecieForm.php");

$plantaCont = new PlantaController();
$codigo = $plantaCont->gerarCodigo();

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>

  <title>Adicionar planta</title>
  <?php include_once("../../bootstrap/header.php"); ?>

  <script>
    $(document).ready(function() {
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

  input[type="number"]::-webkit-outer-spin-button,
  input[type="number"]::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
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

  input[type="file"] {
    display: none;
  }

  .custom-file-upload {
    display: inline-block;
    padding: 6px 12px;
    cursor: pointer;
  }

  div.ck-editor__editable {
    font-family: Poppins-Regular;
    border: 1px solid #ced4da;
    width: 500px;
  }

  div.ck.ck-sticky-panel__content {
    border: none !important;
  }


  div.ck-toolbar {
    background-color: #FFFFFF !important;
    font-family: Poppins-Regular;
    border: 1px solid #c05367 !important;
    color: #FFFFFF;
    width: 500px !important;
  }

  .ck.ck-editor__main>.ck-editor__editable:not(.ck-focused) {
    border-color: #c05367;
  }

  .ck-rounded-corners .ck.ck-editor__main>.ck-editor__editable,
  .ck.ck-editor__main>.ck-editor__editable.ck-rounded-corners {
    border-color: #c05367;
  }

  .modo-escuro div.ck-editor__editable {
    background-color: #1b1b1b !important;
    font-family: Poppins-Regular;
    border-color: #c05367;
    color: #FFFFFF;
    width: 500px;
  }

  .modo-escuro div.ck-toolbar {
    font-family: Poppins-Regular;
    border: 1px solid #c05367 !important;
    color: #FFFFFF;
  }

  .ck-content .table table,
  .ck-content .table table tbody,
  .ck-content .table table td,
  .ck-content .table table th,
  .ck-content .table table tr,
  .modo-escuro .ck-content .table table,
  .modo-escuro .ck-content .table tbody,
  .modo-escuro .ck-content .table td,
  .modo-escuro .ck-content .table th,
  .modo-escuro .ck-content .table tr,
  .ck-content .table table {
    border: 1px solid #C05367 !important;
    background-color: #FFFFFF;
  }
</style>
<nav>

  <?php include_once("../../bootstrap/navADM.php"); ?>

</nav>


<body>
  <main>

    <div class="container">
      <div class="row justify-content-md-left">

        <div id="corpo-registro">

          <div class="row">
            <div class="col">
              <h1 id="primeirotextoreg"> Adicione uma planta!</h1>


              <form action="adicionarPlantaExec.php" method="POST" enctype="multipart/form-data">
                <div class="container" id="reg1">
                  <div class="row">
                    <div class="col-sm">


                      <div class="form-row align-items-left">
                        <div class="w-100">
                          <label for="formtexto" id="txtNome">Nome Social da Planta:</label>
                          <div class="w-100"></div>
                          <input type="text" name="Nome_Social" class="form-control" id="txtNomeForm" aria-describedby="nome-cadastro" value="<?php echo isset($_POST['Nome_Social']) ? $_POST['Nome_Social'] : ''; ?>">
                          <div class="w-100"></div>
                          <br>
                          <?php if (isset($errors) && !empty($errors) && isset($errors['Nome_Social'])) { ?>
                            <div class="alert alert-warning" style="position: left;"><?php echo $errors['Nome_Social']; ?></div>
                          <?php } ?>

                          <div class="w-100"></div>
                          <label for="formtexto" id="txtCodigo">Código numérico:</label>
                          <div class="w-100"></div>
                          <input readonly type="number" name="Cod_Numerico" class="form-control" id="txtCodigoForm" aria-describedby="nome-cadastro" value="<?php echo $codigo;  ?>">


                          <div class="form-group" style="color: #f0b6bc;">
                            <label for="selectStand" id="txtNome">Zona:</label>
                            <div class="w-100"></div>
                            <a id="txtZonaForm">

                              <?php
                              $zonaCont = new ZonaController();
                              $zonas = $zonaCont->listar();

                              ZonaHTMLForm::desenhaSelect($zonas, "zona_planta", "SomPlanta");
                              ?>

                          </div> </a>
                          <?php if (isset($errors) && !empty($errors) && isset($errors['zona_planta'])) { ?>
                            <div class="alert alert-warning"><?php echo $errors['zona_planta']; ?></div>
                          <?php } ?>

                          <div class="form-group">
                            <label for="selectStand" id="txtNome">Espécie:</label>
                            <div class="w-100"></div>
                            <a id="txtNomeForm">
                              <?php
                              $especieCont = new EspecieController();
                              $especies = $especieCont->listar();

                              EspecieHTMLForm::desenhaSelect($especies, "especie_planta", "nome_especie");
                              ?>
                          </div> </a>

                          <div id="Questoes">

                          </div>

                          <?php if (isset($errors) && !empty($errors) && isset($errors['especie_planta'])) { ?>
                            <div class="alert alert-warning"><?php echo $errors['especie_planta']; ?></div>
                          <?php } ?>
                          <?php if (isset($errors) && !empty($errors) && isset($errors['questao_pontuacao'])) { ?>
                            <div class="alert alert-warning"><?php echo $errors['questao_pontuacao']; ?></div>
                          <?php } ?>

                          <label for="formtexto" id="txtPontos">Pontuação da Planta:</label>
                          <div class="w-100"> </div>
                          <input type="number" name="Pontuacao" class="form-control" id="txtCodigoForm" aria-describedby="nome-cadastro" value="<?php echo isset($_POST['Pontuacao']) ? $_POST['Pontuacao'] : ''; ?>">
                          <div class="w-100"> </div>
                          <?php if (isset($errors) && !empty($errors) && isset($errors['Pontuacao'])) { ?>
                            <div class="alert alert-warning"><?php echo $errors['Pontuacao']; ?></div>
                          <?php } ?>


                          <br><br>
                          <div class="col-sm" id="imagemreg">

                            <div class="form-group" id="imagemreg">

                              <a id="carregueimagemtexto"> Carregue uma imagem:</a> <br><br>
                              <div class="preview-image">
                                <img class="preview-image__img" data-image-preview />
                              </div><br>
                              <label for="img" class="custom-file-upload"><img src="../../public/cameraicone.png" alt="Ícone" style="position: relative ;top: -9px ;width: 43px; height: 43px;" /></label>
                              <input type="file" id="img" name="imagem" id="picture__input" data-image-input accept=".png, .jpg, .jpeg" />
                              <a id="carregueimagemtexto2"> <- Selecione um arquivo para a imagem da planta </a>

                            </div>
                            <?php if (isset($errors) && !empty($errors) && isset($errors['Imagem'])) { ?>
                              <div class="alert alert-warning" style="position: left;"><?php echo $errors['Imagem']; ?></div>
                            <?php } ?>
                          </div>


                          <div class="container" id="caixadetexto"> <br><br><br>
                            <a id="textodescritivo">História da Planta:</a> <br><br>
                            <textarea id="editor" name="Historia" value=""></textarea>
                            <script>
                              ClassicEditor
                                .create(document.querySelector('#editor'), {
                                  fontFamily: {
                                    options: [
                                      'default', 'Arial, sans-serif', 'Georgia, serif',
                                      'Impact, Charcoal, sans-serif', 'Tahoma, Geneva, sans-serif',
                                      'Times New Roman, Times, serif', 'Verdana, Geneva, sans-serif',
                                    ]
                                  },
                                  ckfinder: {
                                    uploadUrl: 'processarImagem.php'
                                  }
                                }).then(editor => {
                                  console.log(editor);
                                })
                                .catch(error => {
                                  console.error(error);
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




                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br><br><br>

    <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['ID']; ?>" />
    </form>


  </main>
  <?php include_once("../../bootstrap/footer.php"); ?>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script>
    const selectEspecie = document.getElementsByName("especie_planta")[0];

    const selectizeEspecie = $(selectEspecie).selectize({
      onInitialize: function() {
        this.trigger("change", this.getValue(), true);
      },
      onChange: function(value, isOnInitialize) {
        mostrarQuestoes(selectEspecie);

      },
    });

    function mostrarQuestoes(elemento) {
      const xhr = new XMLHttpRequest();
      xhr.open("POST", "questoesEspecie.php", true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

      if (elemento.tagName === "SELECT") {
        valorCampo = elemento.options[elemento.selectedIndex].value;
      }

      const parametros = "idEspecie=" + encodeURIComponent(valorCampo)

      xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {

            // JSON de questões
            var JSONQuestoes = JSON.parse(xhr.response);

            // Limpar o conteúdo anterior da div
            document.getElementById("Questoes").innerHTML = "";

            // Console
            console.log('Resposta do servidor:', JSON.parse(xhr.response));

            // Percorrer o array de questões
            for (var i = 0; i < JSONQuestoes.length; i++) {
              var questao = JSONQuestoes[i];

              // Criar um elemento de parágrafo para cada informação da questão
              var paragrafo = document.createElement("p");
              paragrafo.innerHTML = "<input class='questaoCheckbox' name='checkbox_" + i + "' type='checkbox' value='" + questao.idQuestao + "'/>" +
                "<a><i class='fa-solid fa-circle' style='margin-left: 6px; margin-right: 6px; color:" + questao.cor + "'></i></a>" +
                "<b><span class='questaoFormTitulo'>Questão:</span></b><span class='questaoFormDesc'> " + questao.descricao + "</span>" +
                "<span style='margin-right: 6px; margin-left: 6px; color: #C05367;'>|</span>" +
                "<label class='labelPontuacaoQuestao'  for='pontuacaoQuestao'/> Pontuação Questão: " +
                "<input style='margin-left: 4px; max-width: 30px' class='pontuacaoQuestao' name='questaop_" + i + "' type='number'/><br>";

              // Adicionar o parágrafo à div
              document.getElementById("Questoes").appendChild(paragrafo);
            }
          } else {
            resultadoVerificacao.innerHTML = "Erro na requisição.";
          }
        }
      };

      xhr.send(parametros);
    }
  </script>
  <script src="assets/js/grayscale.js"></script>
  <script type="text/javascript" src="../js/imagem.js" defer></script>


</html>