<style>
.navbar {
             /* Cor de fundo desejada para a Navbar */
 
            font-size: 16px; /* Tamanho da fonte */
            font-family: Poppins-regular;
        }



.btn-custom {
  border-color: #C05367;
  color: #C05367; 
}

.btn-darkmode {
  display: inline-flex; /* Para alinhar o ícone verticalmente com o texto */
  align-items: center; /* Para alinhar o ícone verticalmente com o texto */
  justify-content: center; 
  background-color: #ebf0f1;
  border-style: none;
  width: 35px;
  height: 35px;
}

.btn-lightmode {
  display: inline-flex; /* Para alinhar o ícone verticalmente com o texto */
  align-items: center; /* Para alinhar o ícone verticalmente com o texto */
  justify-content: center; 
  background-color: #1B1B1B;
  border-style: none;
  width: 35px;
  height: 35px;
}

.btn-lightmode:hover {
    background-color: #1B1B1B; 
    border-color: #1B1B1B;
    color: #ebf0f1;
}

.btn-darkmode:hover {
    background-color: #ebf0f1; 
    border-color: #ebf0f1;
    color: #1B1B1B;
}

.btn-lightmode:focus, .btn-lightmode:active{
    box-shadow: none;
}

.btn-darkmode:focus, .btn-darkmode:active{
    box-shadow: none;
}

.fa-moon {
    font-size: 21px;
    color: #1B1B1B
}
.fa-sun {
    font-size: 21px;
    color: #ebf0f1;
}

.btn-custom:hover {
  background-color: #f0b6bc; 
  border-color: #f0b6bc;
  color: #fff; 
}

.btn-jogar{
  background-color:#338a5f;
  color: #fff;
}
.btn-jogar:hover {
  background-color: #04574d;
  border-color: #04574d;
  color: #fff !important;
}

.dropdown-menu{
 border-color: #f0b6bc; 

}
.dropdown-item{
color: #C05367;

}
.dropdown-item:hover{
background-color: #f0b6bc; 
color:#fff;
}

#menu {
    width: auto;
    height: 20px;
}

.navbar-toggler {
    box-shadow: none;
    border: none;
    outline: none;
}


</style>

<body onload="carregar_modo()">
<nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a href="../home/index.php" class="navbar-brand">
                <img id="logo" src="../../public/logo-green.svg" alt="Logo" width="30" height="30">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarLinks"
            aria-controls="navbarLinks" aria-expanded="false" aria-label="Toggle navigation">
            <img id="menu" src="../../public/menu.svg" alt="">
        </button>

            <div class="collapse navbar-collapse" id="navbarLinks">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" style="color: #338a5f;" font-style="" href="../home/projeto.php">Projeto</a>
                    </li>
                </ul>
                <div class="ml-auto">
                    <a href="../users/cadastro.php" class="btn btn-outline btn-custom mr-2">Cadastre-se</a>
                    <a href="../users/login.php" class="btn btn-jogar">Iniciar Sessão</a>
                    <button type="button" id="dark-mode" class="btn btn-darkmode"><i id="logoDarkMode" class="fa-solid fa-moon"></i></button>
                </div>
            </div>
        </div>
    </nav>
 

