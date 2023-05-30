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
            echo "<a href='visualizarPlanta.php?idp=".$equipe->getIdEquipe()."&ide=".$planta->getEspecie()->getIdEspecie()."'><img src='".$planta->getImagemPlanta()."' style='width: 95%; height: 95%;'class='card-img-top mais' alt='...'></a>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title nome-soc'>". $planta->getNomeSocial() ."</h5>";
            echo "<p class='card-text nome-texto'>Código: ".$planta->getCodNumerico()."<br>Pontuação: ".$planta->getPontos()."<br>".$planta->getZona()."</p>";
            echo "<a href='editarPlanta.php?id=".$planta->getIdPlanta()."' class='btn btn-primary editar'>Editar</a>";
            echo "<a href='deletarPlanta.php?id=".$planta->getIdPlanta()."' onclick='return confirm(\"Confirma a exclusão da Planta?\");' class='btn btn-alert excluir'>Excluir</a>";
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