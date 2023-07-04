<nav class="navbar navbar-expand-lg">
    <a href="../indexADM.php" class="navbar-brand">
        <div class="row align-items-center">
            <div id="imgmenu">
                <img class="img-responsive" id="logo">
            </div>
        </div>
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-links"
        aria-controls="navbar-links" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"><img src="../../public/menu.svg" id="menuicon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbar-links">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a class="nav-link" href="../projetoADM.php">Projeto</a></li>
            <li class="nav-item"><a class="nav-link" href="../equipes/listEquipes.php">Equipes</a></li>
            <li class="nav-item"><a class="nav-link" href="../plantas/listPlantas.php">Plantas</a></li>
            <li class="nav-item"><a class="nav-link" href="../zones/listZonas.php">Zonas</a></li>
            <li class="nav-item"><a class="nav-link" href="../especies/listEspecies.php">Espécies</a></li>
            
            <div class="btn-group d-flex align-items-center">
    <button type="button" class="btn btn-secondary dropdown-toggle custom-button" id="navdropdown" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
        Conta
    </button>
    <ul class="dropdown-menu dropdown-menu-start text-center custom-dropdown">
        <li class="nav-item"><a class="nav-item nav-link" id="botaoentrar" href="users/sair.php"><?php echo $nomeADM; ?></a></li>
        <li class="nav-item"><a class="nav-item nav-link" id="botaoentrar" href="#">perfil</a></li>
        <li class="nav-item"><a class="nav-item nav-link" id="botaoentrar" href="users/sair.php">Sair</a></li>
    </ul>
</div>
        </ul>
    </div>
</nav>

<style>
  /* Estilo para o dropdown */
  .navbar-nav .dropdown {
    background-color: transparent;
  }
  
  /* Estilo para os itens do dropdown */
  .navbar-nav .dropdown-menu {
    background-color: transparent;
  }
  
  /* Estilo para os itens do dropdown quando o mouse passa por cima */
  .navbar-nav .dropdown-menu .dropdown-item:hover {
    background-color: transparent;
  }

  .custom-button {
    background-color: transparent;
    border: none;
  }
  
  .custom-dropdown {
  width: auto !important;
  white-space: nowrap;
}

</style>