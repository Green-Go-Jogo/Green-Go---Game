<?php
#Classe auxiliar para criar componentes HTML de Stand

class EquipeHTMLForm {

    public static function desenhaSelect($equipes, $name, $id, $idEquipeSelec=0) {
        echo "<select id='select-state' placeholder='' class='form-control addEquipe'  name='". $name ."' id='". $id ."'>";

        echo "<option value=''>Escolha uma Equipe...</option>";
        foreach($equipes as $equipe):
            echo "<option value='" .$equipe->getIdEquipe(). "'";

            if($equipe->getIdEquipe() == $idEquipeSelec)
                echo " selected ";

            echo ">". $equipe->getNomeEquipe()."</option>";
        endforeach;

        echo "</select>";
    }

}

?>