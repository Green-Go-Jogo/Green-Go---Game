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
      <h1 class="titulo" id="titulo">Criar conta</h1>

      <form method="POST" action="cadastroExec.php" id="cadastroForm" enctype="multipart/form-data">
          <label for="nome-cadastro" id="cadastronome">Nome Completo:</label>
          <br>
          <input type="text" class="form-control" id="nome-cadastro" autocomplete="off" name="field_nome">
          <p class="mensagemRetorno" id="retornoCampo1"></p> <br>

          <!-- <label for="email-cadastro" id="cadastrousuario">Nome de Usuário:</label>
            <br>
            <input type="text" class="form-control" id="login-cadastro" autocomplete="off"  name='field_login' required>
            <p class="mensagemRetorno" id="retornoCampo2"></p> <br> -->

          <label for="email-cadastro" id="cadastroemail">E-mail:</label>
          <br>
          <input type="email" class="form-control" id="email-cadastro" autocomplete="off" name='field_email' required>
          <p class="mensagemRetorno" id="retornoCampo2"></p><br>

          <label for="senha-cadastro" id="cadastrosenha">Senha:</label>
          <br>
          <p>
          <div style="position: relative;">
            <input type="password" class="form-control" id="senha-cadastro password" autocomplete="off" name="field_password"required">
            <i class="fa-regular fa-eye toggle-password" id="verSenha" style="position: absolute; right: 22%; top: 50%; transform: translateY(-50%); cursor: pointer;"></i>
          </div>
          </p>

          <p class="mensagemRetorno" id="retornoCampo3"></p> <br>
          <!-- <h6 class="senha-cadastro">5 caracteres contendo letras e números</h6> -->

          <!-- <label for="senha-cadastro" id="cadastrosenha">Confirmação de Senha:</label>
            <br>
            <input type="password" class="form-control" id="senha-cadastro-conf" autocomplete="off" name="field_password_conf" required> -->

          <!-- <p class="mensagemRetorno" id="retornoCampo5"></p> <br> -->

          <label for="caixinha-cad" id="cadastrogenero">Gênero:</label>
          <br>
          <select name="field_genero" class="form-control" required> <br>
            <option selected></option>
            <option value="Feminino">Feminino</option>
            <option value="Masculino">Masculino</option>
            <option value="Outro">Outro</option>
          </select>
          <p class="mensagemRetorno" id="retornoCampo4"></p>
          <br><br>


          <label for="caixinha-cad" id="cadastrogenero">Nível de escolaridade:</label>
          <br>
          <select name="field_escolaridade" class="form-control" required>
            <option selected></option>
            <option value="6° Ano (EF II)"> 6° ano (EF II) </option>
            <option value="7° Ano (EF II)"> 7° ano (EF II)</option>
            <option value="8° Ano (EF II)"> 8° ano (EF II) </option>
            <option value="9° Ano (EF II)"> 9° ano (EF II) </option>
            <option value="Ensino Médio">Ensino médio</option>
            <option value="Ensino Superior">Ensino superior</option>
          </select>
          <p class="mensagemRetorno" id="retornoCampo5"></p>
          <br>
          <br>
          <br>
          <br>

          <input type="hidden" class="form-control" id="tipo-aluno" autocomplete="off" name="aluno" value="1" required>
          <br>

          <div class="row align-items-center">
            <div class="col-auto">
              <button class="btn" id="botaocadastro" type="submit" disabled>Cadastrar</button>

            </div>
            <div class="col-auto">
              <p id="jatemumaconta">Já tem uma conta?<a id="entrar" href="login.php">Entrar</a></p>
            </div> <br><br>

            <div class="row container">
              <p class="container termos" id="termos">
                Ao clicar em “Cadastrar”, você aceita o nosso
                <a class="termos" id="termos1" href="../home/termos.php" target="__blank">Termo de Consentimento
                  Livre e Esclarecido</a>
              </p>
            </div>
          </div>
    </div>
  </div>
  </div>
  </div>

  <div id="resultadoVerificacao"></div>
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
  document.addEventListener("DOMContentLoaded", function () {
    const formulario = document.getElementById("cadastroForm");
    const mensagensRetorno = document.querySelectorAll(".mensagemRetorno");
    const resultadoVerificacao = document.getElementById("resultadoVerificacao");
    const botaoSubmit = document.getElementById("botaocadastro");

    const camposInputs = formulario.querySelectorAll("input, select");
    camposInputs.forEach(function (campo) {
      campo.addEventListener("input", function () {
        atualizarMensagem(campo);
      });
    });


    function atualizarMensagem(elemento) {
      const xhr = new XMLHttpRequest();
      xhr.open("POST", "../../service/UsuarioService.php", true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

      let valorCampo1 = document.getElementsByName("field_nome")[0].value;
      // let valorCampo2 = document.getElementsByName("field_login")[0].value;
      let valorCampo3 = document.getElementsByName("field_email")[0].value;
      let valorCampo4 = document.getElementsByName("field_password")[0].value;
      // let valorCampo5 = document.getElementsByName("field_password_conf")[0].value;
      let valorCampo6 = document.getElementsByName("field_genero")[0].value;
      let valorCampo7 = document.getElementsByName("field_escolaridade")[0].value;

      let nomeCampo = elemento.name;
      let valorCampo = "";

      if (elemento.tagName === "INPUT") {
        valorCampo = elemento.value;
      } else if (elemento.tagName === "SELECT") {
        valorCampo = elemento.options[elemento.selectedIndex].value;
      }


      const parametros = "field_nome=" + encodeURIComponent(valorCampo1) +
        // "&field_login=" + encodeURIComponent(valorCampo2) +
        "&field_email=" + encodeURIComponent(valorCampo3) +
        "&field_password=" + encodeURIComponent(valorCampo4) +
        // "&field_password_conf=" + encodeURIComponent(valorCampo5) +
        "&field_genero=" + encodeURIComponent(valorCampo6) +
        "&field_escolaridade=" + encodeURIComponent(valorCampo7);

      xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {

            // console.log('Resposta do servidor:', xhr.responseText);
            const respostas = JSON.parse(xhr.responseText);
            mensagensRetorno[0].textContent = respostas.campo1;
            // mensagensRetorno[1].textContent = respostas.campo2;
            mensagensRetorno[1].textContent = respostas.campo3;
            mensagensRetorno[2].textContent = respostas.campo4;
            // mensagensRetorno[4].textContent = respostas.campo5;
            mensagensRetorno[3].textContent = respostas.campo6;
            mensagensRetorno[4].textContent = respostas.campo7;

            if (respostas.campo1 || respostas.campo3 || respostas.campo4 || respostas.campo6 || respostas.campo7) {
              // Algum campo não está correto, desativar o botão de submit
              botaoSubmit.disabled = true;
            } else {
              botaoSubmit.disabled = false;
            }
          } else {
            resultadoVerificacao.innerHTML = "Erro na requisição.";
          }
        }
      };

      xhr.send(parametros);
    }
  });
</script>

</html>