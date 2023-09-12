<?php
include_once("../../controllers/PlantaController.php");

if (isset($_POST['cod'])) {
    $cod = $_POST['cod'];

    // Exemplo de validação simples: Verificar se o código é igual a "1234".
    if ($cod) {
        if ($cod !== null) {
            $plantaCont = new PlantaController();
            $planta = $plantaCont->buscarPorCodigo($cod);

            if($planta) {
            $idPlanta = $planta->getIdPlanta();
            $idEspecie = $planta->getIdEspecie();

                $data = [
                    'isValid' => true,
                    'idPlanta' => $idPlanta,
                    'idEspecie' => $idEspecie
                ];

                echo json_encode($data);
            }
            else {
                $data = [
                    'isValid' => false
                ];
                echo json_encode($data);
            }
        }
        else {
            $data = [
                'isValid' => false
            ];
            echo json_encode($data);
        }
    }
    else {
        $data = [
            'isValid' => false
        ];
        echo json_encode($data);
    }

} else {
    $data = [
        'isValid' => false
    ];
    echo json_encode($data);
}
  
?>
