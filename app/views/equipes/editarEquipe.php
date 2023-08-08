<?php include_once("../../controllers/ZonaController.php"); ?>
<?php include_once("../../controllers/EquipeController.php"); ?>
<?php include_once("../../controllers/LoginController.php");
LoginController::manterUsuario();
?>


<?php
$id = $_GET['id'];

$equipeCont = new EquipeController();
$equipe = $equipeCont->buscarPorId($id);

if($equipe == null) {
    echo "Equipe não encontrada!<br>";
    echo "<a href='listEquipes.php'>Voltar</a>";
    exit;
} 
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    
<title>Editar Equipe</title>  

<link rel="stylesheet" href="../csscheer/equipe.css">
<?php include_once("../../bootstrap/header.php");?>
<script src="../js/icon.js"></script>

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
                        <h1 id="primeirotextoreg"> Editar uma Equipe!</h1>
                            <form action="editarEquipeExec.php" method="POST" enctype="multipart/form-data">

                            <div class="container" id="reg1">
                            <div class="row">
                            <div class="col-sm">
                            <div class="form-row align-items-left">

                            <label for="formtexto" id="txtNome">Nome da Equipe:</label>
                            <div class="w-100"></div>
                            <input type="text" name="Nome_Equipe" class="form-control" id="txtNomeEquipe" value="<?php echo $equipe->getNomeEquipe(); ?>" $ aria-describedby="nome-cadastro">
                            <div class="w-100"></div><br>

                            <label for="formtexto" id="txtCodigo">Cor da Equipe: </label>
                            <div class="w-100"></div>
                            <input type="color" value="<?php echo $equipe->getCorEquipe(); ?>" name="Cor_Equipe" class="form-control" id="txtCorForm" aria-describedby="nome-cadastro">
                            <div class="w-100"> <br><br>

                            <label id="txtCodigo" for="imagem">Escolha o Icone da Equipe:</label>
                            <br>
                            <select name="imagem" id="imagem" class='form-control' style='width: 200px; margin-top: 1px; color: #ebf0f1; background-color: #f0b6bc; font-family: Poppins-semibold;' onchange="atualizarImagem()">
                            <option value="../../public/icon/arvore_icon.png" data-imagem="../../public/icon/arvore_icon.png">Árvore</option>
                            <option value="../../public/icon/cacto_icon.png" data-imagem="../../public/icon/cacto_icon.png">Cacto</option>
                            <option value="../../public/icon/flor_icon.png" data-imagem="../../public/icon/flor_icon.png">Flor</option>
                            <option value="../../public/icon/samambaia_icon.png" data-imagem="../../public/icon/samambaia_icon.png">Caladium</option>
                            </select>
                            <br><br>
                            <div id="imagemSelecionada">
                            <img src="<?php echo $equipe->getIconeEquipe(); ?>" alt="" id="previewImagem" style="width: 300px; height: 300px"> <br><br>
                            <div class="container">
                            <button type="submit" class="btn btn-primary btn-lg" id="botoesregistrar"><a>Adicionar</a> </button>
                            <button type="reset" class="btn btn-secondary btn-lg" id="botoeslimpar"> <a id="limpar"> Limpar</a>
                            </button>
                            </div>
                            <br><br>

                            <input type="hidden" name="id_equipe" value="<?php echo $equipe->getIdEquipe(); ?>" />

                            </form>


    </main>
    <?php include_once("../../bootstrap/footer.php");?>
    </body>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/grayscale.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>

</html>
