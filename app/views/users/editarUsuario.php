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
$id = $_SESSION['ID'];
$usuarioCont = new UsuarioController;
$usuario = $usuarioCont->buscarPorId($id);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

  <title>Cadastro</title>
  <?php include_once("../../bootstrap/header.php"); ?>
  <link rel="stylesheet" href="../csscheer/cadastro.css">

</head>
<style>
  .mensagemRetorno {
    width: 300px;
    word-wrap: break-word;
    color: #04574d;
    font-family: Poppins-semibold;
    margin-bottom: -20px;
    margin-left: 11px;
    font-size: 15px;
  }
</style>
<nav>
  <?php LoginController::navBar($tipo); ?>
</nav>

<body>

  <div class="container">
    <div class="row justify-content-md-left">

      <form method="POST" action="editarUsuarioExec.php" id="cadastroForm" enctype="multipart/form-data">

        <h1 class="titulo" id="titulo">Editar conta</h1>
        <div>
          <label for="nome-cadastro" id="cadastronome">Nome Completo:</label>
          <br>
          <input type="text" class="form-control" id="nome-cadastro" autocomplete="off" name="field_nome"
            value="<?= $usuario->getNomeUsuario() ?>">
          <?php if (isset($errors) && !empty($errors) && isset($errors['nomeUsuario'])) { ?>
            <div class="alert alert-warning"><?php echo $errors['nomeUsuario']; ?></div>
          <?php } ?>

          <label for="email-cadastro" id="cadastroemail">E-mail:</label>
          <br>
          <input type="email" class="form-control" id="email-cadastro" autocomplete="off" name='field_email'
            value="<?= $usuario->getEmail() ?>">
          <?php if (isset($errors) && !empty($errors) && isset($errors['email'])) { ?>
            <div class="alert alert-warning"><?php echo $errors['email']; ?></div>
          <?php } ?>

          <label for="caixinha-cad" id="cadastrogenero">Gênero:</label>
          <br>
          <select name="field_genero" class="form-control"> <br>
            <option value="Feminino" <?php echo ($usuario->getGenero() === "Feminino") ? 'selected' : ''; ?>>Feminino
            </option>
            <option value="Masculino" <?php echo ($usuario->getGenero() === "Masculino") ? 'selected' : ''; ?>>Masculino
            </option>
            <option value="Outro" <?php echo ($usuario->getGenero() === "Outro") ? 'selected' : ''; ?>>Outro</option>
          </select>
          <?php if (isset($errors) && !empty($errors) && isset($errors['genero'])) { ?>
            <div class="alert alert-warning"><?php echo $errors['genero']; ?></div>
          <?php } ?>

          <label for="caixinha-cad" id="cadastrogenero">Nível de escolaridade:</label>
          <br>
          <select name="field_escolaridade" class="form-control">
            <option value="6° Ano (EF II)" <?php echo ($usuario->getEscolaridade() === "6° Ano (EF II)") ? 'selected' : ''; ?>> 6° ano (EF II) </option>
            <option value="7° Ano (EF II)" <?php echo ($usuario->getEscolaridade() === "7° Ano (EF II)") ? 'selected' : ''; ?>> 7° ano (EF II)</option>
            <option value="8° Ano (EF II)" <?php echo ($usuario->getEscolaridade() === "8° Ano (EF II)") ? 'selected' : ''; ?>> 8° ano (EF II) </option>
            <option value="9° Ano (EF II)" <?php echo ($usuario->getEscolaridade() === "9° Ano (EF II)") ? 'selected' : ''; ?>> 9° ano (EF II) </option>
            <option value="Ensino Médio" <?php echo ($usuario->getEscolaridade() === "Ensino Médio") ? 'selected' : ''; ?>>Ensino médio</option>
            <option value="Ensino Superior" <?php echo ($usuario->getEscolaridade() === "Ensino Superior") ? 'selected' : ''; ?>>Ensino superior</option>
          </select>
          <?php if (isset($errors) && !empty($errors) && isset($errors['escolaridade'])) { ?>
            <div class="alert alert-warning"><?php echo $errors['escolaridade']; ?></div>
          <?php } ?>
          <br>
          <br>

          <input type="hidden" class="form-control" id="tipo-aluno" autocomplete="off" name="aluno"
            value="<?= $usuario->getTipoUsuario() ?>">


          <label for="senha-cadastro" id="cadastrosenha">Insira sua senha para confirmar a alteração:</label>
          <br>
          <div style="position: relative;">
            <input type="password" class="form-control pass" id="senha-confirmacao password" autocomplete="off" name="field_password">
            <i class="fa-regular fa-eye toggle-password" id="verSenha"
              style="position: absolute; right: 22%; top: 50%; transform: translateY(-50%); cursor: pointer; z-index: 2;"></i>
          </div>
          <p id='erroInvalido'></p>
          <br>
          <div class="container"> <br><br>
            <button type="submit" class="btn btn-primary btn-lg" id="botoesregistrar"><a>Salvar</a> </button>
            <button type="reset" class="btn btn-secondary btn-lg" id="botoeslimpar"> <a id="limpar">Limpar</a> </button>
            <a class="btn btn-secondary btn-lg" id="botoescancelar" href="../../views/users/perfil.php">Cancelar e
              Voltar</a>
          </div>
        </div>
    </div>
  </div>
  <input type="hidden" name="id_usuario" value="<?= $usuario->getIdUsuario() ?>" />
  </form>
  </main>
  <?php include_once("../../bootstrap/footer.php"); ?>
</body>

<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/grayscale.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="js/registro.js"></script>
<script type="text/javascript" src="../js/imagem.js" defer></script>
<script type="text/javascript" src="../js/verSenha.js" defer></script>
<script>
  $(document).ready(function () {
    $('#cadastroForm').on('submit', function (event) {
      event.preventDefault();

      var field = document.getElementsByClassName("pass")[0];
      var senha = field.value;

      $.ajax({
        url: 'checarSenha.php',
        type: 'POST',
        data: {
          idUsuario: <?= $usuario->getIdUsuario() ?>,
          senha: senha
        },
        success: function (response) {
          if (response == 'valid') {
            $('#cadastroForm').off('submit').submit();
          } else {
            $('#erroInvalido').text('Senha incorreta.');
          }
        }
      });
    });
  });
</script>

</html>