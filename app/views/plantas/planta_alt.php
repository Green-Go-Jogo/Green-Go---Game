<?php
#Página com o formulário para alterar um personagem
include_once("login_verifica.php");
include_once("controller/planta_controller.php");
include_once("controller/zona_controller.php");
include_once("view/zona_html.php");

$id = $_GET['id'];

$plantaCont = new PlantaController();
$planta = $plantaCont->buscarPorId($id);

if($planta == null) {
    echo "Planta não encontrado!<br>";
    echo "<a href='planta_listar.php'>Voltar</a>";
    exit;
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once("bootstrap/head.php"); ?>
</head>
<body>
    <?php include_once("bootstrap/menu.php"); ?>

    <h3 class="text-center">ALTERAR DADOS DE UM personagem</h3>

    <div style="max-width: 50%; margin-left: 10px;">
        <form name="frmCadastroPersonagem" method="POST" action="planta_alt_exec.php">
            <div class="form-group">
                <label for="txtNome">Nome Social:</label>
                <input class="form-control" type="text" id="txtNome" name="Nome_Social" 
                    size="45" maxlength="70" placeholder="Informe o nome" value="<?php echo $planta->getNomeSocial();?>"/>
            </div>

            <div class="form-group">
                <label for="txtIdade">Código Númerico:</label>
                <input class="form-control" type="number" id="txtCodigo" name="Cod_Numerico" 
                    style="width: 100px;" value="<?php echo $planta->getCodNumerico(); ?>"/>
            </div>

            <div class="form-group">
                <label for="somEst">Pontuação:</label>
                <input class="form-control" type="number" id="txtPonto" name="Pontuacao" 
                    style="width: 100px;" value="<?php echo $planta->getPontos() ?>"/>
            </div>    

            <div class="form-group">
                <label for="txtHistoria">História:</label>
                <input class="form-control" type="text" id="txtHistoria" name="Historia" 
                    size="45" maxlength="70" placeholder="Informe a história" value="<?php echo $planta->getPlantaHistoria()?>"/>
            </div>  
          

            <div class="form-group">
                <label for="selectZona">Zona:</label>
                <?php
                    $zonaCont = new ZonaController();
                    $zonas = $zonaCont->listar();

                    ZonaHTML::desenhaSelect($zonas, "zona_planta", "SomPlanta", $planta->getZona()->getIdZona());
            ?>
        </div>


            <input type="hidden" name="id_planta" value="<?php echo $planta->getIdPlanta(); ?>" />

            <button type="submit" class="btn btn-success">Gravar</button>
        </form>

        <br><br>
        
        <div id="divErro" class="alert alert-danger" style="display: none; margin-top: 20px;" />
        <a class="btn btn-outline-secondary" href="planta_listar.php">Voltar</a>
    </div>

    <?php include_once("bootstrap/footer.php"); ?>
    <script src="js/personagem.js"></script>
</body>
</html>