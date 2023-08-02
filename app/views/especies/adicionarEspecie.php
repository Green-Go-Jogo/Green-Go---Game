<?php session_start(); ?>
<?php if (isset($_SESSION['msg_erro'])): ?>
    <span>
        <?= $_SESSION['msg_erro'] ?>
    </span>
<?php endif ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../csscheer/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Adicionar Especie</title>

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
    <!-- Progress bar -->
    <script src="js/progressbar.min.js"></script>
    <!-- Parallax -->
    <script src="https://cdn.jsdelivr.net/parallax.js/1.4.2/parallax.min.js"></script>
    <script src="js/registro.js"></script>
    <script src="../../ajax/ajax.js"></script>
    <link rel="stylesheet" href="views/js/registro.js">
    <link rel="stylesheet" href="css/editorwys.css" type="text/css" media="all" />
    <script type="text/javascript" src="js/script.js"></script>
    <link rel="stylesheet" href="../csscheer/especie.css">

</head>

<nav>

    <?php include_once("../../bootstrap/navADM.php");?>

</nav>

<body>
    <main>
    <nav id="primeirotextoindex">
        <div class="container">
            <div class="row justify-content-md-left">

                <div class="row">
                <div class="col">
                <h1 id="primeirotextoreg"> Adicione uma espécie!</h1>
                        <form action="adicionarEspecieExec.php" method="POST" enctype="multipart/form-data">

                        <label for="formtexto" id="txtNome">Nome Popular:</label>
                            <div class="w-100" id="campo_nomeEsp"></div>
                            <input type="text" name="Nome_Popular" class="form-control" id="txtNomeForm" aria-describedby="nome-cadastro" value="<?php echo isset($_POST['Nome_Popular']) ? $_POST['Nome_Popular'] : ''; ?>">
                            <div class="w-100"></div>
                            <?php if (isset($errors) && !empty($errors) && isset($errors['Nome_Popular'])) { ?>
                            <div class="alert alert-warning" style="position: left;"><?php echo $errors['Nome_Popular']; ?></div>
                            <?php } ?>
                            <label for="formtexto" id="txtCodigo">Nome Cientifico:</label>
                            <div class="w-100"></div>
                            <input type="text" name="Nome_Cientifico" class="form-control" id="txtNomeForm" aria-describedby="nome-cadastro" value="<?php echo isset($_POST['Nome_Cientifico']) ? $_POST['Nome_Cientifico'] : ''; ?>">
                            <div class="w-100"> <br>
                            <?php if (isset($errors) && !empty($errors) && isset($errors['Nome_Cientifico'])) { ?>
                            <div class="alert alert-warning" style="position: left;"><?php echo $errors['Nome_Cientifico']; ?></div>
                            <?php } ?>
                        <div>
                        <div class="container" id="container-checkbox">
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group form-check">
                                        <div id="txtNomeAtributo">
                                            <a>Atributos específicos:</a>
                                            <div class="w-100"></div>
                                            <br>
                                        </div>
                                        <div class="form-group form-check" id="formcome">
                                            <input type="checkbox" name="comestivel" class="form-check-input"
                                                id="botaocheck1" value="1">

                                            <label class="form-check-label" for="botaocheck1"
                                                id="texto-checkbox">Comestível</label>
                                        </div>
                                        <div class="form-group form-check" id="formexo">
                                            <input type="checkbox" name="exotica" class="form-check-input"
                                                id="botaocheck2" value="1">
                                            
                                            <label class="form-check-label" for="botaocheck2"
                                                id="texto-checkbox">Exótica</label>
                                        </div>
                                        <div class="form-group form-check" id="formfrut">
                                            <input type="checkbox" name="frutifera" class="form-check-input"
                                                id="botaocheck3" value="1">
                                        
                                            <label class="form-check-label" for="botaocheck3"
                                                id="texto-checkbox">Frutífera</label>
                                        </div>
                                        <div class="form-group form-check" id="formmed">
                                            <input type="checkbox" name="medicinal" class="form-check-input"
                                                id="botaocheck4" value="1">
                                            
                                            <label class="form-check-label" for="botaocheck4"
                                                id="texto-checkbox">Medicinal</label>
                                        </div>
                                        <div class="form-group form-check" id="formrara">
                                            <input type="checkbox" name="raridade" class="form-check-input"
                                                id="botaocheck5" value="1">
                                            
                                            <label class="form-check-label" for="botaocheck5"
                                                id="texto-checkbox">Rara</label>
                                        </div>
                                        <div class="form-group form-check" id="formtoxi">
                                            <input type="checkbox" name="toxidade" class="form-check-input"
                                                id="botaocheck6" value="1">
                                        
                                            <label class="form-check-label" for="botaocheck6"
                                                id="texto-checkbox">Tóxica</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                            <textarea id="editor" name="Descricao" value=""></textarea>
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


                            </form>

            </div>
        </div>
        <br><br>
    </main>
    <?php include_once("../../bootstrap/footer.php");?>
</body>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/grayscale.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="js/registro.js"></script>

</html>