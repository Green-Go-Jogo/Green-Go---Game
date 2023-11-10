<?php
$data = array();
if(isset($_FILES['upload']['name']))
{
    $file_name = $_FILES['upload']['name'];
    $file_tmp = $_FILES['upload']['tmp_name']; // Caminho temporário do arquivo
    $file_path = '../../public/descricao/'.$file_name;
    $file_extension = strtolower(pathinfo($file_path, PATHINFO_EXTENSION));
    
    if(move_uploaded_file($file_tmp, $file_path)){
        $data['file'] = $file_name;
        $data['url'] = $file_path;
        $data['uploaded'] = 1;
    }
    else {
        $data['uploaded'] = 0;
        $data['error']['message'] = 'Error! File not uploaded';
    }
}
echo json_encode($data);
