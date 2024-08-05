<link rel="stylesheet" href="../css/listPlanta.css">
<style>
    .btn:hover {
        color: #f58c95;
        transform: scale(1.05);
    }

    a.editar:hover {
        color: #ebf0f1 !important;
        background-color: #04574d;
    }

    a.editar {
        color: #ebf0f1 !important;
        background-color: #338a5f;
    }

    a.excluir {
        color: #f0b6bc;
        border-color: #f0b6bc;
    }

    a.excluir:hover {
        color: var(--branco);
        background-color: #f0b6bc;
        border-radius: 5px;
    }

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

    #atualização {
        color: #04574d;
        margin-bottom: -8px;
    }

    #nomezinho {
        text-decoration: underline dotted;
    }

    img.mais {
    height: 225px !important;
    transition: 0.3s ease;
    align-content: center;
    margin-top: 20px;
    margin-left: 10px;
}
</style>


<?php
class ZonaHTML
{
    public static function desenhaZona($zonas)
    {
        echo "<div class='container text-center'>";
        echo "<div class='container text-right'>";
        echo "<a class='btn incluir' href='adicionarZona.php' id='botaomais'>
        <svg xmlns='http://www.w3.org/2000/svg' width='90' height='60' fill='#20A494' viewBox='0 0 16 16'>
        <path d='M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zM8.5 6v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 1 0z'/>
        </svg> </div>
        </a>";
        $usuarioCont = new UsuarioController();
        echo "<div class='row row-cols-4'>";
        foreach ($zonas as $zona) :
            $pontosZona = $zona->getPontosTotais() !== null ? $zona->getPontosTotais() : 0;
            $usuario = $usuarioCont->buscarPorId($zona->getUsuario());
            echo "<div class='col-md-4'>";
            echo "<br>";
            echo "<div class='card' style='width: 22rem;'>";
            echo "<a href='visualizarZona.php?id=" . $zona->getIdZona()."'><img src='../../public/botaozona.png' style='width: 90%; height: 90%; margin-right: 10px; border-radius: 5px;'class='card-img-top mais' alt='...'></a>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title nome-soc' id='NomeZona'>" . $zona->getNomeZona() . "</h5>" . "<br>";
            echo "<p class='card-text nome-texto' id='quantidade'> Quantidade de Plantas: " . $zona->getQntdPlanta() . "<br>" . "</p>";
            echo "<p class='card-text nome-texto'> Pontos Totais: " . $pontosZona . "</p>";
            echo "<p class='card-text nome-texto' id='atualização' >Última edição por:";
            echo "<p class='card-text nome-texto' id='nomezinho' >" . $usuario->getNomeUsuario() . "</p>";
            if (($_SESSION['TIPO'] == 3 && $_SESSION['NOME'] == $usuario->getNomeUsuario()) || $_SESSION['TIPO'] == 2) {
                echo "<a href='editarZona.php?id=" . $zona->getIdZona() . "' class='btn btn-primary editar'>Editar</a>";
                echo "<a href='deletarZona.php?id=" . $zona->getIdZona() . "' onclick='return confirm(\"Confirma a exclusão da Zona? Todas as plantas associadas a essa zona também serão excluídas!\");' class='btn btn-alert excluir'>Excluir</a>";
            }
            echo "<br>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        endforeach;

        echo "</div>";
        echo "</div>";
    }

    public static function desenhaPlantas($plantas)
    {
        include_once("../../controllers/EspecieController.php");
        $especieCont = new EspecieController();
        
        echo "<br> <table class='table'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th class='text-center' id='nome'>Imagem</th>";
        echo "<th class='text-center' id='nome'>Nome</th>";
        echo "<th class='text-center' id='nome'>Código</th>";
        echo "<th class='text-center' id='nome'>Pontuação</th>";
        echo "<th class='text-center' id='nome'>Zona</th>";
        echo "<th class='text-center' id='nome'>Última Edição por</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        foreach ($plantas as $planta) :
            $especie = $especieCont->buscarPorId($planta->getEspecie()->getIdEspecie());
            $nomePlanta = !empty($planta->getNomeSocial()) ? $planta->getNomeSocial() : $especie->getNomePopular();
            $imagemPlanta = !empty($planta->getImagemPlanta()) ? $planta->getImagemPlanta() : $especie->getImagemEspecie();

            echo "<tr>";
            echo "<td>";
            echo "<a href='../plantas/visualizarPlanta.php?idp=" . $planta->getIdPlanta() . "&ide=" . $planta->getEspecie()->getIdEspecie() . "'>";
            echo "<img src='" . $imagemPlanta . "' style='width: 80%; height: 80%; border-radius: 15px;' class='card-img-top mais text-center' alt='...'>";
            echo "</a>";
            echo "</td>";
            echo "<td>";
            echo "<h5 id='nomePlanta' class='card-title nome-soc text-center'>" . $nomePlanta . "</h5>" . "<br>";
            echo "</td>";
            echo "<td>";
            echo "<p class='card-text nome-texto text-center'><a id='codplanta'>Código: " . $planta->getCodNumerico() . "<br><br></a></p>";
            echo "</td>";
            echo "<td>";
            echo "<p class='card-text nome-texto text-center' id='pontuacaoplanta'>Pontuação: " . $planta->getPontos() . "</p>";
            echo "</td>";
            echo "<td>";
            echo "<p class='card-text nome-texto text-center' id='zonaplanta''>" . $planta->getZona() . "</p>";
            echo "</td>";
            echo "<td>";
            echo "<p class='card-text nome-texto text-center' id='atualização' >Última edição por:</p>";
            echo "<p class='card-text nome-texto text-center' id='nomezinho' >" . $planta->getUsuario()->getNomeUsuario() . "</p>";
            echo "</td>";
            echo "</tr>";
        endforeach;

        echo "</tbody>";
        echo "</table>";
    }
}
?>


<link rel="stylesheet" href="../css/listPlanta.css">