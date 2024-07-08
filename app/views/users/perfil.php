<?php include_once("../../controllers/LoginController.php");
LoginController::manterUsuario();
LoginController::verificarAcesso([1, 2, 3]);
if (!isset($_SESSION['TIPO'])) {
    $tipo = null;
} else {
    $tipo = $_SESSION['TIPO'];
}
?>

<?php include_once("../../controllers/UsuarioController.php");
$id = $_SESSION["ID"];
$usuarioCont = new UsuarioController;
$usuario = $usuarioCont->buscarPorId($id);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu perfil</title>
    <link rel="stylesheet" href="../csscheer/main.css">
    <link rel="stylesheet" href="../csscheer/perfil.css">
    <?php include_once("../../bootstrap/header.php") ?>
</head>

<?php LoginController::navBar($tipo); ?>

<div class="container">
    <br>
    <br>
    <h2 class="titulo text-center" id="usuarionome">
        <?php echo $usuario->getNomeUsuario(); ?>
    </h2>
    <div class="text-center">
        <p id="acesso"> <?php $acesso = $usuario->getTipoUsuario();
                        if ($acesso == 1) {
                            echo "Aluno";
                        } else if ($acesso == 2) {
                            echo "Administrador";
                        } else {
                            echo "Professor";
                        } ?> </p>
        </p>

        <br> <br>

        <img src="../../public/placeholder2.png" id="icon"></img> <br>
        <div class="profile-info">
            <div class="column">
                <p id="subtitulo">
                    Gênero: <br> </p>
                <p id="conteudo"> <?php echo $usuario->getGenero() ?></p><br><br>
                <br>

            </div>

            <div class="column">
                <p id="subtitulo">
                    Nível Acadêmico: </p>
                <p id="conteudo"><?php echo $usuario->getEscolaridade(); ?></p><br><br>
            </div>
        </div>

        <div class="text-center">
            <p id="subtituloemail" class="text-center">
                E-mail:</p>
            <p id="conteudoemail"><?php echo $usuario->getEmail() ?> </p>
            </p>
        </div>
    </div>
    <br> <br>
    <div class="column">
        <div class="btn-perfil">
            <p>
                <a id="btn-perfil" class="btn btn-custom" href='editarUsuario.php'>Editar a conta </a>
                <br><br>
                <a id="btn-perfil" class="btn btn-custom" href='#'>Alterar a senha </a>
                <br><br>
                <a id="btn-perfil" class="btn btn-custom" href="" onclick="return showCustomConfirm('Tem certeza que deseja apagar seu usuário?');"> Excluir a conta</a>
        </div>
        </p>
    </div>
</div>

<div id="custom-dialog" class="custom-dialog" style="display: none;">
    <h3>Confirmação</h3>
    <p id="custom-dialog-message"></p>
    <div class="custom-dialog-buttons">
        <a href="#" onclick="customConfirm(true); return false;">OK</a>
        <a href="#" onclick="customConfirm(false); return false;">Cancelar</a>
    </div>
</div>
<br><br><br>
</body>
<script>
    function showCustomConfirm(message) {
        // Exibe o diálogo de confirmação personalizado
        document.getElementById('custom-dialog-message').textContent = message;
        document.getElementById('custom-dialog').style.display = 'block';
        return false; // Evita que o link seja seguido
    }

    function customConfirm(result) {
        // Esta função é chamada quando um botão no diálogo é clicado
        if (result) {
            // Ação a ser realizada se o usuário clicar em "OK"
            alert('Ação confirmada! Implemente o comportamento desejado aqui.');
        } else {
            // Ação a ser realizada se o usuário clicar em "Cancelar"
        }

        // Fecha o diálogo
        document.getElementById('custom-dialog').style.display = 'none';
    }
</script>
<?php include_once("../../bootstrap/footer.php") ?>

</html>