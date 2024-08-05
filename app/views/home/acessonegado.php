<!DOCTYPE html>
<html lang="pt-br">
<?php include_once("../../controllers/LoginController.php");

LoginController::manterUsuario();
if (!isset($_SESSION['TIPO'])) {
    $tipo = null;
} else {
    $tipo = $_SESSION['TIPO'];
} ?>
<head>
    <title>Acesso Negado!</title>
    <?php include_once("../../bootstrap/header.php");?>
    <link rel="stylesheet" href="csscheer/indexjog.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="csscheer/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head> 

<style>
    img {
       margin: auto;
    }

    #ops {
    color: #04574d;
    font-family: Poppins;
    margin-left: 11px;
    margin-top: 35px;
    font-size: 70px;
}

#textoerro {
    color: #C05367;
    font-family: Poppins-semibold;
    margin-top: 25px;
    margin-bottom: 10px;
    font-size: 27px;
}

#gif{
    width: 300px;
    height: auto;
}

</style>

<?php LoginController::navBar($tipo); ?>

<body>

    <div class="container">
        <div class="row justify-content-md-left">
            <div id="about-area">
                <div class="row">
                    <div class="col text-center">
                        <h1 id="ops">ACESSO NEGADO! </h1>

                        <br>
                        <div class="container text-center">
                        <img src="../../public/greengoconstrucao.gif" alt="construcao" id="gif">


                        <h2 id="textoerro" style="line-height:35px">Parece que você tropeçou em um território protegido em nossa emocionante selva digital.<br> 
                            Nossos guardiões virtuais estão trabalhando incansavelmente para manter este local especial seguro e intacto.<br> 
                            Enquanto espera, que tal explorar outras trilhas virtuais em nossa floresta? <br> 
                            Quem sabe você encontrará novos caminhos para o conhecimento!
                        </h2>
                         
<br><br><br>
</div></div></div></div></div></div>

                        <?php include_once("../../bootstrap/footer.php");?>
</html>