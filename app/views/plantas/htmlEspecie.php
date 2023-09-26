<?php
    
class htmlEspecie{

    public static function desenhaCheckbox($especie) {
        $i = 0;
        echo "<form action='filtrarPorEspecieExec.php' class='filtro' method='POST'>";

        foreach($especie->getCaracteristicas() as $carac) {
            echo "<label for='filtro".$carac."' > ".$carac." </label>";
            echo "<input type='checkbox' class='form-control' name='".$carac."' value='".$carac."'>";
            $i++;
        }
        echo "<input type='submit' value='filtrar'>";
        echo "</form>";
        echo " <a href='filtrarPorEspecieExec.php?stopFiltering=true'><button> Parar filtro </button> </a>";


    }

}