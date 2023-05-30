<?php
#Classe DAO para o model de personagem

#Classe DAO para o model de Personagem

include_once(__DIR__."/../connection/Connection.php");
include_once(__DIR__."/../models/UsuarioModel.php");

class UsuarioDAO {

    private const SQL_USUARIO = "SELECT * FROM usuario u";


    private function mapUsuarios($resultSql) {
            $usuarios = array();
            foreach ($resultSql as $reg):
            
            $usuario = new Usuario();  
            $usuario->setIdUsuario($reg['idUsuario']);
            $usuario->setLogin($reg['loginUsuario']);
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


    public function findById($idUsuario) {
        $conn = conectar_db();

        $sql = UsuarioDAO::SQL_USUARIO . 
                " WHERE u.idUsuario = ?";

        $stmt = $conn->prepare($sql);
        $stmt->execute([$idUsuario]);
        $result = $stmt->fetchAll();

        //Criar o objeto Planta
        $usuarios = $this->mapPlantas($result);

        if(count($usuarios) == 1)
            return $usuarios[0];
        elseif(count($usuarios) == 0)
            return null;

        die("UsuarioDAO.findById - Erro: mais de um usuario".
                " encontrado para o ID ".$idUsuario);
    }

    public function findByLoginSenha(string $login, string $senha) {
        $conn = conectar_db();

        $sql = UsuarioDAO::SQL_USUARIO . 
                " WHERE u.loginUsuario = ? AND u.senha = ?";

        $stmt = $conn->prepare($sql);
        $stmt->execute([$login, $senha]);
        $result = $stmt->fetchAll();

        //Criar o objeto Codigos
        $usuarios = $this->mapUsuarios($result);

        if(count($usuarios) == 1)
            return $usuarios[0];
        elseif(count($usuarios) == 0)
            return null;

        die("UsuarioDAO.findByLoginSenha - Erro: mais de um usuário");
    }


    public function save(Usuario $usuario) {
        $conn = conectar_db();

        $sql = "INSERT INTO usuario (nomeUsuario, loginUsuario, senha, email, genero, tipoUsuario, escolaridade)".
        " VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$usuario->getNomeUsuario(),$usuario->getLogin(), $usuario->getSenha(), $usuario->getEmail(), 
                        $usuario->getGenero(), $usuario->getTipoUsuario(), $usuario->getEscolaridade()]);
    }

    public function update(Usuario $usuario) {
        $conn = conectar_db();
    
        $sql = "UPDATE usuario SET nomeUsuario = ?, loginUsuario = ?, senha = ?, email = ?, genero = ?, tipoUsuario = ?, escolaridade = ? WHERE idUsuario = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$usuario->getNomeUsuario(), $usuario->getLogin(), $usuario->getSenha(), $usuario->getEmail(), 
        $usuario->getGenero(), $usuario->getTipoUsuario(), $usuario->getEscolaridade(), $usuario->getIdUsuario()]);
    }

    
    public function delete(Usuario $usuario) {
    $conn = conectar_db();
    

    $sql = "DELETE FROM usuario WHERE idUsuario = ?";

    $stmt = $conn->prepare($sql);
    $stmt->execute([$usuario->getIdUsuario()]);
}
    
}

?>