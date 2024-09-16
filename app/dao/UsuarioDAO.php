<?php
#Classe DAO para o model de personagem
#Classe DAO para o model de Personagem
include_once(__DIR__ . "/../connection/Connection.php");
include_once(__DIR__ . "/../models/UsuarioModel.php");
class UsuarioDAO
{
    private const SQL_USUARIO = "SELECT * FROM usuario u WHERE u.ativo = 1";
    private const SQL_EQUIPE_USUARIO = "SELECT e.idEquipe,pe.idPartida, usuario.* FROM partida_usuario pu 
    JOIN usuario ON pu.idUsuario = usuario.idUsuario 
    JOIN partida_equipe pe ON pu.idPartidaEquipe = pe.idPartidaEquipe 
    JOIN equipe e ON pe.idEquipe = e.idEquipe WHERE usuario.ativo = 1";

    private function mapUsuarios($resultSql)
    {
        $usuarios = array();
        foreach ($resultSql as $reg) :

            $usuario = new Usuario();
            $usuario->setIdUsuario($reg['idUsuario']);
            $usuario->setLogin($reg['loginUsuario']);
            $usuario->setNomeUsuario($reg['nomeUsuario']);
            $usuario->setGenero($reg['genero']);
            $usuario->setEmail($reg['email']);
            $usuario->setEscolaridade($reg['escolaridade']);
            $usuario->setSenha($reg['senha']);
            $usuario->setTipoUsuario($reg['tipoUsuario']);
            array_push($usuarios, $usuario);
        endforeach;
        return $usuarios;
    }

    public function list()
    {
        $conn = conectar_db();
        $sql = UsuarioDAO::SQL_USUARIO .
            " ORDER BY u.nomeUsuario";
        $stm = $conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();
        return $this->mapUsuarios($result);
    }

    public function findById($idUsuario)
    {
        $conn = conectar_db();
        $sql = UsuarioDAO::SQL_USUARIO .
            " AND u.idUsuario = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$idUsuario]);
        $result = $stmt->fetchAll();
        //Criar o objeto Planta
        $usuarios = $this->mapUsuarios($result);
        if (count($usuarios) == 1)
            return $usuarios[0];
        elseif (count($usuarios) == 0)
            return null;
        die("UsuarioDAO.findById - Erro: mais de um usuario" .
            " encontrado para o ID " . $idUsuario);
    }

    public function findUsers($idEquipe, $idPartida)
    {
        $conn = conectar_db();

        $sql = UsuarioDAO::SQL_EQUIPE_USUARIO .
            " AND e.idEquipe = ? AND pe.idPartida = ?";

        $stmt = $conn->prepare($sql);
        $stmt->execute([$idEquipe, $idPartida]);
        $result = $stmt->fetchAll();

        $usuarios = $this->mapUsuarios($result);

        return $usuarios;
    }

    public function findPartida($idEquipe)
    {
        $conn = conectar_db();

        $sql = UsuarioDAO::SQL_EQUIPE_USUARIO .
            " AND e.idEquipe = ?";

        $stmt = $conn->prepare($sql);
        $stmt->execute([$idEquipe]);
        $result = $stmt->fetchAll();

        $usuarios = $this->mapUsuarios($result);

        return $usuarios;
    }

    public function findUserByType($tipo)
    {
        $conn = conectar_db();
        $sql = UsuarioDAO::SQL_USUARIO .
            " AND u.tipoUsuario = ?";
        $stm = $conn->prepare($sql);
        $stm->execute([$tipo]);
        $result = $stm->fetchAll();
        return $this->mapUsuarios($result);
    }

    public function findByLoginSenha(string $login, string $senha)
    {
        $conn = conectar_db();
        $sql = UsuarioDAO::SQL_USUARIO . " AND (email = ? OR loginUsuario = ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$login, $login]);
        $result = $stmt->fetchAll();

        $usuarios = $this->mapUsuarios($result);
        foreach ($usuarios as $usuario) {
            $hashSenhaArmazenada = $usuario->getSenha();
            if (password_verify($senha, $hashSenhaArmazenada)) {
                return $usuarios[0];
            } else {
                return null;;
            }
        }
    }

    public function checkSenhaByIdUser(string $idUsuario, string $senha)
    {
        $conn = conectar_db();
        $sql = UsuarioDAO::SQL_USUARIO . " AND idUsuario = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$idUsuario]);
        $result = $stmt->fetchAll();

        $usuarios = $this->mapUsuarios($result);
        foreach ($usuarios as $usuario) {
            $hashSenhaArmazenada = $usuario->getSenha();
            if (password_verify($senha, $hashSenhaArmazenada)) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function logon(Usuario $usuario)
    {
        $email_or_login = $usuario->getLogin();
        $senha = $usuario->getSenha();
        $usuario = $this->findByLoginSenha($email_or_login, $senha);
        if ($usuario == null) {
            $aviso = "E-mail ou Senha incorretos!!!";
            header('location: login.php?aviso=' . urlencode($aviso));
            exit;
        } else {
            return $usuario;
        }
    }


    public function manterSessaoADM($nomeADM)
    {
        session_start();

        if (isset($_SESSION['adm'])) {
            $nomeADM = $_SESSION['adm'];
        } else if (isset($_SESSION['normal'])) {
            header("location: users/login.php");
        } else if (!isset($_SESSION['adm']) && !isset($_SESSION['normal'])) {
            header("Location: users/login.php");
            exit;
        }
    }

    public function logoutInd($nomeADM)
    {
        session_start();

        session_destroy();
        header("Location: users/login.php");
    }

    public function logout()
    {
        session_start();

        session_destroy();
    }

    public function save(Usuario $usuario)
    {
        $conn = conectar_db();
        $sql = "INSERT INTO usuario (nomeUsuario, loginUsuario, senha, email, genero, tipoUsuario, escolaridade)" .
            " VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            $usuario->getNomeUsuario(),
            $usuario->getLogin(),
            $usuario->getSenha(),
            $usuario->getEmail(),
            $usuario->getGenero(),
            $usuario->getTipoUsuario(),
            $usuario->getEscolaridade()
        ]);
    }

    public function update(Usuario $usuario)
    {
        $conn = conectar_db();

        $sql = "UPDATE usuario SET nomeUsuario = ?, loginUsuario = ?, email = ?, genero = ?, escolaridade = ? WHERE idUsuario = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            $usuario->getNomeUsuario(),
            $usuario->getLogin(),
            $usuario->getEmail(),
            $usuario->getGenero(),
            $usuario->getEscolaridade(),
            $usuario->getIdUsuario()
        ]);
    }

    public function updateAcess(Usuario $usuario)
    {
        $conn = conectar_db();

        $sql = "UPDATE usuario SET tipoUsuario = ? WHERE idUsuario = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$usuario->getTipoUsuario(), $usuario->getIdUsuario()]);
    }

    public function updateSenhaById($idUsuario, $senhaNovaHash)
    {
        $conn = conectar_db();

        $sql = "UPDATE usuario SET senha = ? WHERE idUsuario = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$senhaNovaHash, $idUsuario]);
    }

    public function updateSenhaByEmail($email, $senhaNovaHash)
    {
        $conn = conectar_db();

        $sql = "UPDATE usuario SET senha = ? WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$senhaNovaHash, $email]);
    }

    public function delete($idUsuario)
    {
        $conn = conectar_db();

        $sql = "UPDATE usuario SET ativo = 0 WHERE idUsuario = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$idUsuario]);
    }

    public function generateSenhaCodigo($email)
    {
        $conn = conectar_db();

        $codigo = mt_rand(100000, 999999); // Gera um número aleatório de 6 dígitos

        $sql = "UPDATE usuario u SET u.codigo = ? WHERE u.email = ? AND u.ativo = 1";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$codigo, $email]);

        if ($stmt->rowCount() == 0) {
            return "E-mail incorreto ou inexistente!";
        }

        return $codigo;
    }

    public function checkEmailExists($email){
        $conn = conectar_db();

        $sql = "SELECT * FROM usuario u WHERE u.email = ? AND u.ativo = 1";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$email]);

        if ($stmt->rowCount() == 0) {
            return false;
        }

        return true;
    }

    public function checkCodigo($email, $codigo)
    {
        $conn = conectar_db();

        $sql = UsuarioDAO::SQL_USUARIO . " AND u.codigo = ? AND u.email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$codigo, $email]);
        if ($stmt->rowCount() == 0) {
            return false;
        } else {
            return true;
        }
    }
}
