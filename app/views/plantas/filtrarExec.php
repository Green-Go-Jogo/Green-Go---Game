<?php


include_once(__DIR__."/../../models/EspecieModel.php");
include_once(__DIR__."/../../models/ZonaModel.php");
include_once(__DIR__."/../../models/PlantaModel.php");
include_once(__DIR__."/../../models/UsuarioModel.php");
include_once(__DIR__."/../../controllers/PlantaController.php");
include_once(__DIR__."/../../controllers/UsuarioController.php");
include_once(__DIR__."/../../controllers/EspecieController.php");


session_start();


class FiltrarExec {
    private UsuarioController $usuarioCont;    
    private EspecieController $especieCont;
    private PlantaController $plantaCont;


    public function __construct() {
        $function = $_GET['function'];

        $this->usuarioCont = new UsuarioController();
        $this->especieCont = new EspecieController();
        $this->plantaCont = new PlantaController();
        
        $this->$function();
    }

    function getFiltros() {
        $filtros = array();        
        $usuarios = $this->usuarioCont->buscarUsuarioPorTipo("2");
        $especies = $this->especieCont->listar();
        $filtros[] = $usuarios;
        $filtros[] = $especies[0];
        echo json_encode($filtros);
        return;
    }

    function bruh() {
        $data = json_decode(stripslashes($_POST['data']));
        echo json_encode($data);
        return;
    }
}

$filtrar = new FiltrarExec();


// $filtragem = array();
// if(isset($_GET['stopFiltering'])){
//     if($_GET['stopFiltering'] == true) {
//         $_SESSION['filtrado'] = null;
//         header("location: listPlantas.php");
//         die;
//     }
// }
// else {
// isset($_POST['frutifera']) && !empty($_POST['frutifera']) ? array_push($filtragem, $_POST['frutifera'] ) : NULL;
// isset($_POST['comestivel']) && !empty($_POST['comestivel']) ?  array_push($filtragem, $_POST['comestivel']) : NULL;
// isset($_POST['raridade']) && !empty($_POST['raridade']) ?  array_push($filtragem, $_POST['raridade']) : NULL;
// isset($_POST['medicinal']) && !empty($_POST['medicinal']) ?  array_push($filtragem, $_POST['medicinal']) : NULL;
// isset($_POST['toxicidade']) && !empty($_POST['toxicidade']) ?  array_push($filtragem, $_POST['toxicidade']) : NULL;
// isset($_POST['exotica']) && !empty($_POST['exotica']) ?  array_push($filtragem, $_POST['exotica']) : NULL;
// if(empty($filtragem)) {
//     header("location: listPlantas.php");
//     die();
// }
// $plantaCont = new PlantaController();
// $plantas = $plantaCont->filtrar($filtragem);


// $_SESSION['filtrado'] = $plantas;
// echo "bruh";
// return
// }