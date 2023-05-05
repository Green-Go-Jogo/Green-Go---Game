<?php
Class PlantaHTML {
    public static function desenhaPlanta($plantas) {
        echo "<div class='container text-center'>";
        echo "<div class='row row-cols-4'>"; // inicie a div row fora do loop

        foreach ($plantas as $planta):
            echo "<div class='col-md-4'>"; // inicie a div col para cada planta
            echo "<br>";
            echo "<div class='card' style='width: 18rem;'>";
            echo "<img src='".$planta->getImagemPlanta()."' style='width: 200px; height: 200px;'class='card-img-top' alt='...'>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title'>". $planta->getNomeSocial() ."</h5>";
            echo "<p class='card-text'>".$planta->getCodNumerico()."<br>".$planta->getPontos()."<br>".$planta->getZona()."</p>";
            echo "<br>";
            echo "<a href='editarPlanta.php?id=".$planta->getIdPlanta()."' class='btn btn-primary'>Editar</a>";
            echo "<a href='deletarPlanta.php?id=".$planta->getIdPlanta()."' onclick='return confirm('Confirma a exclusão da Planta?');' class='btn btn-alert'>Excluir</a>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        endforeach;

        echo "</div>"; // feche a div row
        echo "</div>";
    }
}
?>