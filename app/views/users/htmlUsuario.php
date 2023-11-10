
<link rel="stylesheet" href="../css/listPlanta.css">
<style>

th, td {
            border: 1px solid #dddddd;
            text-align: center;
            padding: 8px;
            width: 25%; /* Definindo a largura para 25% para cada coluna */
        }
</style>


<?php
 Class UsuarioHTML {
    public static function desenhaUsuario($usuarios) {
        echo "<div class='text-center'>";
        echo "<div class='text-right'>"; 
        echo "<table class='table'>";
        echo "<thead>";
        echo "<tr>";
        echo "<p class='text-center'>LISTA DE USUÁRIOS</p>";
        echo "</tr>";
        echo "<tr>";
        echo "<th class='text-center' scope='col'>Nome</th>";
        echo "<th class='text-center' scope='col'>E-mail</th>";
        echo "<th class='text-center' scope='col'>Nível de Ensino</th>";
        echo "<th class='text-center' scope='col'>Cargo</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody class='container'>";

        foreach ($usuarios as $usuario) {
            $isCurrentUser = ($_SESSION["ID"] == $usuario->getIdUsuario());

            echo "<tr>";
            echo "<td>".$usuario->getNomeUsuario()."</td>";
            echo "<td style='color: #338a5f;'>".$usuario->getEmail()."</td>";
            echo "<td style='color: #338a5f;'>".$usuario->getEscolaridade()."</td>";
            echo "<td>";
            if (!$isCurrentUser) {
        echo "<select class='tipoUsuarioSelect' data-id='" . $usuario->getIdUsuario() . "' onchange='mudarTipoUsuario(this)'>";
        echo "<option value='3'" . ($usuario->getTipoUsuario() == 3 ? ' selected' : '') . ">Professor</option>";
        echo "<option value='2'" . ($usuario->getTipoUsuario() == 2 ? ' selected' : '') . ">Administrador</option>";
        echo "<option value='1'" . ($usuario->getTipoUsuario() == 1 ? ' selected' : '') . ">Aluno</option>";
        echo "</select>";
    } else {
        echo "Administrador";
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


