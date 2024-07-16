<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("../../bootstrap/header.php") ?>
    <link rel="stylesheet" href="../csscheer/login.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


</head>

<?php include_once("../../bootstrap/navLogin.php") ?>

<style>

</style>

<body>


    <div class="container text-center">
        <img class="titulo" src="../../public/entrarconta.png">
    </div>



    <form class="form-login" id="loginform" name="loginform" method="post" action="loginExec.php">
        <label for="email-login" id="labels">E-mail ou Nome de Usuário</label>
        <br>
        <input type="text" class="form-control" id="email-login" name='email' value="">

        <label for="senha-login" id="labels">Senha</label>
        <br>
        <input type="password" class="form-control" id="senha-login" name="senha" value="">
        <a id='esqueciSenha' class="text-center" id="cadastro" href="recuperarSenha.php">Esqueci minha senha</a>
        <br>
        <br>
        <br>

        <div class="row justify-content-beetween align-items-center">
            <div class="container">
                <button class="btn btn-primary" id="botaologin" type="submit">Entrar</button>

            </div>

            <div class="container text-right novoporaqui">
                <p>Novo por aqui?<br> <a class="text-center" id="cadastro" href="cadastro.php"> Cadastre-se</a></p>
            </div>

        </div>


        <div class="container-fluid" id="laembaixo">
            <div class="col align-self-start">
                <!-- <a href="../home/index.php"> -->
                    <img class="img-bottom" src="../../public/imagem-bottom.svg">
                </a>

            </div>

            <div class="col align-self-start">
                <!-- <a href="../home/index.php"> -->

                    <div class="container align-self-end">
                        <img class="img-top" src="../../public/imagem-top.svg">

                </a>
            </div>
        </div>

        <br>
        <?php
        if (isset($_GET['nologin'])) {
            $nologin = $_GET['nologin'];
            echo '<div class="alert alert-warning">' . htmlspecialchars($nologin) . '</div>';
        }
        ?>
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
    </div>
    </div>
    </div>
    </div>

    </div>
    </div>

</body>

</html>