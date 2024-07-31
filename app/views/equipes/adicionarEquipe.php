<?php include_once("../../controllers/ZonaController.php"); ?>
<?php include_once("../../controllers/LoginController.php");
LoginController::manterUsuario();
LoginController::verificarAcesso([2, 3]);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

<title>Adicionar Equipe</title>  

<?php include_once("../../bootstrap/header.php");?>
<link rel="stylesheet" href="../csscheer/equipe.css">

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
                        <h1 id="primeirotextoreg"> Adicione uma Equipe!</h1>
                            <form action="adicionarEquipeExec.php" method="POST" enctype="multipart/form-data">

                            <div class="container" id="reg1">
                            <div class="row">
                            <div class="col-sm">
                            <div class="form-row align-items-left">

                            <label for="formtexto" id="txtNome">Nome da Equipe:</label>
                            <div class="w-100"></div>
                            <input type="text" name="Nome_Equipe" class="form-control" id="txtNomeEquipe" aria-describedby="nome-cadastro">
                            <div class="w-100"></div><br>

                            <label for="formtexto" id="txtCodigo">Cor da Equipe: </label>
                            <div class="w-100"></div>
                            <input type="color" name="Cor_Equipe" class="form-control" id="txtCorForm" aria-describedby="nome-cadastro">
                            <div class="w-100"><br><br>

                            <label id="txtCodigo" for="imagem">Escolha o Icone da Equipe:</label>
                            <br>
                            <select name="imagem" id="imagem" class='form-control' style='width: 200px; margin-top: 1px; color: #ebf0f1; background-color: #f0b6bc; font-family: Poppins-semibold;' onchange="atualizarImagem()">
                            <option value="../../public/icon/arvore_icon.png" data-imagem="../../public/icon/arvore_icon.png">Árvore</option>
                            <option value="../../public/icon/cacto_icon.png" data-imagem="../../public/icon/cacto_icon.png">Cacto</option>
                            <option value="../../public/icon/flor_icon.png" data-imagem="../../public/icon/flor_icon.png">Flor</option>
                            <option value="../../public/icon/samambaia_icon.png" data-imagem="../../public/icon/samambaia_icon.png">Caladium</option>
                            <option value="../../public/icon/alocasia_icon.png" data-imagem="../../public/icon/alocasia_icon.png">Alocasia</option>
                            <option value="../../public/icon/frangipane_icon.png" data-imagem="../../public/icon/frangipane_icon.png">Frangipane</option>
                            <option value="../../public/icon/bosque_icon.png" data-imagem="../../public/icon/bosque_icon.png">Bosque</option>
                            <option value="../../public/icon/borboleta_icon.png" data-imagem="../../public/icon/borboleta_icon.png">Borboleta</option>
                            </select>
                            <br><br>
                            <div id="imagemSelecionada">
                            <img src="../../public/icon/arvore_icon.png" alt="" id="previewImagem" style="width: 300px; height: 300px"> <br><br>
                            <div class="container">
                            <button type="submit" class="btn btn-primary btn-lg" id="botoesregistrar"><a>Adicionar</a> </button>
                            <button type="reset" class="btn btn-secondary btn-lg" id="botoeslimpar"> <a id="limpar"> Limpar</a></button>
                            <a class="btn btn-secondary btn-lg" id="botoescancelar" href="../../views/equipes/listEquipes.php">Cancelar e Voltar</a>
                            </div>
                            <br><br>



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
