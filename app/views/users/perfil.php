<?php include_once("../../controllers/LoginController.php");
LoginController::manterUsuario();
LoginController::verificarAcesso([2, 3]);
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
    <?php include_once("../../bootstrap/header.php") ?>
</head>
<style>
        .center-icon {
            display: flex;
            align-items: center; /* Centraliza verticalmente */
            justify-content: center; /* Centraliza horizontalmente */
            height: 100%; /* Ocupa a altura da tela */
        }

    
        .fa-user{
            font-size: 150px;  
            color: #333; 
        }

        .profile-info {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        /* Estilos opcionais para o conteúdo */
        .profile-info p {
            margin: 0;
            text-align: center;
            justify-content: center;
            color: #078071;
        }

        /* Defina a largura das colunas (50% para cada coluna) */
        .profile-info .column {
            width: calc(50% - 10px); /* Leva em consideração o espaço entre as colunas */
        }

        .btn-custom {
        border-color: #C05367;
        color: #C05367; 
        }

        .btn-perfil p{
            margin: 0;
            text-align: center;
            justify-content: center;
        }

        .custom-dialog {
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 300px;
            margin: 0 auto;
        }
        .custom-dialog h3 {
            margin-top: 0;
        }
        .custom-dialog-buttons {
            display: flex;
            justify-content: space-between;
        }
</style>
<?php include_once("../../bootstrap/navADM.php") ?>

    <div class="container">
        <br>
        <br>
        <h2 class="titulo text-center">
        <?php echo $usuario->getNomeUsuario(); ?>
        </h2>

        <br> <br> 

        <i class="fa-solid fa-user center-icon"></i>
        <div class="profile-info">
        <div class="column">
            <p>
                <strong>Genero:</strong> <br><?php echo $usuario->getGenero() ?><br><br>
                <strong>Acesso:</strong> <br><?php $acesso = $usuario->getTipoUsuario(); if($acesso == 1) {
                    echo "Aluno";} else if ($acesso == 2) { echo "Administrador";} else { echo "Professor";} ?>
            </p>
        </div>
        
        <div class="column">
            <p>
                <strong>Nível Acadêmico:</strong> <br><?php echo $usuario->getEscolaridade(); ?><br><br>
                <strong>E-mail:</strong> <br><?php echo $usuario->getEmail() ?>
            </p>
        </div>
    </div>
    <br>
            <div class="column">
            <div class="btn-perfil">
            <p>
                <a id="btn-perfil" class="btn btn-custom" href='<?php $usuario->getIdUsuario() ?>'> Editar </a>
                <br><br><a id="btn-perfil" class="btn btn-custom" href='controllers/LoginController.php?action=sair'> Sair da conta </a>
                <br><br><a id="btn-perfil" class="btn btn-custom" href="" onclick="return showCustomConfirm('Tem certeza que deseja apagar seu usuário?');"> Excluir a conta</a>
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
                alert('Ação cancelada! Implemente o comportamento desejado aqui.');
            }

            // Fecha o diálogo
            document.getElementById('custom-dialog').style.display = 'none';
        }
    </script>
<?php include_once("../../bootstrap/footer.php") ?>
</html>


