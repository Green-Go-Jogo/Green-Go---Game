<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
#Classe DAO para o model de personagem

#Classe DAO para o model de Personagem

include_once(__DIR__."/../connection/Connection.php");
include_once(__DIR__."/../models/EspecieModel.php");
include_once(__DIR__."/../models/ZonaModel.php");
include_once(__DIR__."/../models/PlantaModel.php");
include_once(__DIR__."/../models/UsuarioModel.php");
require_once(__DIR__."/../api/phpqrcode/qrlib.php");

class PlantaDAO {

    private const SQL_PLANTA = "SELECT p.*, e.idEspecie, e.nomePop, z.nomeZona, u.idUsuario, u.nomeUsuario FROM planta p".
    " JOIN zona z ON z.idZona = p.idZona". " JOIN especie e ON e.idEspecie = p.idEspecie". " JOIN usuario u ON u.idUsuario = p.idUsuario WHERE p.ativo = 1";

    private function mapPlantas($resultSql) {
            $plantas = array();
            foreach ($resultSql as $reg):
            
            $planta = new Planta();  
            $planta->setIdPlanta($reg['idPlanta']);
            $planta->setNomeSocial($reg['nomeSocial']);
            $planta->setPontos($reg['pontuacaoPlanta']);
            $planta->setImagemPlanta($reg['imagemPlanta']);
            $planta->setCodNumerico($reg['codNumerico']);
            $planta->setPlantaHistoria($reg['historia']);
            $planta->setQrCode($reg['codQR']);
            $planta->setIdEspecie($reg['idEspecie']);
            if(isset($reg['nomePlanta'])) {
                $planta->setNomePlantaGenerico($reg['nomePlanta']);
            }
            $especie = new Especie($reg['idEspecie'], $reg['nomePop']);
            $planta->setEspecie($especie);

            $zona = new Zona($reg['idZona'], $reg['nomeZona']);
            $planta->setZona($zona);

            $usuario = new Usuario($reg['idUsuario'], $reg['nomeUsuario']);
            $planta->setUsuario($usuario);

            array_push($plantas, $planta);
        endforeach;

        return $plantas;
    
    }

    public function list() {
        $conn = conectar_db();

        $sql = PlantaDAO::SQL_PLANTA . 
                " ORDER BY p.nomeSocial";
        $stm = $conn->prepare($sql);    
        $stm->execute();
        $result = $stm->fetchAll();

        return $this->mapPlantas($result);
    }

    
    public function listByZona($idZona) {
        $conn = conectar_db();

        $sql = PlantaDAO::SQL_PLANTA . 
                " AND z.idZona = ?";
        $stm = $conn->prepare($sql);    
        $stm->execute([$idZona]);
        $result = $stm->fetchAll();

        return $this->mapPlantas($result);
    }


    public function findById($idPlanta) {
        $conn = conectar_db();

        $sql = PlantaDAO::SQL_PLANTA . 
                " AND p.idPlanta = ?";

        $stmt = $conn->prepare($sql);
        $stmt->execute([$idPlanta]);
        $result = $stmt->fetchAll();

        //Criar o objeto Planta
        $plantas = $this->mapPlantas($result);

        if(count($plantas) == 1)
            return $plantas[0];
        elseif(count($plantas) == 0)
            return null;

        die("PlantaDAO.findById - Erro: mais de uma planta".
                " encontrado para o ID ".$idPlanta);
    }

    public function findByCod($CodNumerico) {
        $conn = conectar_db();

        $sql = PlantaDAO::SQL_PLANTA . 
                " AND p.codNumerico = ?";

        $stmt = $conn->prepare($sql);
        $stmt->execute([$CodNumerico]);
        $result = $stmt->fetchAll();

        //Criar o objeto Codigos
        $plantas = $this->mapPlantas($result);

        if(count($plantas) == 1)
            return $plantas[0];
        elseif(count($plantas) == 0)
            return null;

        die("PlantaDAO.findByCod - Erro: mais de um codigo".
                " encontrado para o ID ".$CodNumerico);
    }

    public function gerarCodigoAleatorio() {
        $conn = conectar_db();

        $sql = PlantaDAO::SQL_PLANTA . 
        " AND codNumerico = :codNumerico";

        $numeros = mt_rand(1000, 9999); // Gera um número aleatório de 4 dígitos
    
        // Verifica se o número já existe no banco de dados
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':codNumerico', $numeros);
        $stmt->execute();
    
        $count = $stmt->fetchColumn();
    
        if ($count > 0) {
          // Se o número já existir, gera um novo número chamando recursivamente a função
          return self::gerarCodigoAleatorio();
        }
    
        return $numeros;
      }
    

    public function save(Planta $planta, $questoes) {
        $conn = conectar_db();

        $sql = "INSERT INTO planta (nomeSocial, codQR, codNumerico, pontuacaoPlanta, historia, imagemPlanta, idZona, idEspecie, idUsuario)".
        " VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$planta->getNomeSocial(), $planta->getQrCode(), $planta->getCodNumerico(), 
                        $planta->getPontos(), $planta->getPlantaHistoria(), $planta->getImagemPlanta(), $planta->getZona()->getIdZona(), $planta->getEspecie()->getIdEspecie(), $planta->getUsuario()->getIdUsuario()]);
        
        $idPlanta = $conn->lastInsertId();

        foreach ($questoes as $idQuestao => $pontuacaoQuestao) {
            $sql = "INSERT INTO planta_questao (idQuestao, idPlanta, pontuacaoQuestao)" . " VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$idQuestao, $idPlanta, $pontuacaoQuestao]);
        }

        $this->saveQrCode($idPlanta, $planta->getEspecie()->getIdEspecie(), $planta->getCodNumerico());
    
        }
    
    public function saveQrCode($idPlanta, $idEspecie, $Cod_Numerico) {
        $conn = conectar_db();

        //Gerar o QR Code
        $qrCodeTexto = "https://www.greengoifpr.com.br/app/views/plantas/visualizarPlanta.php?idp=" . urlencode($idPlanta) . "&ide=". urlencode($idEspecie) . "&qrcode=true";
        $qrCodeArq = "../../public/qrcode/qrcode_". $Cod_Numerico . ".png"; 
        QRcode::png($qrCodeTexto, $qrCodeArq, QR_ECLEVEL_L, 10); 

        $sql = "UPDATE planta SET codQR = ? WHERE idPlanta = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$qrCodeArq, $idPlanta]);
    }

    public function update(Planta $planta, $questoes) {
        $conn = conectar_db();
    
        $sql = "UPDATE planta SET nomeSocial = ?, codQR = ?, codNumerico = ?, pontuacaoPlanta = ?, historia = ?, imagemPlanta = ?, idZona = ?, idEspecie = ?, idUsuario = ? WHERE idPlanta = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$planta->getNomeSocial(), $planta->getQrCode(), $planta->getCodNumerico(), 
        $planta->getPontos(), $planta->getPlantaHistoria(), $planta->getImagemPlanta(), $planta->getZona()->getIdZona(), $planta->getEspecie()->getIdEspecie(), $planta->getUsuario()->getIdUsuario(), $planta->getIdPlanta()]);
       
        $idPlanta = $planta->getIdPlanta();
        $this->deleteQuestoes($idPlanta);
        foreach ($questoes as $idQuestao => $pontuacaoQuestao) {
            $sql = "INSERT INTO planta_questao (idQuestao, idPlanta, pontuacaoQuestao)" . " VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$idQuestao, $idPlanta, $pontuacaoQuestao]);
        }

        $this->saveQrCode($idPlanta, $planta->getEspecie()->getIdEspecie(), $planta->getCodNumerico());
    
    }

    
    public function delete(Planta $planta) {
        $conn = conectar_db();
        

        $sql = "UPDATE planta p SET p.ativo = 0 WHERE idPlanta = ?";
        // $this->deleteQuestoes($planta->getIdPlanta());
        $arquivo_del = $planta->getImagemPlanta();
        if (file_exists($arquivo_del)) {
            unlink($arquivo_del);
        }
        $qrcode_del = $planta->getQrCode();
        if (file_exists($qrcode_del)) {
            unlink($qrcode_del);
        }
        $stmt = $conn->prepare($sql);
        $stmt->execute([$planta->getIdPlanta()]);
    }   

    public function deleteQuestoes($idPlanta) {

        $conn = conectar_db();
        $sql = "DELETE FROM planta_questao WHERE idPlanta = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$idPlanta]);
    }

    public function deleteImage($idPlanta) {
    
        $planta = $this->findById($idPlanta);
        
        $img_del = $planta->getImagemPlanta();
        if (file_exists($img_del) && !str_contains($img_del, "especies")) {
            unlink($img_del);
        }
    }

public function filter(Array $caracteristics, string $search, array $ADMs, array $zonas) {
    $conn = conectar_db();
    $sql = "SELECT p.*, e.*, z.nomeZona, u.idUsuario, u.nomeUsuario, COALESCE(NULLIF(p.nomeSocial, ''), e.nomePop) AS nomePlanta FROM planta p "
    . "JOIN zona z ON z.idZona = p.idZona JOIN especie e ON e.idEspecie = p.idEspecie JOIN usuario u ON u.idUsuario = p.idUsuario WHERE p.ativo = 1";
    if(! empty($caracteristics) or ! empty($ADMs) or $search != "" or ! empty($zonas)) {
        $sql .= " AND ";
    }
    //*  cria filtro das caracteristicas
    if(! empty($caracteristics)) {
        $columns = count($caracteristics);
    
        $j = 0;
        for($i = 0; $i < $columns; $i++) {
            if($i > 0) {
                $sql .= " AND ";
            }

            $sql .= "e.".$caracteristics[$j] . " = 1";
            $j++;
        }
    }
    //*  cria filtro dos adms
    if(! empty($ADMs)) {
        
        if(! empty($caracteristics)) {
            $sql .= " AND";
        }
        $sql .= " (";
        $columns = count($ADMs);
    
        $j = 0;
        for($i = 0; $i < $columns; $i++) {
            if($i > 0) {
                $sql .= " OR ";
            }

            $sql .= " u.nomeUsuario = '" . $ADMs[$j] . "'";
            $j++;
        }
        $sql .= ")";
    }
    //*  cria filtro das zonas
    if(! empty($zonas)) {
        
        if(! empty($ADMs)) {
            $sql .= " AND";
        }
        $sql .= " (";
        $columns = count($zonas);
    
        $j = 0;
        for($i = 0; $i < $columns; $i++) {
            if($i > 0) {
                $sql .= " OR ";
            }

            $sql .= " z.nomeZona = '" . $zonas[$j] . "'";
            $j++;
        }
        $sql .= ")";
    }
    //*  cria filtro da buscar
    if($search != "") {
        if(! empty($caracteristics) or ! empty($ADMs)) {
            $sql .= " AND ";
        }
        $sql .= " COALESCE(NULLIF(p.nomeSocial, ''), e.nomePop) LIKE '%".$search."%'";
    }
    
    $sql .= " ORDER BY nomePlanta;";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    try {
        return $this->mapPlantasAndEspecie($result);
    } catch (Exception $e) {
        echo "fuck";
    }
    
}
private function mapPlantasAndEspecie($resultSql) {
    $plantas = array();
    foreach ($resultSql as $reg):
    
    $planta = new Planta();  
    $planta->setIdPlanta($reg['idPlanta']);
    $planta->setNomeSocial($reg['nomeSocial']);
    $planta->setPontos($reg['pontuacaoPlanta']);
    $planta->setImagemPlanta($reg['imagemPlanta']);
    $planta->setCodNumerico($reg['codNumerico']);
    $planta->setPlantaHistoria($reg['historia']);
    $planta->setQrCode($reg['codQR']);
    $planta->setIdEspecie($reg['idEspecie']);
    if(isset($reg['nomePlanta'])) {
        $planta->setNomePlantaGenerico($reg['nomePlanta']);
    }
    $especie = new Especie();
    $especie->setDescricao($reg['descricao']);
    $especie->setNomeCientifico($reg['nomeCie']);
    $especie->setNomePopular($reg['nomePop']);
    $especie->setIdEspecie($reg['idEspecie']);
    $planta->setEspecie($especie);

    $zona = new Zona($reg['idZona'], $reg['nomeZona']);
    $planta->setZona($zona);

    $usuario = new Usuario($reg['idUsuario'], $reg['nomeUsuario']);
    $planta->setUsuario($usuario);

    array_push($plantas, $planta);
endforeach;

return $plantas;

}

}

?>