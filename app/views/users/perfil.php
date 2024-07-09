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
                <a id="btn-perfil" class="btn btn-custom" href='' onclick="return alterarSenhaModal(null);">Alterar a senha </a>
            <div id="alterarSenhaDiv" class="custom-dialog" style="display: none;">
                <h3>Alterar Senha</h3>
                <p id="alterarSenhaMensagem"></p>
                <label for="campoSenha">Senha atual:</label>
                <input type="password" id='senhaAtual' autocomplete="off">
                <label for="campoSenha">Nova senha:</label>
                <input type="password" id='senhaNova' autocomplete="off">
                <label for="campoSenha">Confirmação de senha:</label>
                <input type="password" id='senhaNovaConf' autocomplete="off">
                <div class="custom-dialog-buttons">
                    <a href="#" onclick="customConfirm(true, 'alterarSenhaDiv'); return false;">OK</a>
                    <a href="#" onclick="customConfirm(false, 'alterarSenhaDiv'); return false;">Cancelar</a>
                </div>
            </div>
            <br><br>
            <a id="btn-perfil" class="btn btn-custom" href='editarUsuario.php'>Editar a conta </a>
            <br><br>
            <a id="btn-perfil" class="btn btn-custom" href="" onclick="return deletarUsuarioModal('Tem certeza que deseja apagar seu usuário?');"> Excluir a conta</a>
            <div id="deletarUsuarioDiv" class="custom-dialog" style="display: none;">
                <h3>Confirmação</h3>
                <p id="deletarUsuarioMensagem"></p>
                <label for="campoSenha">Insira sua senha:</label>
                <input type="password" id='senhaAtualDel' autocomplete="off">
                <p id="erroInvalidoDeletar"></p>
                <div class="custom-dialog-buttons">
                    <a href="#" onclick="customConfirm(true, 'deletarUsuarioDiv'); return false;">OK</a>
                    <a href="#" onclick="customConfirm(false, 'deletarUsuarioDiv'); return false;">Cancelar</a>
                </div>
            </div>
        </div>
        </p>
    </div>
</div>


<br><br><br>
</body>
<script>
    function deletarUsuarioModal(message) {

        var status = document.getElementById('deletarUsuarioDiv').style.display;
        if (status === 'block') {
            customConfirm(false, 'deletarUsuarioDiv');
            return false;
        }

        // Exibe o diálogo de confirmação personalizado
        document.getElementById('deletarUsuarioMensagem').textContent = message;
        document.getElementById('deletarUsuarioDiv').style.display = 'block';
        return false; // Evita que o link seja seguido
    }

    function alterarSenhaModal(message) {

        var status = document.getElementById('alterarSenhaDiv').style.display;
        if (status === 'block') {
            customConfirm(false, 'alterarSenhaDiv');
            return false;
        }

        // Exibe o diálogo de confirmação personalizado
        document.getElementById('alterarSenhaMensagem').textContent = message;
        document.getElementById('alterarSenhaDiv').style.display = 'block';
        return false; // Evita que o link seja seguido
    }

    function customConfirm(result, id) {


        // Esta função é chamada quando um botão no diálogo é clicado
        if (result) {
            // Ação a ser realizada se o usuário clicar em "OK"
            var confirmacao = confirm('Tem certeza que deseja excluir sua conta? Essa ação é irreversível e todos os seus dados serão perdidos.');
            if (confirmacao) {
                deletarConta();
                return false;
            }
        } else {
            // Ação a ser realizada se o usuário clicar em "Cancelar"
            // Fecha o diálogo
            document.getElementById(id).style.display = 'none';
        }

    }

    function deletarConta() {
        var senha = $('#senhaAtualDel').val();

        $.ajax({
            url: 'checarSenha.php',
            type: 'POST',
            data: {
                idUsuario: <?php echo json_encode($usuario->getIdUsuario()); ?>,
                senha: senha
            },
            success: function(response) {
                if (response == 'valid') {
                    // Enviar requisição AJAX para excluir a conta
                    $.ajax({
                        url: 'excluirConta.php',
                        type: 'POST',
                        data: {
                            idUsuario: <?php echo json_encode($usuario->getIdUsuario()); ?>
                        },
                        success: function(response) {
                            if (response == 'deleted') {
                                alert('Conta excluída com sucesso.');
                                window.location.href = '../home/index.php'; // Redireciona para logout ou outra página
                            } else {
                                $('#erroInvalidoDeletar').text('Erro ao excluir a conta.');
                            }
                        }
                    });
                } else {
                    $('#erroInvalidoDeletar').text('Senha incorreta.');
                }
            }
        });
    }
</script>
<?php include_once("../../bootstrap/footer.php") ?>

</html>