<?php session_start(); ?>
<?php if (isset($_SESSION['msg_erro'])): ?>
  <span>
    <?= $_SESSION['msg_erro'] ?>
  </span>
<?php endif ?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    
    <title>Cadastro</title>
    <?php include_once("../../bootstrap/header.php");?>
    <link rel="stylesheet" href="../csscheer/cadastro.css">

</head>

<nav>
<?php include_once("../../bootstrap/nav.php");?>
</nav>

<body>

    <div class="container">
      <div class="row justify-content-md-left">
      <h1 class="titulo" id="titulo">Criar conta</h1>

      <form method="post" action="cadastroExec.php">
        <div>
          <div>
            <label for="nome-cadastro" id="cadastronome">Nome Completo:</label>
            <br>
            <input type="text" class="form-control" id="nome-cadastro"> <br>
            
            <label for="email-cadastro" id="cadastrousuario">Nome de Usuário:</label>
            <br>
            <input type="text" class="form-control" id="login-cadastro" autocomplete="off"  name='field_login' required> <br>

            <label for="email-cadastro" id="cadastroemail">E-mail:</label>
            <br>
            <input type="email" class="form-control" id="email-cadastro" autocomplete="off"  name='field_email' required> <br>

            <label for="senha-cadastro" id="cadastrosenha">Senha:</label>
            <br>
            <input type="password" class="form-control" id="senha-cadastro" autocomplete="off" name="field_password" required> <br>
            <h6 class="senha-cadastro">8 caracteres contendo letras e números</h6>

            <label for="caixinha-cad" id="cadastrogenero">Gênero:</label>
            <br>
            <select name="field_genero" class="form-control"  required> <br>
              <option selected></option>
              <option value="Feminino">Feminino</option>
              <option value="Masculino">Masculino</option>
              <option value="Outro">Outro</option>
            </select>
            <br><br>


            <label for="caixinha-cad" id="cadastrogenero">Nível de escolaridade:</label>
            <br>
            <select name="field_escolaridade" class="form-control"required>
              <option selected></option>
              <option value="6° Ano (EF II)"> 6° ano (EF II) </option>
              <option value="7° Ano (EF II)"> 7° ano (EF II)</option>
              <option value="8° Ano (EF II)"> 8° ano (EF II) </option>
              <option value="9° Ano (EF II)"> 9° ano (EF II) </option>
              <option value="Ensino Médio">Ensino médio</option>
              <option value="Ensino Superior">Ensino superior</option>
            </select>
            <br>
            <br>
            <br>
            <br>

            <div class="row align-items-center">
              <div class="col-auto">
                <button class="btn" id="botaocadastro" type="submit">Cadastrar</button>

              </div>
              <div class="col-auto">
                <p id="jatemumaconta">Já tem uma conta?<a id="entrar" href="login.php">Entrar</a></p>
              </div> <br><br>

              <div class="row container">
                <p class="container termos" id="termos">
                  Ao clicar em “Cadastrar”, você aceita o nosso
                  <a class="termos" id="termos1" href="../termos.php" target="__blank">Termo de Consentimento
                    Livre e Esclarecido</a>
                </p>
              </div>
            </div>
          </div>
        </div>
        </div>
        </div>
        
      </form>
    </main>
    <?php include_once("../../bootstrap/footer.php");?>
</body>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/grayscale.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="js/registro.js"></script>
<script type="text/javascript" src="../js/imagem.js" defer></script>

</html>