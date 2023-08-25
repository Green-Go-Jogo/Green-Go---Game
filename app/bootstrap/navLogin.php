<style>
.navbar {
             /* Cor de fundo desejada para a Navbar */
 
            font-size: 16px; /* Tamanho da fonte */
            font-family: Poppins-regular;
        }



.btn-custom {
  border-color: #C05367;
  color: #C05367;
  font-size: 20px;
  width: 15rem;
  height: auto; 
}

.btn-custom:hover {
  background-color: #C05367; 
  border-color: #ffffff;
  color: #ffffff !important; 
  font-size: 20px;
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

.btn-nav {
  display: inline-flex; /* Para alinhar o ícone verticalmente com o texto */
  align-items: center; /* Para alinhar o ícone verticalmente com o texto */
  justify-content: center; 
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

.dropdown-item{
color: #C05367;
width: 15rem;
height: auto;

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
            <img  id="logo" src="../../public/logo-green.svg" alt="Logo" width="30" height="30">
        </a>

        <li class="nav-item">
                    <a class="nav-link" style="color: #338a5f;" href="../home/projetoADM.php">Projeto</a>
                </li>


            <div class="ml-auto">

                    <button type="button" id="dark-mode" class="btn btn-darkmode"><i id="logoDarkMode" class="fa-solid fa-moon"></i></button>                    
                  </div>              
            </div>
        </div>
    </div>
</nav> 

<div class="container">
    <br>
</div>

