<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("../../bootstrap/header.php") ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col align-self-end">
                <img class="img-top" src="../../public/imagem-top.svg">
            </div>

            <div class="col align-self-center centrao">
                <h2 class="titulo">
                    Entrar na conta
                </h2>

                <form class="form-login" id="loginform" name="loginform" method="post"
                    action="loginExec.php">
                    <label for="email-login">E-mail</label>
                    <br>
                    <input type="text" class="form-control" id="email-login" name='email' value="" >

                    <label for="senha-login">Senha</label>
                    <br>
                    <input type="password" class="form-control" id="senha-login" name="senha" value="" >
                        <br>
                    <br>

                    <div class="row justify-content-beetween align-items-center">
                        <div class="col-auto">
                            <button class="btn btn-primary" id="botaologin" type="submit">Entrar</button>

                       </div>

                       <!-- <div class="col-auto align-items-center novoporaqui">
                            <p>Novo por aqui? <a id="cadastro" href="cadastro.php">Cadastrar</a></p>
                        </div> -->
                    </div>
<br>
                    <?php
if (isset($_GET['aviso'])) {
    $aviso = $_GET['aviso'];
    echo '<div class="alert alert-warning">' . htmlspecialchars($aviso) . '</div>';
}
?>

                </form>
            </div>

            <div class="">
            <?php include_once(__DIR__ . "/../../bootstrap/msg.php") ?>
        </div>

            <div class="col align-self-start">
                <a href="../home/index.php">
                    <img class="img-bottom" src="../../public/imagem-bottom.svg">
                </a>
            </div>
        </div>
    </div>


</body>

</html>