<link rel="stylesheet" href="../csscheer/verpartida.css">

<style>

        .row.row-cols-4 {
    display: flex;
    flex-wrap: wrap;
}

.col-md-4 {
    flex-basis: calc(25% - 20px);
    margin-bottom: 20px;
    padding: 10px; 
}


@media (max-width: 767px) {
    .col-md-4 {
        flex-basis: calc(50% - 20px);
    }

    .container.text-center {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
    }

    .row.row-cols-4 {
        justify-content: center;
    }
}


@media (min-width: 768px) and (max-width: 991px) {
    .col-md-4 {
        flex-basis: calc(50% - 20px);
    }
}


@media (min-width: 992px) {
    .col-md-4 {
        flex-basis: calc(25% - 20px);
    }
}


</style>

<?php

            



Class PartidaHTML {
   
    public static function desenhaPartida($partidas) {


        echo "<div class='container text-center'>";
        echo "<table class='table'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th scope='col' id='nome'>Nome da Partida</th>";
        echo "<th scope='col' id='nome'>Jogadores</th>";
        echo "<th scope='col' id='nome'>Status</th>";
        echo "<th scope='col'> </th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        foreach ($partidas as $partida) {

        

            
        if(null !==($partida->getDataInicio())) {
            $Status = "Em Andamento";
            $Open = "CLOSE";
       }
       else if(null !==($partida->getDataFim())){
           $Status = "Finalizada";
           $Open = "CLOSE";
       }
       else {
           $Status = "Aguardando";
           $Open = "OPEN";
       }
       
            echo "<tr>";
            echo "<td id='nomepartida'>".$partida->getNomePartida()."</td>";
            echo "<td id='jogadores'>"."0/".$partida->getLimiteJogadores()."</td>";
            echo "<td id='status'>".$Status."</td>";
            // echo "<td>";
            if ($Open == "OPEN") {
            echo "<td><button type='button' class='btn btn-primary entrar-btn' data-bs-toggle='modal' data-bs-target='#exampleModal' data-partida-id='".$partida->getIdPartida()."'>Entrar</button></td>";
            }
            else {

            }
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
        echo "</div>";

        // Modal HTML
        echo "<div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>";
        echo "<div class='modal-dialog'>";
        echo "<div class='modal-content'>";
        echo "<div class='modal-header'>";
        echo "<h1 class='modal-title fs-5' id='exampleModalLabel'>Enter Password</h1>";
        echo "<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>";
        echo "</div>";
        echo "<div class='modal-body'>";
        echo "<form id='password-form' action='verificar_senha.php' method='POST'>";
        echo "<input type='hidden' id='partida-id' name='partidaId'>";
        echo "<div class='mb-3'>";
        echo "<label for='password' class='col-form-label'>Password:</label>";
        echo "<input type='password' class='form-control' id='password' name='password'>";
        echo "</div>";
        echo "</div>";
        echo "<div class='modal-footer'>";
        echo "<button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>";
        echo "<button type='submit' class='btn btn-primary' id='submit-password'>Submit</button>";
        echo "</div>";
        echo "</form>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }

    public static function desenhaEquipe($usuarios, $partida) {


        echo "<div class='container text-center'>";
        echo "<table class='table'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th scope='col'>Nome</th>";
        echo "<th scope='col'>Escolaridade</th>";
        echo "<th scope='col'>Pontos</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";


        foreach ($usuarios as $usuario) { 
    
       
            echo "<tr>";
            echo "<td>".$usuario->getNomeUsuario()."</td>";
            echo "<td style='color: #04574d;'>".$usuario->getEscolaridade()."</td>";
            echo "<td style='color: #04574d;'>"."</td>";
            // echo "<td>";
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
        echo "</div>";

        if (!is_null($partida->getDataInicio())) {
            $Status = "Em andamento!";
            $Open = "CLOSE";
            $link = '<a href="mainJogo.php">Clique aqui para caçar as plantas!</a>';
        } else if (!is_null($partida->getDataFim())) {
            $Status = "Essa partida acabou!";
            $Open = "CLOSE";
            $link = '';
        } else {
            $Status = "Aguarde! O jogo iniciará assim que o Professor permitir :)";
            $Open = "OPEN";
            $link = '';
        }
        
        echo "<p class='text-center'>" . $Status . "</p>";
        
        if (!empty($link)) {
            echo "<p class='text-center'>" . $link . "</p>";
        }
    }


    public static function desenhaPartidaZona($partida) {
    
        echo "<div class='container text-center'>";
        echo "<div class='zonaP text-right'>"; // Adicione a classe zonaP aqui
        echo "<table class='table'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th scope='col'></th>";
        echo "<th scope='col' class='text-center'>ZONAS</th>";
        echo "<th scope='col'></th>";
        echo "</tr>";
        echo "<tr>";
        echo "<th scope='col'>Nome</th>";
        echo "<th scope='col'>Qntd Plantas</th>";
        echo "<th scope='col'>Pontos Totais</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        foreach ($partida->getZonas() as $zona) {

            echo "<tr>";
            echo "<td>".$zona->getNomeZona()."</td>";
            echo "<td style='color: #338a5f;'>".$zona->getQntdPlanta()."</td>";
            echo "<td style='color: #338a5f;'>".$zona->getPontosTotais()."</td>";
            echo "</tr>";

    
        }
    
        echo "</tbody>";
        echo "</table>";
        echo "</div>"; // Feche a div com a classe zonaP
        echo "</div>";
    }

    public static function desenhaPartidaEquipe($partida) {
    
        echo "<div class='container text-center'>";
        echo "<div class='equipeP text-right'>"; // Adicione a classe equipeP aqui
        echo "<table class='table'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th scope='col'></th>";
        echo "<th scope='col' class='text-center'>EQUIPES</th>";
        echo "<th scope='col'></th>";
        echo "</tr>";
        echo "<tr>";
        echo "<th scope='col'>Nome</th>";
        echo "<th scope='col'>Cor</th>";
        echo "<th scope='col'>Icon</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>"; 

        foreach ($partida->getEquipes() as $equipe) { 
            echo "<tr>";
            echo "<td>".$equipe->getNomeEquipe()."</td>";
            echo "<td style='background-color: ".$equipe->getCorEquipe()."'></td>";
            echo "<td style='color: #338a5f;'> <img style='width: 60px;' src='".$equipe->getIconeEquipe()."'/></td>";
            echo "</tr>";
        }
    
        echo "</tbody>";
        echo "</table>";
        echo "</div>"; // Feche a div com a classe zonaP
        echo "</div>";
    }

    public static function desenhaJogadorEquipe($partida) {
    
        echo "<div class='container text-center'>";
        echo "<div class='row row-cols-6'>";

        $idPartida = $partida->getIdPartida();

        foreach ($partida->getEquipes() as $equipe):
            echo "<div class='col-md-6'>";
            echo "<br>";
            echo "<div class='card' style='width: 22rem;'>";
            echo "<a href='visualizarEquipe.php?ideq=".$equipe->getIdEquipe()."'><img src='".$equipe->getIconeEquipe()."' style='width: 55%; height: 50%;'class='card-img-top mais' alt='...'></a><br>";
            echo "<div class='card-body' style='background-color:" .$equipe->getCorEquipe()."'>";
            echo "<h5 class='card-title nome-soc' id='nomeEquipe'>". $equipe->getNomeEquipe() ."</h5>";
            echo "<a href='processEquipe.php?ide=".$equipe->getIdEquipe()."&idp=".$idPartida."' class='btn btn-primary editar' id='editarEquipe' >ESCOLHER</a>";
            echo "<br>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        endforeach;

        echo "</div>";
        echo "</div>";
    
    }
}
?>