<html>
<link rel="stylesheet" href="../css/listPlanta.css">
<style>
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

    #editarEquipe {
        background-color: #FFFFFF;
        color: #338a5f ;
        
    }

    #excluirEquipe {
        color: #338a5f ;
        background-color: #FFFFFF ;
        
    }

    #editarEquipe:hover {
        color: #04574d ;
        background-color: #338a5f ;
    }

    #excluirEquipe:hover {
        color: #FFFFFF ;
        background-color: #f0b6bc ;
        
    }

</style>
</html>

<?php
Class EquipeHTML {
    public static function desenhaEquipe($equipes) {
        echo "<div class='container text-center'>";
        echo "<div class='row row-cols-4'>";

        foreach ($equipes as $equipe):
            echo "<div class='col-md-4'>";
            echo "<br>";
            echo "<div class='card' style='width: 22rem;'>";
            echo "<a href='visualizarEquipe.php?ideq=".$equipe->getIdEquipe()."'><img src='".$equipe->getIconeEquipe()."' style='width: 55%; height: 50%;'class='card-img-top mais' alt='...'></a>";
            echo "<div class='card-body' style='background-color:" .$equipe->getCorEquipe()."'>";
            echo "<h5 class='card-title nome-soc' id='nomeEquipe'>". $equipe->getNomeEquipe() ."</h5>";
            echo "<a href='editarEquipe.php?id=".$equipe->getIdequipe()."' class='btn btn-primary editar' id='editarEquipe' >Editar</a>";
            echo "<a href='deletarEquipe.php?id=".$equipe->getIdequipe()."' onclick='return confirm(\"Confirma a exclusão da equipe?\");' class='btn btn-alert excluir' id='excluirEquipe' >Excluir</a>";
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