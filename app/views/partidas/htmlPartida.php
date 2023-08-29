
<style>

    .btn:hover {
        color: #f58c95;
        transform: scale(1.05); }

        a.editar:hover {
            color: #ebf0f1 !important;
            background-color: #04574d; }

        a.editar{
            color: #ebf0f1 !important;
            background-color: #338a5f; }


        a.excluir {
            color: #f0b6bc;
            border-color: #f0b6bc;
        }

        a.excluir:hover {
            color: var(--branco);
            background-color: #f0b6bc;
            border-radius: 5px; }

        #nomePlanta {
            background-color: #C05367 !important;
            color: #FFFFFF !important;
            border-radius: 20px;
            transform: scale(1.05);
        }

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
        echo "<th scope='col'>Nome da Partida</th>";
        echo "<th scope='col'>Jogadores</th>";
        echo "<th scope='col'>Status</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        foreach ($partidas as $partida) {
            
        $statusp = $partida->getStatusPartida();
        if($statusp == 1) {
            $Status = "Aguardando";
       }
       else if($statusp == 2){
           $Status = "Em Andamento";
       }
       else if($statusp == 3){
           $Status = "Encerrada";
       }
       else {
           $Status = "Desconhecido";
       }
            echo "<tr>";
            echo "<td>".$partida->getNomePartida()."</td>";
            echo "<td style='color: #338a5f;'>"."0/".$partida->getLimiteJogadores()."</td>";
            echo "<td style='color: #04574d;'>".$Status."</td>";
            // echo "<td>";
            // echo "<a href='editarpartida.php?id=".$partida->getIdPartida()."' class='btn btn-primary editar'>Editar</a>";
            // echo "<a href='deletarpartida.php?id=".$partida->getIdPartida()."' onclick='return confirm(\"Confirma a exclusão da partida?\");' class='btn btn-alert excluir'>Excluir</a>";
            // echo "</td>";
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
        echo "</div>";
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
}
?>