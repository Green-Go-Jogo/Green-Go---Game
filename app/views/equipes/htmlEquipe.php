<html>
<link rel="stylesheet" href="../css/listPlanta.css">
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
            echo "<a href='visualizarEquipe.php?ideq=".$equipe->getIdEquipe()."'><img src='".$equipe->getIconeEquipe()."' style='width: 95%; height: 95%;'class='card-img-top mais' alt='...'></a>";
            echo "<div class='card-body' style='background-color:" .$equipe->getCorEquipe()."'>";
            echo "<h5 class='card-title nome-soc'>". $equipe->getNomeEquipe() ."</h5>";
            echo "<p class='card-text nome-texto'>Código: ".$equipe->getCodEntrada()."</p>";
            echo "<a href='editarEquipe.php?id=".$equipe->getIdequipe()."' class='btn btn-primary editar'>Editar</a>";
            echo "<a href='deletarEquipe.php?id=".$equipe->getIdequipe()."' onclick='return confirm(\"Confirma a exclusão da equipe?\");' class='btn btn-alert excluir'>Excluir</a>";
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