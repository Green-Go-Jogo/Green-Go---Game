<?php
include_once(__DIR__."/../../connection/Connection.php");
include_once(__DIR__."/../../controllers/UsuarioController.php");
include_once(__DIR__."/htmlUsuario.php");
?>
<?php include_once("../../controllers/LoginController.php");
LoginController::manterUsuario();
LoginController::verificarAcesso([2, 3]);
?>

<!DOCTYPE html>
<html lang="en">
<head>

<title>Usuários</title>
<?php include_once("../../bootstrap/header.php");?>
    
</head>

<nav>

    <?php include_once("../../bootstrap/navADM.php");?>
    
</nav>

    <br>
<h1 class="text-center primeirotextoreg titulo-zonas">GERENCIAR USUÁRIOS</h1>
   <main>
</div> <br> <br> <br> <br>
        
        <?php
            $usuarioCont = new UsuarioController();
            $usuarios = $usuarioCont->listar(); 
            
            UsuarioHTML::desenhaUsuario($usuarios);
        ?>
        </div>  

</div>
</main>
<?php include_once("../../bootstrap/footer.php");?>
<script>
    async function mudarTipoUsuario(selectElement) {
        const idUsuario = selectElement.getAttribute('data-id');
        const novoTipoUsuario = selectElement.value;

        try {
        await fetch('../users/alterarUsuario.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: `idUsuario=${idUsuario}&novoTipoUsuario=${novoTipoUsuario}`
        });

        console.log(idUsuario + novoTipoUsuario);
    } catch (error) {
        console.error('Erro ao enviar POST:', error);
    }
}
</script>
</html>