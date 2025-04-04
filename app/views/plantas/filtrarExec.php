<?php

include_once(__DIR__."/../../models/EspecieModel.php");
include_once(__DIR__."/../../models/ZonaModel.php");
include_once(__DIR__."/../../models/PlantaModel.php");
include_once(__DIR__."/../../models/UsuarioModel.php");
include_once(__DIR__."/../../controllers/PlantaController.php");
include_once(__DIR__."/../../controllers/UsuarioController.php");
include_once(__DIR__."/../../controllers/EspecieController.php");
include_once(__DIR__."/../../controllers/ZonaController.php");



session_start();


class FiltrarExec {
    private ZonaController $zonaCont;
    private UsuarioController $usuarioCont;
    private EspecieController $especieCont;
    private PlantaController $plantaCont;


    public function __construct() {
        $function = $_GET['function'];

        $this->zonaCont = new ZonaController();
        $this->usuarioCont = new UsuarioController();
        $this->especieCont = new EspecieController();
        $this->plantaCont = new PlantaController();
        
        $this->$function();
    }

    function getFiltros() {
        $filtros = array();        
        $zonas = $this->zonaCont->listar();
        $usuarios = $this->usuarioCont->buscarUsuarioPorTipo("2");
        $especies = $this->especieCont->listar();
        $filtros[] = $usuarios;
        $filtros[] = $especies[0];
        $filtros[] = $zonas;
        echo json_encode($filtros);
        return;
    }

    function findPlantas() {
        $data = json_decode(stripslashes($_POST['data']));
        $caracteristicas = $data[0];
        $busca = $data[1];
        $ADMs = $data[2];
        $zonas = $data[3];
        // if(empty($data[0]) && $data[1] == "" && empty($data[2])) {
        //     $data = $this->plantaCont->listar();
        //     echo json_encode($data);
        //     return;
        // }

        $filtrado = $this->plantaCont->filtrar($caracteristicas, $busca, $ADMs, $zonas);

        echo json_encode($filtrado);
        return;
    }
}

$filtrar = new FiltrarExec();