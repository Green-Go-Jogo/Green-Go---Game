
<link rel="stylesheet" href="../css/listPlanta.css">
<style>

    td.tb_conteudo, th.text-center, td#tb_cargocss {
        border-color: #dddddd
     }

th, td {
            border: 1px solid #dddddd;
            text-align: center;
            padding: 8px;
            width: 25%; /* Definindo a largura para 25% para cada coluna */
        }

        #tb_nome_usuario, #tb_email, #tb_ensino, #tb_cargo {
        color: #C05367;
        font-family: Poppins;
        font-size: 25px;
    }
        .tb_conteudo {
        color: #078071;
        font-family: Poppins-semibold;
        font-size: 15px;
        }
        #tb_conteudo_cargo {
        background-color: #f0b6bc;
        color: #ffffff;
        font-family: Poppins-semibold !important;
        margin-left: 20px !important;
        border-radius: 5px;
        width: 160px;
        height: auto;
        border-radius: 5px;
        border: 1px solid #ced4da;
        }

        #tb_adm{
        color: #f58c95;
        font-family: Poppins-semibold;
        font-size: 15px;
        margin-bottom: -16px;
        }


</style>


<?php
 Class UsuarioHTML {
    public static function desenhaUsuario($usuarios) {
        echo "<div class='table-responsive'>";
        echo "<table class='table'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th colspan='4' class='text-center'>LISTA DE USUÁRIOS</th>";
        echo "</tr>";
        echo "<tr>";
        echo "<th class='text-center'>Nome</th>";
        echo "<th class='text-center'>E-mail</th>";
        echo "<th class='text-center'>Nível de Ensino</th>";
        echo "<th class='text-center'>Cargo</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        foreach ($usuarios as $usuario) {
            $isCurrentUser = ($_SESSION["ID"] == $usuario->getIdUsuario());

            echo "<tr>";
            echo "<td class='tb_conteudo' >".$usuario->getNomeUsuario()."</td>";
            echo "<td class='tb_conteudo' style='color: #338a5f;'>".$usuario->getEmail()."</td>";
            echo "<td class='tb_conteudo' style='color: #338a5f;'>".$usuario->getEscolaridade()."</td>";
            echo "<td id ='tb_cargocss'>";
            if (!$isCurrentUser) {
        echo "<select class='tipoUsuarioSelect' id='tb_conteudo_cargo' data-id='" . $usuario->getIdUsuario() . "' onchange='mudarTipoUsuario(this)'>";
        echo "<option value='3'" . ($usuario->getTipoUsuario() == 3 ? ' selected' : '') . ">Professor</option>";
        echo "<option value='2'" . ($usuario->getTipoUsuario() == 2 ? ' selected' : '') . ">Administrador</option>";
        echo "<option value='1'" . ($usuario->getTipoUsuario() == 1 ? ' selected' : '') . ">Aluno</option>";
        echo "</select>";
    } else {
        echo "<p id='tb_adm'> Administrador </p>";
    }
            echo "</td>";
            echo "</tr>";

    
        }
    
        echo "</tbody>";
        echo "</table>";
        echo "</div>"; 
        echo "</div>";

        echo "</div>";
    }
}
?>


<link rel="stylesheet" href="../css/listPlanta.css">


