<?php
#Classe auxiliar para criar componentes HTML de Stand

class ZonaHTMLForm {

    public static function desenhaSelect($zonas, $name, $id, $idZonaSelec=0) {
        echo "<select id='select-state' placeholder='' class='form-control addZona'  name='". $name ."' id='". $id ."'>";

        echo "<option value=''>Escolha uma Zona...</option>";
        foreach($zonas as $zona):
            echo "<option value='" .$zona->getIdZona(). "'";

            if($zona->getIdZona() == $idZonaSelec)
                echo " selected ";

            echo ">". $zona->getNomeZona()." (Quantidade de Plantas: ". $zona->getQntdPlanta(). ")"."</option>";
        endforeach;

        echo "</select>";
    }

}
