<?php
include_once(__DIR__."/../../controllers/PartidaController.php");
include_once(__DIR__."/htmlPartida.php");
?>
<?php include_once("../../controllers/LoginController.php");
LoginController::manterUsuario();
LoginController::verificarAcesso([1,2,3]);
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title>Partidas</title>

    <?php include_once("../../bootstrap/header.php");?>
    <link rel="stylesheet" href="../csscheer/verpartida.css">


</head>
<body >
<nav>

<?php LoginController::navBar($_SESSION['TIPO']);?>
<br>

</nav>
    
  <h1 class="text-center primeirotextoreg">PARTIDAS</h1>
  <br><br><br>
    
        
        <?php
            $partidaCont = new PartidaController();
            $partidas = $partidaCont->listar(); 
            
            
            PartidaHTML::desenhaPartida($partidas);
        ?>
        </div>  


</div>
<br>
<br>
<br>
<br>
<br>


<?php include_once("../../bootstrap/footer.php");?>
</body>

<script>
$(document).ready(function() {
        $('.entrar-btn').click(function() {
            var partidaId = $(this).data('partida-id');
            $('#partida-id').val(partidaId);
        });
    });
// document.addEventListener("DOMContentLoaded", function() {

//   $(document).ready(function() {
//     $('#exampleModal').on('show.bs.modal', function(event) {
//       var button = $(event.relatedTarget); // Botão que acionou o modal
//       var partidaId = button.data('partida-id'); // ID da partida
      
//       $('#partida-id').val(partidaId); // Atualizar o valor do input hidden
//     });

//     $('#submit-password').click(function() {
//       var partidaId = $('#partida-id').val();
//       var password = $('#password').val();
//       console.log(partidaId);
//       console.log(password);

//       $.post('verificar_senha.php', { partidaId: partidaId, password: password }, function(data) {
//     if (data === 'true') {
//         console.log('Senha correta. Prossiga.');
//         // Fazer algo quando a senha estiver correta
//     } else {
//         console.log('Senha incorreta. Tente novamente.');
//         // Fazer algo quando a senha estiver incorreta
//     }
// });
//       });
//     });
//   });

</script>

</html>