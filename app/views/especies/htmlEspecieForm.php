<?php
#Classe auxiliar para criar componentes HTML de Espécie

class EspecieHTMLForm {

    public static function desenhaSelect($especies, $name, $id, $idEspecieSelec=0) {
        echo "<select id='select-state' class='form-control' name='". $name ."' id='". $id ."'>";

        echo "<option value=''>Escolha uma Espécie...</option>";
        foreach($especies as $especie):
            echo "<option value='" .$especie->getIdEspecie(). "'";

            if($especie->getIdEspecie() == $idEspecieSelec)
                echo " selected ";

            echo ">". $especie->getNomePopular()." (".$especie->getNomeCientifico(). ")"."</option>";
        endforeach;

        echo "</select>";
    }

}

?>