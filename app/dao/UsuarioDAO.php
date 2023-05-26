<?php
#Classe DAO para o model de personagem

#Classe DAO para o model de Personagem

include_once(__DIR__."/../connection/Connection.php");
include_once(__DIR__."/../models/UserModel.php");

class UsuarioDAO {

    private const SQL_USUARIO = "SELECT * FROM myuser u"


    private function mapUsuarios($resultSql) {
            $usuarios = array();
            foreach ($resultSql as $reg):
            
            $usuario = new Usuario();  
            $usuario->setId($reg['id']);
            $usuario->setNomeUsuario($reg['nomeUsuario']);
            $usuario->setGenero($reg['genero']);
            $usuario->setEmail($reg['email']);
            $usuario->setSenha($reg['senha']);
            $usuario->setTipoUsuario($reg['tipoUsuario']);


            array_push($usuarios, $usuario);
        endforeach;

        return $usuarios;
    
}

    public function list() {
        $conn = conectar_db();

        $sql = UsuarioDAO::SQL_USUARIO . 
                " ORDER BY u.nomeUsuario";
        $stm = $conn->prepare($sql);    
        $stm->execute();
        $result = $stm->fetchAll();

        return $this->mapUsuarios($result);
    }


    public function findById($id) {
        $conn = conectar_db();

        $sql = UsuarioDAO::SQL_USUARIO . 
                " WHERE u.id = ?";

        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetchAll();

        //Criar o objeto Planta
        $usuarios = $this->mapPlantas($result);

        if(count($usuarios) == 1)
            return $usuarios[0];
        elseif(count($usuarios) == 0)
            return null;

        die("UsuarioDAO.findById - Erro: mais de um usuario".
                " encontrado para o ID ".$id);
    }

    public function findByEmail($email) {
        $conn = conectar_db();

        $sql = UsuarioDAO::SQL_USUARIO . 
                " WHERE u.email = ?";

        $stmt = $conn->prepare($sql);
        $stmt->execute([$email]);
        $result = $stmt->fetchAll();

        //Criar o objeto Codigos
        $usuarios = $this->mapPlantas($result);

        if(count($usuarios) == 1)
            return $usuarios[0];
        elseif(count($usuarios) == 0)
            return null;

        die("UsuarioDAO.findByEmail - Erro: mais de um email".
                " encontrado para o ID ".$email);
    }


    public function save(Usuario $usuario) {
        $conn = conectar_db();

        $sql = "INSERT INTO myuser (nomeUsuario, senha, email, genero, tipoUsuario, escolaridade)".
        " VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$usuario->getNomeUsuario(), $usuario->getSenha(), $usuario->getEmail(), 
                        $usuario->getGenero(), $usuario->getTipoUsuario(), $usuario->getEscolaridade()]);
    }

    public function update(Usuario $usuario) {
        $conn = conectar_db();
    
        $sql = "UPDATE myuser SET nomeUsuario = ?, senha = ?, email = ?, genero = ?, tipoUsuario = ?, escolaridade = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$usuario->getNomeUsuario(), $usuario->getSenha(), $planta->getEmail(), 
        $usuario->getPontos(), $planta->getPlantaHistoria(), $planta->getImagemPlanta(), $planta->getZona()->getIdZona(), $planta->getEspecie()->getIdEspecie(), $planta->getIdPlanta()]);
    }

    
    public function delete(Usuario $usuario) {
    $conn = conectar_db();
    

    $sql = "DELETE FROM myuser WHERE id = ?";
    $arquivo_del = $usuario->getImagemPlanta();
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
    
}

?>