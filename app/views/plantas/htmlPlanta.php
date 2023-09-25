
<link rel="stylesheet" href="../css/listPlanta.css">


<style>

#botaomais {
    justify-content : right;
    display : flex;
    transform: scale(1.05);
}

    .btn:hover {
        color: #f58c95;
        transform: scale(1.05); }



        a#editas {
            color: #C05367;
            border-color: #C05367;
        }

        a#editas:hover {
            color: var(--branco);
            background-color: #C05367;
            border-radius: 5px; }

        a.excluir {
            color: #f0b6bc;
            border-color: #f0b6bc;
        }

        a.excluir:hover {
            color: var(--branco);
            background-color: #f0b6bc;
            border-radius: 5px; }

        #nomePlanta {
            background-color: #C05367 !important;
            color: #FFFFFF !important;
            border-radius: 20px;
            transform: scale(1.05);
        }

        #nomePlanta2 {
            background-color: #f58c95 !important;
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
}

#codplanta {
    color : #7EC4BB;
    text-decoration : underline dotted;
}

</style>

<?php

include_once("../../controllers/EspecieController.php");


Class PlantaHTML {
    public static function desenhaPlanta($plantas) {
        $especieCont = new EspecieController();
        echo "<div class='container text-center'>";
        echo "<a class='btn incluir' href='adicionarPlanta.php' id='botaomais'>
        <svg xmlns='http://www.w3.org/2000/svg' width='90' height='60' fill='#20A494' viewBox='0 0 16 16'>
        <path d='M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zM8.5 6v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 1 0z'/>
        </svg>
    </a>";
        echo "<div class='row row-cols-4'>";
        foreach ($plantas as $planta):
            $especie = $especieCont->buscarPorId($planta->getEspecie()->getIdEspecie());
            $nomePlanta = $planta->getNomeSocial() !== null ? $planta->getNomeSocial() : $especie->getNomePopular(); 
            echo "<div class='col-md-4'>";
            echo "<br>";
            echo "<div class='card card-darkmode' style=' width: 22rem;'>";
            echo "<a href='visualizarPlanta.php?idp=".$planta->getIdPlanta()."&ide=".$planta->getEspecie()->getIdEspecie()."'><img src='".$planta->getImagemPlanta()."' style='width: 90%; height: 90%; margin-right: 10px; border-radius: 5px;'class='card-img-top mais' alt='...'></a>";
            echo "<div class='card-body'>";
            if ($nomePlanta == $planta->getNomeSocial()){
                echo "<h5 id='nomePlanta' class='card-title nome-soc'>". $nomePlanta ."</h5>"."<br>";
                }
            else {
                echo "<h5 id='nomePlanta2' class='card-title nome-soc'>". $nomePlanta ."</h5>"."<br>";
                }
            echo "<p class='card-text nome-texto'><a id='codplanta' >Código: ".$planta->getCodNumerico()."<br><br></a>Pontuação: ".$planta->getPontos()."<br>"."</p>";
            echo "<p class='card-text nome-texto' style='color: #338a5f;'>".$planta->getZona()."</p>";
            echo "<p class='card-text nome-texto' id='nomezinho' >".$planta->getUsuario()->getNomeUsuario()."</p>";
            echo "<button type='button' id='imprimas' data-toggle='modal' data-target='#imprimirModal' onclick='prepararImpressao(\"".$planta->getNomeSocial()."\", \"".$especie->getNomePopular()."\", \"".$especie->getNomeCientifico()."\", \"".$planta->getCodNumerico()."\", \"".$planta->getQrCode()."\")'>Imprimir</button>";
            echo "<br>";
            echo "<br>";
            echo "<a href='editarPlanta.php?id=".$planta->getIdPlanta()."'  id='editas'>Editar</a>";
            echo "<a href='deletarPlanta.php?id=".$planta->getIdPlanta()."' onclick='return confirm(\"Confirma a exclusão da Planta?\");'  id='excluas' class='btn btn-alert excluir'>Excluir</a>";
            echo "<br>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        endforeach;

        
            echo "<div id='imprimirModal' class='modal fade' role='dialog'>";
            echo "<div class='modal-dialog'>";
            echo "<div class='modal-content'>";
            echo "<div class='modal-header'>";
            echo "<h4 class='modal-title text-center'>Imprimir Planta</h4>";
            echo "<button type='button' class='close' data-dismiss='modal'>&times;</button>";
            echo "</div>";
            echo "<div class='modal-body'>";
            echo "<div id='conteudoParaImpressao'>";
            echo "</div>";
            echo "</div>";
            echo "<div class='modal-footer'>";
            echo "<button type='button' class='btn btn-default' data-dismiss='modal'>Fechar</button>";
            echo "<button type='button' class='btn btn-primary' onclick='abrirTelaDeImpressao()'>Imprimir</button>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";

        echo "</div>";
        echo "</div>";
    }
}
?>