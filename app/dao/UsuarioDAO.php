<?php 

    require_once __DIR__ . "/../connection/Connection.php";
    require_once __DIR__ . "/../models/UsuarioModel.php";

    class UsuarioDAO {

        public PDO $conn;

        function __construct()
        {
            $this->conn = conectar_db();
        }

        public function create(UsuarioModel $user):int {
         try {

                $query = "INSERT INTO usuario (nomeUsuario, email, loginUsuario, senha, genero, escolaridade, tipoUsuario) VALUES (:nomeUsuario, :email, , :loginUsuario, :senha, :genero, :escolaridade, :tipoUsuario)";
                $prepare = $this->conn->prepare($query);
                $prepare->bindValue(":nomeUsuario", $user->getNomeUsuario());
                $prepare->bindValue(":loginUsuario", $user->getLogin());
                $prepare->bindValue(":email", $user->getEmail());
                $prepare->bindValue(":senha",md5($user->getSenha()));
                $prepare->bindValue(":genero", $user->getGenero());
                $prepare->bindValue(":escolaridade", $user->getEscolaridade());
                $prepare->bindValue(":tipoUsuario", 1);

                $prepare->execute();
                

                return $this->conn->lastInsertId();
                
                
            } catch(Exception $e) {
                    print("Erro ao inserir usuário no banco de dados");
            }
         }
    
       
        public function findAll(): array {

            $table = $this->conn->query("SELECT * FROM usuario");
            //$usuarios  = $table->fetchAll(PDO::FETCH_ASSOC);
            $usuarios  = $table->fetchAll(PDO::FETCH_CLASS, "UsuarioModel");

            return $usuarios;
        }

        public function findUserById(int $id) {

            $query = "SELECT * FROM usuario WHERE usuario.id = ?";
            
            $prepare = $this->conn->prepare($query);
            $prepare->bindParam(1, $id, PDO::PARAM_INT);

            if($prepare->execute()){
            
                $usuario  = $prepare->fetchObject("UsuarioModel");
            
            } else {
                $usuario = null;
            }

            return $usuario;
        }

        public function findUserByEmail(string $email) {

            $query = "SELECT * FROM usuario WHERE usuario.email = ?";
            
            $prepare = $this->conn->prepare($query);
            $prepare->bindParam(1, $email, PDO::PARAM_STR);

            if($prepare->execute()){
                $usuario  = $prepare->fetchObject("UsuarioModel");
            } else {
                $usuario = null;
            }

            return $usuario;
        }
        
        public function genero (string $genero) {

            $query = "SELECT * FROM usuario WHERE usuario.genero = ?";
            
            $prepare = $this->conn->prepare($query);
            $prepare->bindParam(1, $genero, PDO::PARAM_STR);

            if($genero == "outro"){
                return "indefinido"; } 
            else {
                return $genero;
            }
        }

        public function Logar (string $email, string $senha) {
            $query = "SELECT tipoUsuario FROM usuario WHERE usuario.email = ? and usuario.senha = ?";
            $prepare = $this->conn->prepare($query);
            $prepare->bindValue(1, $email);
            $prepare->bindValue(2, $senha);
            $result = $prepare->execute();
            if($prepare->execute()){
                $usuario  = $prepare->fetchObject("UsuarioModel");
            } else {
                $usuario = null;
            }
            return $usuario;
            var_dump($result);
    }

        public function update(UsuarioModel $user){

            $query = "UPDATE usuario SET nomeUsuario = ?, email = ?, senha = ?, genero = ?, escolaridade = ?, loginUsuario = ? WHERE id = ?";
            $prepare = $this->conn->prepare($query);
            $prepare->bindValue(1, $user->getNomeUsuario());
            $prepare->bindValue(2, $user->getEmail());
            $prepare->bindValue(3, md5($user->getSenha()));
            $prepare->bindValue(4, $user->getGenero());
            $prepare->bindValue(5, $user->getEscolaridade());
            $prepare->bindValue(6, $user->getLogin());
            $prepare->bindValue(7, $user->getIdUsuario());
            
            $result = $prepare->execute();
            //$resultU= $prepare->rowCount();
            //var_dump($resultU);
            return $result;
            if($prepare->execute()){
                $usuario  = $prepare->fetchObject("UsuarioModel");
            } else {
                $usuario = null;
            }

            return $usuario;

        }

        public function deleteById( int $id) :int{ 
            $query = "DELETE FROM usuario WHERE id = :id";

            $prepare = $this->conn->prepare($query);
            $prepare->bindValue(":id", $id);
            $prepare->execute();
            $result = $prepare->rowCount();
            //var_dump($result);
            return $result;
            
        }

        public function adm(int $id){

            $query = "UPDATE usuario SET tipoUsuario = :tipoUsuario WHERE id = :id";
            
            $prepare = $this->conn->prepare($query);
            $prepare->bindValue(":tipoUsuario", 2, PDO::PARAM_INT);
            $prepare->bindValue(":id", $id, PDO::PARAM_INT);
            $prepare->execute();
            $result = $prepare->rowCount();

            return $result;
        }
    }