<link rel="stylesheet" href="../css/listPlanta.css">


<style>
    #botaomais {
        transform: scale(1.05);
        position: relative;
        right: -2rem;
        box-shadow: none;
    }

    #raridadeEspecie {
        margin-left: 57px;
        width: 200px;
        background-color: #FFFFFF;
        color: #C05367;
        border-radius: 20px;
    }

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

    #nomeEspecie {
        background-color: #C05367 !important;
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

    #nomezinho {
        color: #04574d;
        text-decoration: underline dotted;
    }

    #atualização {
        color: #04574d;
        margin-bottom: -8px;
    }
</style>


<?php
class EspecieHTML
{
    public static function desenhaEspecie($especies)
    {


        echo "<div class='container text-center'>";
        echo "<div class='container text-right'>";
        echo "<a class='btn incluir' href='adicionarEspecie.php' id='botaomais'>
        <svg xmlns='http://www.w3.org/2000/svg' width='90' height='60' fill='#20A494' viewBox='0 0 16 16'>
        <path d='M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zM8.5 6v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 1 0z'/>
        </svg> </div>
    </a>";
        echo "<div class='row row-cols-4'>"; // inicie a div row fora do loop

        foreach ($especies as $especie) :

            $caracteristicas = array();

            $frutifera = $especie->getFrutifera();
            if ($frutifera == 1) {
                $caracteristicas[] = "Frutífera";
            }

            $exotica = $especie->getExotica();
            if ($exotica == 1) {
                $caracteristicas[] = "Exótica";
            }

            $raridade = $especie->getRaridade();
            if ($raridade == 1) {
                $caracteristicas[] = "Rara";
            }

            $toxidade = $especie->getToxidade();
            if ($toxidade == 1) {
                $caracteristicas[] = "Tóxica";
            }

            $medicinal = $especie->getMedicinal();
            if ($medicinal == 1) {
                $caracteristicas[] = "Medicinal";
            }

            $comestivel = $especie->getComestivel();
            if ($comestivel == 1) {
                $caracteristicas[] = "Comestível";
            }

            $nativa = $especie->getNativa();
            if ($nativa == 1) {
                $caracteristicas[] = "Nativa";
            }

            $endemica = $especie->getEndemica();
            if ($endemica == 1) {
                $caracteristicas[] = "Endêmica";
            }

            $panc = $especie->getPanc();
            if ($panc == 1) {
                $caracteristicas[] = "PANC";
            }

            $ornamental = $especie->getOrnamental();
            if ($ornamental == 1) {
                $caracteristicas[] = "Ornamental";
            }


            echo "<div class='col-md-4'>";
            echo "<br>";
            echo "<div class='card' style='width: 22rem; '>";
            echo "<img src='" . $especie->getImagemEspecie() . "' style='width: 90%; height: 90%; margin-left: 18px; border-radius: 5px;'class='card-img-top mais' alt='...'>";
            echo "<div class='card-body'>";
            echo "<h5 id='nomeEspecie' class='card-title nome-soc'>" . $especie->getNomePopular() . "</h5>";
            echo "<p class='card-text nome-texto' id='atributos'>";
            $count = count($caracteristicas); 
            for ($i = 0; $i < $count; $i++) {
                echo $caracteristicas[$i];
            
                if ($i < $count - 1 && ($i + 1) % 2 == 0) {
                    echo "<br>";
                } else {
                    echo " ";
                }
            } echo "</p>";
            echo "<p class='card-text nome-texto' id='atualização' >Última edição por:";
            echo "<p class='card-text nome-texto' id='nomezinho' >" . $especie->getUsuario()->getNomeUsuario() . "</p>";
            if (($_SESSION['TIPO'] == 3 && $_SESSION['NOME'] == $especie->getUsuario()->getNomeUsuario()) || $_SESSION['TIPO'] == 2) {
                echo "<a href='editarEspecie.php?id=" . $especie->getIdEspecie() . "' class='btn btn-primary editar'>Editar</a>";
                echo "<a href='deletarEspecie.php?id=" . $especie->getIdEspecie() . "' onclick='return confirm(\"Confirma a exclusão da Espécie? Todas as plantas associadas a essa espécie também serão excluídas!\");' class='btn btn-alert excluir'>Excluir</a>";
            }
            echo "<br>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        endforeach;

        echo "</div>"; // feche a div row
        echo "</div>";
    }
}
?>