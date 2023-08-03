<style>
.navbar {
             /* Cor de fundo desejada para a Navbar */
 
            font-size: 16px; /* Tamanho da fonte */
            font-family: Poppins-regular;
        }

.nav-item {

}

.btn-custom {
  border-color: #C05367;
  color: #C05367; 
}

/
.btn-custom:hover {
  background-color: #f0b6bc; 
  border-color: #f0b6bc;
  color: #fff; 
}

.btn-jogar{
  background-color:#338a5f;
  border-color: #338a5f;
  color: #fff;
}
.btn-jogar:hover {
  background-color: #04574d;
  border-color: #04574d;
  color: #fff !important;
}
.navbar-toggler-icon-custom {
  background-image: url("../../public/menu.svg");
  width: 30px; 
  height: 30px; 
  background-size: contain;
  background-repeat: no-repeat; 
  display: 
  
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
</style>


<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a href="../home/indexADM.php" class="navbar-brand">
            <img src="../../public/logo-green.svg" alt="Logo" height="30">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarLinks"
            aria-controls="navbarLinks" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon-custom"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarLinks">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" style="color: #338a5f;" href="../home/projetoADM.php">Projeto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: #338a5f;" href="../equipes/listEquipes.php">Equipes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: #338a5f;" href="../plantas/listPlantas.php">Plantas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: #338a5f;" href="../zones/listZonas.php">Zonas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: #338a5f;" href="../especies/listEspecies.php">Espécies</a>
                </li>
            </ul>
            <div class="ml-auto">
              
                <div class="nav-item dropdown">
                    <a href="#" class="btn btn-outline btn-custom dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo $nomeADM; ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Perfil</a>
                        <a class="dropdown-item" href="../users/sair.php">Sair</a>
                    </div>
                    <a href="#" class="btn btn-jogar">Jogar Agora</a>
                </div>
                
            </div>
        </div>
    </div>
</nav>

<!-- Adicione o link para o Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
