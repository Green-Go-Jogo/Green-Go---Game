<!DOCTYPE html>
<html lang="pt-br">

<head>

  <title>Cadastro</title>
  <?php include_once("../../bootstrap/header.php"); ?>
  <link rel="stylesheet" href="../csscheer/cadastro.css">
  <link rel="stylesheet" href="../csscheer/perfil.css">

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

  .password {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
  }

  .password input {
    background-color: transparent;
    width: 30px;
    height: 40px;
    text-align: center;
    border: none;
    border-bottom: solid 2px #C05367;
    font-size: 20px;
    color: #04574d;
    outline: none;
  }

  .modo-escuro .password input {
    color: #FFFFFF;
  }
</style>
<nav>
  <?php include_once("../../bootstrap/nav.php"); ?>
</nav>


<body>

  <div class="container">
    <div class="row justify-content-md-left">
      <h1 class="titulo" id="titulo">Recuperar Senha</h1>
      <h3 style="font-size: 25px" class="titulo" id="subtitulo">Iremos enviar um e-mail com um código único de 6 digítos que permitirá com que você altere sua senha</h3>

      <div id="cadastroForm">
        <div>
          <div>


            <label for="email-cadastro" id="cadastroemail">Insira o e-mail vinculado a sua conta:</label>
            <br>
            <input type="" class="form-control" id="email-cadastro" autocomplete="off" name='field_email'>
            <span id='erroInvalido'></span>
            <br>
            <br>

            <div class="row align-items-center">
              <div class="col-auto">
                <button class="btn" id="botaocadastro" onclick="comecarTimer();">Enviar</button>
                <button class="btn" id="botaovoltar" onclick="voltarLogin();">Voltar</button>
              </div>
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
        <div class="modal-header" style="justify-content: center;">
          <h1 class="modal-title fs-5 text-center" id="modalCodigoLabel">Alterar Senha</h1>
        </div>
        <div class="modal-body">
          <p class="text-center" id='subtituloRec'></p>
          <br>
          <div class="password">
            <input maxlength="1" class="input" name="digit" type="text" oninput="moverParaProximo(this, event)" onkeydown="movimentarCodigo(this, event)" onpaste="lidarComColar(event)" />
            <input maxlength="1" class="input" name="digit" type="text" oninput="moverParaProximo(this, event)" onkeydown="movimentarCodigo(this, event)" onpaste="lidarComColar(event)" />
            <input maxlength="1" class="input" name="digit" type="text" oninput="moverParaProximo(this, event)" onkeydown="movimentarCodigo(this, event)" onpaste="lidarComColar(event)" />
            <input maxlength="1" class="input" name="digit" type="text" oninput="moverParaProximo(this, event)" onkeydown="movimentarCodigo(this, event)" onpaste="lidarComColar(event)" />
            <input maxlength="1" class="input" name="digit" type="text" oninput="moverParaProximo(this, event)" onkeydown="movimentarCodigo(this, event)" onpaste="lidarComColar(event)" />
            <input maxlength="1" class="input" name="digit" type="text" oninput="moverParaProximo(this, event)" onkeydown="movimentarCodigo(this, event)" onpaste="lidarComColar(event)" />
          </div>
          <div class="senhaNovaDiv"></div>
          <br>
          <p class="text-center" id='complemento'>Insira o código</p>
          <div style="display: flex; justify-content: center;">
            <button type="button" id='botaoReenviar' class="btn btn-secondary text-center" onclick="comecarTimer()">Reenviar Código</button>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" id="botaoConfirmar" onclick="cancelarCodigo()">Cancelar</button>
          <button type="button" class="btn btn-primary" id="botaoCancelar" onclick="alterarConfirmacao()">Alterar Senha</button>
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
  let timer;
  let countdown = 60;
  let modalAberto = false;

  function voltarLogin(){
    window.location.href = "login.php"
  }

  function moverParaProximo(element, event) {
    if (element.value.length === 1) {

      let inputs = document.querySelectorAll('.password input[name="digit"]');
      let allFilled = Array.from(inputs).every(input => input.value.length === 1);
      let nextElement = element.nextElementSibling;
      if (allFilled) {
        checarCodigo();
      } else if (nextElement && nextElement.tagName === 'INPUT') {
        nextElement.focus();
      }
    }
  }

  function moverParaAnterior(element, event) {
    let previousElement = element.previousElementSibling;
    if (previousElement && previousElement.tagName === 'INPUT') {
      previousElement.focus();
      previousElement.value = ''; // Apaga o valor do campo anterior
    }
  }

  function movimentarCodigo(element, event) {
    if (event.key === 'Backspace' && element.value.length === 0) {
      moverParaAnterior(element, event);
    } else if (event.key === 'ArrowLeft') {
      moverParaAnterior(element, event);
    } else if (event.key === 'ArrowRight') {
      let nextElement = element.nextElementSibling;
      if (nextElement && nextElement.tagName === 'INPUT') {
        nextElement.focus();
      }
    }
  }

  function lidarComColar(event) {
    let pasteData = (event.clipboardData || window.clipboardData).getData('text');
    let inputs = document.querySelectorAll('.password input[name="digit"]');
    pasteData = pasteData.substring(0, inputs.length); // Limita o comprimento do pasteData ao número de campos

    inputs.forEach((input, index) => {
      input.value = pasteData[index] || '';
    });

    // Move o foco para o próximo campo vazio
    inputs[pasteData.length - 1].focus();

    // Verifica se todos os campos foram preenchidos
    let allFilled = Array.from(inputs).every(input => input.value.length === 1);
    if (allFilled) {
      checarCodigo();
    }

    event.preventDefault(); // Previne o comportamento padrão de colar
  }


  function abrirModal() {
    var modal = new bootstrap.Modal(document.getElementById('modalCodigo'));
    modal.show();
  }

  function cancelarCodigo() {
    var confirmacao = confirm('Tem certeza que deseja cancelar a redefinição de senha? você será encaminhado à página de login.');
    if (confirmacao) {
      window.location.href = "login.php";
    } else {}
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
          countdown = 0;
        } else if (response.status === "success") {
          document.getElementById('erroInvalido').innerHTML = "";
          document.getElementById('botaocadastro').setAttribute('onClick', 'javascript: abrirModal();');
          if (!modalAberto) {
            abrirModal();
            modalAberto = true;
          }
          document.getElementById('subtituloRec').innerHTML = response.message;
        }
      }
    });
  }

  function senhaValida(password) {
    var regex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
    return regex.test(password);
  }

  function alterarConfirmacao() {

    var senhaNova = $('#senhaNova').val();
    var senhaNovaConf = $('#senhaNovaConf').val();

    //Valida senha
    if (!senhaValida(senhaNova)) {
      $('.erroSenhaNaoCorresponde').text('Senha não atende aos critérios minímos.');
      return false;
    }

    if (senhaNova == senhaNovaConf) {
      $('.erroSenhaNaoCorresponde').text('');
      alterarSenha();
    } else {
      $('.erroSenhaNaoCorresponde').text('Senhas não correspondem.');
    }
  }

  function alterarSenha() {

    const email = document.getElementById('email-cadastro').value;
    var senhaNova = $('#senhaNova').val();

    $.ajax({
      url: 'alterarSenha.php',
      type: 'POST',
      data: {
        email: email,
        senhaNova: senhaNova
      },
      success: function(response) {
        if (response == 'updated') {
          alert('Senha alterada com sucesso. Redirecionando para a página de login.');
          window.location.href = 'login.php'
        } else {
          $('#erroInvalidoDeletar').text('Erro ao alterar senha.');
        }
      }
    });
  }

  function checarCodigo() {

    const email = document.getElementById('email-cadastro').value;
    let inputs = document.querySelectorAll('.password input[name="digit"]');
    let codigo = '';
    inputs.forEach(input => {
      codigo += input.value;
    });

    $.ajax({
      url: 'checarCodigoRecuperacao.php',
      type: 'POST',
      data: {
        email: email,
        codigo: codigo
      },
      success: function(response) {
        console.log(response);
        if (response.status === "true") {
          document.getElementById('subtituloRec').innerHTML = 'Código validado, preencha com sua nova senha nos campos abaixo.';
          document.querySelector('.senhaNovaDiv').innerHTML = '<label class="dialogLabel" for="campoSenha">Nova senha:</label>' +
            '<input class="dialogInput" type="password" id="senhaNova" autocomplete="off">' +
            '<p class="erroSenhaNaoCorresponde"></p>' +
            '<br>' +
            '<label class="dialogLabel" for="campoSenha">Confirmação de senha:</label>' +
            '<input class="dialogInput" type="password" id="senhaNovaConf" autocomplete="off"> ' +
            '<p class="erroSenhaNaoCorresponde"></p>'

          document.querySelector('.password').style.display = 'none';
          document.querySelector('#botaoReenviar').style.display = 'none';
          document.querySelector('#complemento').innerHTML = 'A senha deve ter no mínimo 8 dígitos com letras e números';
        } else if (response.status === "false") {
          document.getElementById('subtituloRec').innerHTML = 'Código inválido, tente novamente ou reenvie o código';
        } else {
          document.getElementById('subtituloRec').innerHTML = 'Erro desconhecido';
        }
      }
    });
  }

  function comecarTimer() {
    // Desabilitar o botão e iniciar o timer
    document.getElementById('botaoReenviar').disabled = true;
    timer = setInterval(atualizarTimer, 1000);

    // Enviar a requisição para enviar outro código
    gerarCodigoRecuperacao();
  }

  function atualizarTimer() {
    if (countdown > 0) {
      countdown--;
      document.getElementById('botaoReenviar').innerText = `Enviar (${countdown}s)`;
    } else {
      clearInterval(timer);
      countdown = 60;
      document.getElementById('botaoReenviar').innerText = 'Enviar';
      document.getElementById('botaoReenviar').disabled = false;
    }
  }
</script>

</html>