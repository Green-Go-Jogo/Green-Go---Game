<style>
.navbar {
             /* Cor de fundo desejada para a Navbar */
 
            font-size: 16px; /* Tamanho da fonte */
            font-family: Poppins-regular, Roboto;
        }

.nav-item {

}
/* Estilização para o botão "Iniciar Sessão" */
.btn-custom {
  border-color: #C05367;/* Cor da borda desejada (#338a5f é verde) */
  color: #C05367; /* Cor do texto do botão */
}

/* Estilização para o texto do botão "Iniciar Sessão" quando o mouse passa por cima */
.btn-custom:hover {
  background-color: #f0b6bc; /* Cor de fundo ao passar o mouse por cima */
  border-color: #f0b6bc;
  color: #fff; /* Cor do texto ao passar o mouse por cima (branco) */
}

.btn-jogar{
  background-color:#338a5f;
  border-color: #338a5f;
  color: #fff;
}
.btn-jogar:hover {
  background-color: #04574d;/* Tonalidade mais escura de verde ao passar o mouse por cima */
  border-color: #04574d;/* Cor da borda também mais escura ao passar o mouse por cima */
  color: #fff !important;
}
.navbar-toggler-icon-custom {
  background-image: url("../../public/menu.svg"); /* Substitua pela imagem do ícone personalizado */
  width: 30px; /* Defina a largura da imagem */
  height: 30px; /* Defina a altura da imagem */
  background-size: contain; /* Ajuste o tamanho da imagem para caber dentro do espaço */
  background-repeat: no-repeat; /* Evite a repetição da imagem */
  display: inline-block; /* Ajuste o ícone responsivo para ser mostrado em linha com outros elementos */
  
}
</style>


<nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a href="#" class="navbar-brand">
                <img src="../../public/logo-green.svg" alt="Logo" height="30">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarLinks"
                aria-controls="navbarLinks" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon-custom"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarLinks">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" style="color: #338a5f;" font-style="" href="../home/projeto.php">Projeto</a>
                    </li>
                </ul>
                <div class="ml-auto">
                    <a href="../users/login.php" class="btn btn-outline btn-custom mr-2">Iniciar Sessão</a>
                    <a href="../users/login.php" class="btn btn-jogar">Jogar Agora</a>
                </div>
            </div>
        </div>
    </nav>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

    <!-- Adicione o link para o Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
