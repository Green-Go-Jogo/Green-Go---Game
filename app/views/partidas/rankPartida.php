<?php
include_once(__DIR__."/../../controllers/PartidaController.php");
include_once(__DIR__."/../../controllers/EquipeController.php");
include_once(__DIR__."/../../controllers/UsuarioController.php");
include_once(__DIR__."/htmlPartida.php");
?>
<?php include_once("../../controllers/LoginController.php");
LoginController::manterUsuario();
LoginController::verificarAcesso([1,2,3]);

if($_SESSION['PARTIDA']) {
    echo 'ativa';
}
else {
    echo 'false';
}
// $idEquipe = $_GET['ide'];

// $idPartida = $_GET['idp'];

// $usuarioCont = new UsuarioController();
// $usuarios = $usuarioCont->buscarUsuarios($idEquipe); 


// $equipeCont = new EquipeController();
// $equipe = $equipeCont->buscarPorId($idEquipe); 


// $partidaCont = new PartidaController();
// $partida = $partidaCont->buscarPorId($idPartida); 

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title>a</title>
    <?php include_once("../../bootstrap/header.php");?>


</head>



    <style>
    .btn:hover {
        color:#f58c95;
        transform: scale(1.05);
        text-decoration: none;
    }

    body {
        background-color: #ebf0f1;
    }

    </style>

</head>
<body >
<nav>

<?php LoginController::navBar($_SESSION['TIPO']);?>
<br>

</nav>
    
    
  <div id="conteudo">
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
    // function atualizarDados() {
    //     // Fazer uma requisição AJAX para atualizar os dados
    //     var xhttp = new XMLHttpRequest();
    //     xhttp.onreadystatechange = function() {
    //         if (this.readyState == 4 && this.status == 200) {
    //             // Atualizar o conteúdo da div com os novos dados
    //             document.getElementById("conteudo").innerHTML = this.responseText;
    //         }
    //     };
    //     xhttp.open("GET", "atualizar_dados.php?ide=<?php echo $idEquipe; ?>&idp=<?php echo $idPartida; ?>", true);
    //     xhttp.send();
    // }

    // // Chamar a função para atualizar os dados inicialmente ao carregar a página.
    // atualizarDados();

    // // Usar setInterval para chamar a função a cada x milissegundos.
    // setInterval(atualizarDados, 1000); // Atualizar a cada segundo (1000 ms).

</script>

</html>