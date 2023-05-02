<?php
#Página com o formulário para incluir um aluno
include_once("login_verifica.php");
include_once("controller/zona_controller.php");
include_once("view/zona_html.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once("bootstrap/head.php"); ?>
</head>

<body>
    <?php include_once("bootstrap/menu.php"); ?>

    <h3 class="text-center">INSERIR PLANTA</h3>

    <div style="max-width: 50%; margin-left: 10px;">
        <form name="frmCadastroPersonagem" method="POST" action="planta_inc_exec.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="txtNome">Nome Social:</label>
                <input class="form-control" type="text" id="txtNome" name="Nome_Social" 
                    size="45" maxlength="70" placeholder="Informe o nome" />
            </div>
            <div class="form-group">
                <label for="txtIdade">Código Númerico:</label>
                <input class="form-control" type="number" id="txtCodigo" name="Cod_Numerico" 
                    style="width: 100px;"/>
            </div>
            <div class="form-group">
                <label for="somEst">Pontuação:</label>
                <input class="form-control" type="number" id="txtPonto" name="Pontuacao" 
                    style="width: 100px;"/>
            </div>    

            <div class="form-group">
                <label for="txtHistoria">História:</label>
                <input class="form-control" type="text" id="txtHistoria" name="Historia" 
                    size="45" maxlength="70" placeholder="Informe a história" />
            </div>  

            <a id="carregueimagemtexto">Carregue uma imagem</a> <br>

            <div class="form-group">
            <label class="picture align-content-center" for="picture__input" tabIndex="0">
             <span class="picture__image">
             <img class="img-camera" src="/img/d8ca819f5feac5192c31cb17633e1f1f.png">
             </span>
             </label>
             <input type="file" required name="imagem" id="picture__input" accept=".png, .jpg, .jpeg" >

             <script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-1b93190375e9ccc259df3a57c1abc0e64599724ae30d7ea4c6877eb615f89387.js"></script>
             <a id="carregueimagemtexto2"> .png .jpg ou .jpeg tamanho mínimo: 2MB tamanho máximo: 5MB </a>
            </div> 

          
            <div class="form-group">
                <label for="selectStand">Zona:</label>
                <?php
                    $zonaCont = new ZonaController();
                    $zonas = $zonaCont->listar();

                    ZonaHTML::desenhaSelect($zonas, "zona_planta", "SomPlanta");
            ?>
        </div>

            <button type="submit" class="btn btn-success">Gravar</button>
            <button type="reset" class="btn btn-danger">Limpar</button>
        </form>

        <br><br>    
        <div id="divErro" class="alert alert-danger" style="display: none; margin-top: 20px;" />

        <a class="btn btn-outline-secondary" href="planta_listar.php">Voltar</a>
    </div>

    <?php include_once("bootstrap/footer.php"); ?>
</body>
</html>