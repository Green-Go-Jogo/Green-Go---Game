<link rel="stylesheet" href="../csscheer/verpartida.css">
<link rel="stylesheet" href="../css/listPlanta.css">

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


.custom-container {
display: flex;
}

.custom-div {
padding: 10px;
position: relative; /* Habilita o posicionamento relativo */
top: -50px; /* Ajuste conforme necessário para posicionar acima da tabela */
left: 1200px; /* Ajuste conforme necessário para posicionar à direita */
/* Você pode ajustar top, right, bottom, left conforme necessário */
}

#nomeEquipe {
    background-color: #FFFFFF !important;
    color: #04574d;
    border-radius: 20px;
}

#codigoEquipe {
    margin-left: 57px;
    width: 200px;
    background-color: #FFFFFF;
    color: #C05367;
    border-radius: 20px;
}


    #escolherEquipe{
        color: #338a5f;
        background-color: #ffffff; 
        border-color: #ffffff;
        font-family: Poppins-semibold;
        font-size: 20px; }

            
    #escolherEquipe:hover {
        color: #ffffff;
        background-color: #338a5f;
        border-color: #338a5f; }



.container.text-center.equipe {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    min-height: 60vh;
}

#lab-senha {
    color: #04574d;
}

    .btn.submit:hover {
        color: #ebf0f1 !important;
        background-color: #04574d; }

    .btn.submit{
        color: #ebf0f1 !important;
        background-color: #338a5f; }

    .btn.cancel {
            color: #C05367;
            background-color: #FFFFFF;
            border-color: #C05367;
        }

    .btn.cancel:hover {
        color: var(--branco);
        background-color: #f0b6bc !important;
        border-radius: 5px; }

    #password {
        background-color: #f0b6bc;
    color: #ffffff;
    font-family: Poppins-semibold;
    margin-bottom: 50px;
    border-radius: 5px;
    height: auto;
    border-radius: 5px;
    }

    #pontosequipe, #nomequipe {
        color: #C05367;
        font-family: Poppins;
        font-size: 25px;
    }

    #tabelapontos, #tabelanome {
        color: #078071;
        font-family: Poppins-semibold;
        font-size: 15px;
        text-decoration: underline dotted;
    }

    #fecharpassword {
        color: #C05367;
        border-color: #C05367;
        font-size: 17px;
        font-family: Poppins-semibold;
    }

    #fecharpassword:hover {
        color: #ffffff;
        background-color: #C05367 !important;
    }

    #submit-password {
        color: #ffffff;
        background-color: #078071;
        font-size: 17px;
        font-family: Poppins-semibold;
    }

    #submit-password:hover {
        color: #ffffff;
        background-color: #04574d;
    }

    #exampleModalLabel {
        font-family: Poppins-medium;
    }


</style>

<?php

Class PartidaHTML {
   
    public static function desenhaPartida($partidas) {

        echo "<div class='container text-center'>";
        echo "<div class='row row-cols-4'>";

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
           
        echo "<div class='col-md-4'>";
        echo "<br>";
        echo "<div class='card' style='width: 22rem;'>";
        echo "<div class='card-body'>";
        echo "<h5 class='card-title' id='nomepartida'>".$partida->getNomePartida()."</h5>"."<br>";
        echo "<p class='card-text nome-texto'> Jogadores: "."0/".$partida->getLimiteJogadores()."</p>";
        echo "<p class='card-text nome-texto' id='status'> Status: ".$Status."</p>";
        
            if ($Open == "OPEN") {
            echo "<button type='button' class='btn entrar-btn' data-bs-toggle='modal' data-bs-target='#exampleModal' data-partida-id='".$partida->getIdPartida()."'>Entrar</button>";
            }
            else {

            }
            echo "<br>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }

        echo "</div>";

        // Modal HTML
        echo "<div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>";
        echo "<div class='modal-dialog'>";
        echo "<div class='modal-content'>";
        echo "<div class='modal-header'>";
        echo "<h1 class='modal-title text-center fs-5' id='exampleModalLabel'>Insira a senha:</h1>";
        echo "</div>";
        echo "<div class='modal-body'>";
        echo "<form id='password-form' action='verificar_senha.php' method='POST'>";
        echo "<input type='hidden' id='partida-id' name='partidaId'>";
        echo "<div class='mb-3'>";
        echo "<label for='password' id='lab-senha' class='col-form-label'> </label>";
        echo "<input type='password' class='form-control' id='password' name='password'>";
        echo "</div>";
        echo "</div>";
        echo "<div class='modal-footer'>";
        echo "<button type='button' class='btn cancel btn-secondary' data-bs-dismiss='modal' id='fecharpassword'>Fechar</button>";
        echo "<button type='submit' class='btn submit btn-primary' id='submit-password'>Entrar</button>";
        echo "</div>";
        echo "</form>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }

    public static function desenhaEquipe($usuarios, $partida, $idEquipe) {


        echo "<div class='container text-center'>";
        echo "<table class='table'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th scope='col' id='nomequipe'>Nome</th>";
        echo "<th scope='col' id='pontosequipe'>Pontos</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";


        foreach ($usuarios as $usuario) { 
    
       
            echo "<tr>";
            echo "<td id='tabelanome'>".$usuario->getNomeUsuario()."</td>";
            echo "<td id='tabelapontos'>"."</td>";
            // echo "<td>";
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
        echo "</div>";

        if (!is_null($partida->getDataFim())) {
            $Status = "Essa partida acabou!";
            $Open = "CLOSE";
            $link = '';
        } else if (!is_null($partida->getDataInicio())) {
            $Status = "Em andamento!";
            $Open = "CLOSE";
            $link = '<a style="font-family: Poppins-medium; margin-top: 15px; href='mainJogo.php?idp=".$partida->getIdPartida().'&ide='.$idEquipe."'>Clique aqui para caçar as plantas!</a>';
            
        } else {
            $Status = '<a style="font-family: Poppins-medium; margin-top: 15px;">Aguarde! O jogo iniciará assim que o Professor permitir ★</a>';
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
    
        echo "<div class='container text-center equipe'>";
        echo "<div class='row row-cols-4'>";

        $idPartida = $partida->getIdPartida();

        foreach ($partida->getEquipes() as $equipe):
            echo "<div class='col-md-6'>";
            echo "<br>";
            echo "<div class='card' style='width: 22rem;'>";
            echo "<a><img src='".$equipe->getIconeEquipe()."' style='width: 55%; height: 50%;'class='card-img-top mais' alt='...'></a><br>";
            echo "<div class='card-body' style='background-color:" .$equipe->getCorEquipe()."'>";
            echo "<h5 class='card-title nome-soc' id='nomeEquipe'>". $equipe->getNomeEquipe() ."</h5>";
            echo "<a href='processEquipe.php?ide=".$equipe->getIdEquipe()."&idp=".$idPartida."' class='btn btn-primary excluir' id='escolherEquipe' >Quero essa!</a>";
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