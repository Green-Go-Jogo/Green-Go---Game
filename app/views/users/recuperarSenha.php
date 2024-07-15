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
  <?php include_once("../../bootstrap/nav.php"); ?>
</nav>


<body>

  <div class="container">
    <div class="row justify-content-md-left">
      <h1 class="titulo" id="titulo">Recuperar Senha</h1>
      <h3 style="font-size: 25px" class="titulo" id="titulo">Iremos enviar um e-mail com um código único de 6 digítos que permitirá com que você altere sua senha</h3>

      <div id="cadastroForm">
        <div>
          <div>


            <label for="email-cadastro" id="cadastroemail">Insira o e-mail vinculado a sua conta:</label>
            <br>
            <input type="email" class="form-control" id="email-cadastro" autocomplete="off" name='field_email'>
            <span id='erroInvalido'></span>
            <br>
            <br>

            <div class="row align-items-center">
              <div class="col-auto">
                <button class="btn" id="botaocadastro" onclick="gerarCodigoRecuperacao()">Enviar</button>
              </div>
              <div class="col-auto">
                <p id="jatemumaconta">Já tem uma conta?<a id="entrar" href="login.php">Entrar</a></p>
              </div> <br><br>

              <div class="row container">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="resultadoVerificacao"></div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="modalCodigo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalCodigoLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="modalCodigoLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p id='resposta'></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" onclick="cancelarCodigo()">Cancelar</button>
          <button type="button" class="btn btn-primary">Understood</button>
        </div>
      </div>
    </div>
  </div>
  </main>
  <br><br>
  <?php include_once("../../bootstrap/footer.php"); ?>
</body>

<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/grayscale.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

  function abrirModal() {
    var modal = new bootstrap.Modal(document.getElementById('modalCodigo'));
    modal.show();
  }

  function cancelarCodigo() {
    var confirmacao = confirm('Tem certeza que deseja cancelar a redefinição de senha? você será encaminhado à página de login.');
    if(confirmacao){
      window.location.href = "login.php";
    } else {
    }
  }

  function gerarCodigoRecuperacao() {

    const email = document.getElementById('email-cadastro').value;
    $.ajax({
      url: 'enviarEmailRecuperacao.php',
      type: 'POST',
      data: {
        email: email
      },
      success: function(response) {

        if (response.status === "form-error") {
          document.getElementById('erroInvalido').innerHTML = response.message;
        } else {
          document.getElementById('botaocadastro').setAttribute('onClick', 'javascript: abrirModal();');
          abrirModal();
          document.getElementById('resposta').innerHTML = response.message;
        }
      }
    });
  }
</script>

</html>