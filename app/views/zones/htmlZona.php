<?php
#Classe auxiliar para criar componentes HTML de Stand

class ZonaHTML {

    public static function desenhaSelect($zonas, $name, $id, $idZonaSelec=0) {
        echo "<select class='form-control' style='width: 428px' name='". $name ."' id='". $id ."'>";

        foreach($zonas as $zona):
            echo "<option value='" .$zona->getIdZona(). "'";

            if($zona->getIdZona() == $idZonaSelec)
                echo " selected ";

            echo ">". $zona->getNomeZona()." (Quantidade de Plantas: ".")</option>";
        endforeach;

        echo "</select>";
    }

}

?>