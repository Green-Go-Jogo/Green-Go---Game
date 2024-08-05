<?php

include_once(__DIR__."/../connection/Connection.php");
include_once(__DIR__."/../models/UsuarioModel.php");
include_once(__DIR__."/../models/EspecieModel.php");

class EspecieDAO {

    private const SQL_ESPECIE = "SELECT e.*, u.nomeUsuario FROM especie e" . " JOIN usuario u ON u.idUsuario = e.idUsuario WHERE e.ativo = 1 AND u.ativo = 1";

    private function mapEspecies($resultSql) {
            $especies = array();
            foreach ($resultSql as $reg):
            
            $especie = new Especie(); 
            $especie->setIdEspecie($reg['idEspecie']);
            $especie->setNomePopular($reg['nomePop']);
            $especie->setNomeCientifico($reg['nomeCie']);
            $especie->setAutoriaImagem($reg['autoriaImagem']);
            $especie->setFontes($reg['fontes']);
            $especie->setDescricao($reg['descricao']);
            $especie->setImagemEspecie($reg['imagemEspecie']);
            $especie->setFrutifera($reg['frutifera']);
            $especie->setComestivel($reg['comestivel']);
            $especie->setMedicinal($reg['medicinal']);
            $especie->setToxidade($reg['toxicidade']);
            $especie->setExotica($reg['exotica']);
            $especie->setEndemica($reg['endemica']);
            $especie->setOrnamental($reg['ornamental']);
            $especie->setPanc($reg['panc']);
            $especie->setNativa($reg['nativa']);
            $especie->setDataCriacao($reg['dataCriacao']);
            $especie->setDataAtualizacao($reg['dataAtualizacao']);

            $usuario = new Usuario($reg['idUsuario'], $reg['nomeUsuario']);
            $especie->setUsuario($usuario);
           
            array_push($especies, $especie);
        endforeach;

        return $especies;
    
}

    public function list() {
        $conn = conectar_db();

        $sql = EspecieDAO::SQL_ESPECIE . 
                " ORDER BY e.nomePop";
        $stm = $conn->prepare($sql);    
        $stm->execute();
        $result = $stm->fetchAll();

        return $this->mapEspecies($result);
    }

    public function findById($idEspecie) {
        $conn = conectar_db();

        $sql = EspecieDAO::SQL_ESPECIE . 
                " AND e.idEspecie = ?";

        $stmt = $conn->prepare($sql);
        $stmt->execute([$idEspecie]);
        $result = $stmt->fetchAll();

        //Criar o objeto Especie
        $especies = $this->mapEspecies($result);

        if(count($especies) == 1)
            return $especies[0];
        elseif(count($especies) == 0)
            return null;

        die("EspecieDAO.findById - Erro: mais de uma espécie".
                " encontrado para o ID ".$idEspecie);
    }


    public function save(Especie $especie) {
        $conn = conectar_db();
        $especie->setDataCriacao(new DateTime("now", new DateTimeZone('America/Sao_Paulo')));
        $sql = "INSERT INTO especie (nomePop, nomeCie, descricao, imagemEspecie, frutifera, comestivel, medicinal, toxicidade, exotica, nativa, endemica, ornamental, panc, dataCriacao, fontes, autoriaImagem, idUsuario)".
        " VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$especie->getNomePopular(), $especie->getNomeCientifico(), $especie->getDescricao(), $especie->getImagemEspecie(),
                $especie->getFrutifera(), $especie->getComestivel(), $especie->getMedicinal(), $especie->getToxidade(), $especie->getExotica(), $especie->getNativa(),
                $especie->getEndemica(), $especie->getOrnamental(), $especie->getPanc(), $especie->getDataCriacao()->format('Y-m-d H:i:s'), $especie->getFontes(), $especie->getAutoriaImagem(), $especie->getUsuario()]);
    }

    public function update(Especie $especie) {
        $conn = conectar_db();
        $especie->setDataAtualizacao(new DateTime("now", new DateTimeZone('America/Sao_Paulo')));
        $sql = "UPDATE especie SET nomePop = ?, nomeCie = ?, descricao = ?, imagemEspecie = ?, frutifera = ?, comestivel = ?, medicinal = ?, toxicidade = ?, exotica = ?, nativa = ?, endemica = ?, ornamental = ?, panc = ?, fontes = ?, autoriaImagem = ?, dataAtualizacao = ?, idUsuario = ? WHERE idEspecie = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$especie->getNomePopular(), $especie->getNomeCientifico(), $especie->getDescricao(), $especie->getImagemEspecie(),
        $especie->getFrutifera(), $especie->getComestivel(), $especie->getMedicinal(), $especie->getToxidade(), $especie->getExotica(), $especie->getNativa(),
        $especie->getEndemica(), $especie->getOrnamental(), $especie->getPanc(), $especie->getFontes(), $especie->getAutoriaImagem(), $especie->getDataAtualizacao()->format('Y-m-d H:i:s'), $especie->getUsuario(), $especie->getIdEspecie()]);
    }

    
    public function delete(Especie $especie) {
        $conn = conectar_db();
        
        $sql = "UPDATE especie SET ativo = 0 WHERE idEspecie = ?";
        $arquivo_del = $especie->getImagemEspecie();
        if (file_exists($arquivo_del)) {
            unlink($arquivo_del);
        }
        $stmt = $conn->prepare($sql);
        $stmt->execute([$especie->getIdEspecie()]);
    }
 

public function deleteImage($idEspecie) {
    
    $especie = $this->findById($idEspecie);
    
    $img_del = $especie->getImagemEspecie();
    if (file_exists($img_del)) {
        unlink($img_del);
    }
}
}

?>