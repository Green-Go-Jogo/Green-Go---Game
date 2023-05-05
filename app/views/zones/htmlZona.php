
<?php

    Class ZonaHTML {
    public static function desenhaZona($zonas) {
    echo "<div class='container'>";
    
        foreach ($zonas as $zona):
    echo "<div class='row'>";
    echo "<div class='col-sm-3'>";
    echo "<div class='card' style='width: 18rem;'>";
    echo "<img src='' style='width: 200px; height: 200px;'class='card-img-top' alt='...'>";
    echo "<div class='card-body'>";
    echo "<h5 class='card-title'>". $zona->getNomeZona() ."</h5>";
    echo "<p class='card-text'>".$zona->getQntdPlanta()."<br>".$zona->getPontosTotais()."</p>";
    echo "<br>";
    echo "<a href='editarZona.php?id=".$zona->getIdZona()."' class='btn btn-primary'>Editar</a>";
    echo "<a href='deletarZona.php?id=".$zona->getIdZona()."' onclick='return confirm(\"Confirma a exclusão da Zona? Todas as plantas associadas a essa zona também serão excluídas!\");' class='btn btn-alert'>Excluir</a>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
        endforeach;
    
    echo "</div>"  ;  
}
}
?>