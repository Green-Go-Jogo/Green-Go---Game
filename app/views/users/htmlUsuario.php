
<link rel="stylesheet" href="../css/listPlanta.css">
<style>

    .btn:hover {
        color: #f58c95;
        transform: scale(1.05); }

        a.editar:hover {
            color: #ebf0f1 !important;
            background-color: #04574d; }

        a.editar{
            color: #ebf0f1 !important;
            background-color: #338a5f; }

        a.excluir {
            color: #f0b6bc;
            border-color: #f0b6bc;
        }

        a.excluir:hover {
            color: var(--branco);
            background-color: #f0b6bc;
            border-radius: 5px; }

        #NomeZona {
            background-color: #C05367;
            color: #FFFFFF !important;
            border-radius: 20px;
            transform: scale(1.05);
        }

.row.row-cols-4 {
    display: flex;
    flex-wrap: wrap;
}

.col-md-4 {
    flex-basis: calc(25% - 20px);
    margin-bottom: 20px;
    padding: 10px; 
}


@media (max-width: 767px) {
    .col-md-4 {
        flex-basis: calc(50% - 20px);
    }

    .container.text-center {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
    }

    .row.row-cols-4 {
        justify-content: center;
    }
}


@media (min-width: 768px) and (max-width: 991px) {
    .col-md-4 {
        flex-basis: calc(50% - 20px);
    }
}


@media (min-width: 992px) {
    .col-md-4 {
        flex-basis: calc(25% - 20px);
    }
}

#botaomais {
    transform: scale(1.05);
    position: relative;
    right: -2rem;
    box-shadow: none;
}

</style>


<?php
 Class UsuarioHTML {
    public static function desenhaUsuario($usuarios) {
        echo "<div class=' text-center'>";
        echo "<div class='text-right'>"; 
        echo "<table class='table'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th scope='col'></th>";
        echo "<th scope='col' class='text-center'>USUÁRIOS</th>";
        echo "<th scope='col'></th>";
        echo "</tr>";
        echo "<tr>";
        echo "<th scope='col'>Nome</th>";
        echo "<th scope='col'>E-mail</th>";
        echo "<th scope='col'>Nível de Ensino</th>";
        echo "<th scope='col'>Cargo</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        foreach ($usuarios as $usuario) {

            echo "<tr>";
            echo "<td>".$usuario->getNomeUsuario()."</td>";
            echo "<td style='color: #338a5f;'>".$usuario->getEmail()."</td>";
            echo "<td style='color: #338a5f;'>".$usuario->getEscolaridade()."</td>";
            echo "<td style='color: #338a5f;'>".$usuario->getTipoUsuario()."</td>";
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


