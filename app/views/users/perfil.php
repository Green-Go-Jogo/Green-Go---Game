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
                <a id="btn-perfil" class="btn btn-custom" href='' onclick="return alterarSenhaModal();">Alterar a senha </a>
            <div id="alterarSenhaDiv" class="custom-dialog" style="display: none;">
                <h3>Alterar Senha</h3>
                <br>
                <label class="dialogLabel" for="campoSenha">Senha atual:</label>
                <input class="dialogInput" type="password" id='senhaAtualAlt' autocomplete="off">
                <p id="erroInvalidoAlterar"></p>
                <br>
                <label class="dialogLabel" for="campoSenha">Nova senha:</label>
                <input class="dialogInput" type="password" id='senhaNova' autocomplete="off">
                <p class="erroSenhaNaoCorresponde"></p>
                <br>
                <label class="dialogLabel" for="campoSenha">Confirmação de senha:</label>
                <input class="dialogInput" type="password" id='senhaNovaConf' autocomplete="off">
                <p class="erroSenhaNaoCorresponde"></p>
                <br>
                <p class="text-center" id="complemento">A senha deve ter no mínimo 5 dígitos com letras e números</p>
                <br>
                <div class="custom-dialog-buttons">
                    <a id="botaoConfirmar" href="#" onclick="alterarConfirmacao(true, 'alterarSenhaDiv'); return false;">Confirmar</a>
                    <a id="botaoCancelar" href="#" onclick="alterarSenhaModal(); return false;">Cancelar</a>
                </div>
            </div>
            <br><br>
            <?php if($_SESSION['PARTIDA'] == false) { ?>
            <a id="btn-perfil" class="btn btn-custom" href='editarUsuario.php'>Editar a conta </a>
            <?php } ?>
            <br><br>
            <?php if($_SESSION['PARTIDA'] == false) { ?>
            <a id="btn-perfil" class="btn btn-custom" href="" onclick="return deletarUsuarioModal();"> Excluir a conta</a>
            <?php } ?>
            <div id="deletarUsuarioDiv" class="custom-dialog" style="display: none;">
                <h3>Excluir a conta</h3>
                <br>
                <label class="dialogLabel" for="campoSenha">Insira sua senha:</label>
                <input class="dialogInput" type="password" id='senhaAtualDel' autocomplete="off">
                <p id="erroInvalidoDeletar"></p>
                <br>
                <div class="custom-dialog-buttons">
                    <a id='botaoConfirmar' href="#" onclick="deletarConfirmacao(true, 'deletarUsuarioDiv'); return false;">Confirmar</a>
                    <a id='botaoCancelar' href="#" onclick="deletarUsuarioModal(); return false;">Cancelar</a>
                </div>
            </div>
        </div>
        </p>
    </div>
</div>


<br><br><br>
</body>
<script>
    function deletarUsuarioModal() {

        var status = document.getElementById('deletarUsuarioDiv').style.display;
        if (status === 'block') {
            document.getElementById('deletarUsuarioDiv').style.display = 'none';
            return false;
        }

        // Exibe o diálogo de confirmação personalizado
        // document.getElementById('deletarUsuarioMensagem').textContent = message;
        document.getElementById('deletarUsuarioDiv').style.display = 'block';
        return false; // Evita que o link seja seguido
    }

    function alterarSenhaModal() {

        var status = document.getElementById('alterarSenhaDiv').style.display;
        if (status === 'block') {
            document.getElementById('alterarSenhaDiv').style.display = 'none';
            return false;
        }

        // Exibe o diálogo de confirmação personalizado
        // document.getElementById('alterarSenhaMensagem').textContent = message;
        document.getElementById('alterarSenhaDiv').style.display = 'block';
        return false; // Evita que o link seja seguido
    }

    function alterarConfirmacao(result, id) {

        var senhaNova = $('#senhaNova').val();
        var senhaNovaConf = $('#senhaNovaConf').val();

        //Valida senha
        if (!senhaValida(senhaNova)) {
            $('.erroSenhaNaoCorresponde').text('Senha não atende aos critérios minímos.');
            return false;
        }

        // Esta função é chamada quando um botão no diálogo é clicado
        if (result) {
            // Ação a ser realizada se o usuário clicar em "OK"
            if (senhaNova == senhaNovaConf) {
                $('.erroSenhaNaoCorresponde').text('');
                checarSenha('alterar', $('#senhaAtualAlt').val());
                return false;
            } else {
                $('.erroSenhaNaoCorresponde').text('Senhas não correspondem.');
            }
        } else {
            // Ação a ser realizada se o usuário clicar em "Cancelar"
            // Fecha o diálogo
            document.getElementById(id).style.display = 'none';
        }
    }

    function senhaValida(password) {
        var regex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d@.#$!%*?&]{5,}$/;
        return regex.test(password);
    }

    function deletarConfirmacao(result, id) {

        // Esta função é chamada quando um botão no diálogo é clicado
        if (result) {
            // Ação a ser realizada se o usuário clicar em "OK"
            var confirmacao = confirm('Tem certeza que deseja excluir sua conta? Essa ação é irreversível e todos os seus dados serão perdidos.');
            if (confirmacao) {
                checarSenha('excluir', $('#senhaAtualDel').val());
                return false;
            }
        } else {
            // Ação a ser realizada se o usuário clicar em "Cancelar"
            // Fecha o diálogo
            document.getElementById(id).style.display = 'none';
        }
    }

    function checarSenha(metodo, senha) {

        $.ajax({
            url: 'checarSenha.php',
            type: 'POST',
            data: {
                idUsuario: <?php echo json_encode($usuario->getIdUsuario()); ?>,
                senha: senha
            },
            success: function(response) {
                if (response == 'valid') {
                    if (metodo == 'excluir') {
                        deletarConta();
                    } else if (metodo == 'alterar') {
                        alterarSenha();
                    }
                } else {
                    if (metodo == 'excluir') {
                        $('#erroInvalidoDeletar').text('Senha incorreta.');
                    } else if (metodo == 'alterar') {
                        $('#erroInvalidoAlterar').text('Senha incorreta.');
                    }
                }
            }
        });
    }

    function alterarSenha() {
        var senhaNova = $('#senhaNova').val();

        $.ajax({
            url: 'alterarSenha.php',
            type: 'POST',
            data: {
                idUsuario: <?php echo json_encode($usuario->getIdUsuario()); ?>,
                senhaNova: senhaNova
            },
            success: function(response) {
                if (response == 'updated') {
                    alert('Senha alterada com sucesso.');
                    document.getElementById('alterarSenhaDiv').style.display = 'none';
                } else {
                    $('#erroInvalidoDeletar').text('Erro ao alterar senha.');
                }
            }
        });
    }

    function deletarConta() {
        $.ajax({
            url: 'excluirConta.php',
            type: 'POST',
            data: {
                idUsuario: <?php echo json_encode($usuario->getIdUsuario());?>,
                autoDelete: true 
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
    }
</script>
<?php include_once("../../bootstrap/footer.php") ?>

</html>