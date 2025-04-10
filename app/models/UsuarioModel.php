<?php 


    class Usuario implements JsonSerializable{

        private $idUsuario;
        private $nomeUsuario;
        private $email;
        private $senha;
        private $genero;
        private $escolaridade;
        private $tipoUsuario;
        private $codigo;

        #[\ReturnTypeWillChange]
        public function jsonSerialize() {
            return
            [
                'idUsuario' => $this->idUsuario,
                'nomeUsuario' => $this->nomeUsuario,
                'email' => $this->email,
                'senha' =>$this->senha,
                'genero' => $this->genero,
                'escolaridade' => $this->escolaridade,
                'tipoUsuario' => $this->tipoUsuario
            ];
        }
         //Construtor da classe
    public function __construct($id="",$nome="")
    {
        $this->idUsuario = $id;
        $this->nomeUsuario = $nome;
    }
    
    
        public function __toString() {
                return $this->nomeUsuario;
                return $this->escolaridade;
            }

        /**
         * Get the value of nomeUsuario
         */ 
        public function getNomeUsuario()
        {
                return $this->nomeUsuario;
        }

        /**
         * Set the value of nomeUsuario
         *
         * @return  self
         */ 
        public function setNomeUsuario($nomeUsuario)
        {
                $this->nomeUsuario = $nomeUsuario;

                return $this;
        }

        /**
         * Get the value of email
         */ 
        public function getEmail()
        {
                return $this->email;
        }

        /**
         * Set the value of email
         *
         * @return  self
         */ 
        public function setEmail($email)
        {
                $this->email = $email;

                return $this;
        }

        /**
         * Get the value of senha
         */ 
        public function getSenha()
        {
                return $this->senha;
        }

        /**
         * Set the value of senha
         *
         * @return  self
         */ 
        public function setSenha($senha)
        {
                $this->senha = $senha;

                return $this;
        }

        /**
         * Get the value of genero
         */ 
        public function getGenero()
        {
                return $this->genero;
        }

        /**
         * Set the value of genero
         *
         * @return  self
         */ 
        public function setGenero($genero)
        {
                $this->genero = $genero;

                return $this;
        }

        /**
         * Get the value of escolaridade
         */ 
        public function getEscolaridade()
        {
                return $this->escolaridade;
        }

        /**
         * Set the value of escolaridade
         *
         * @return  self
         */ 
        public function setEscolaridade($escolaridade)
        {
                $this->escolaridade = $escolaridade;

                return $this;
        }

        /**
         * Get the value of tipoUsuario
         */ 
        public function getTipoUsuario()
        {
                return $this->tipoUsuario;
        }

        /**
         * Set the value of tipoUsuario
         *
         * @return  self
         */ 
        public function setTipoUsuario($tipoUsuario)
        {
                $this->tipoUsuario = $tipoUsuario;

                return $this;
        }
        /**
         * Get the value of idUsuario
         */ 
        public function getIdUsuario()
        {
                return $this->idUsuario;
        }

        /**
         * Set the value of idUsuario
         *
         * @return  self
         */ 
        public function setIdUsuario($idUsuario)
        {
                $this->idUsuario = $idUsuario;

                return $this;
        }

        /**
         * Get the value of codigo
         */ 
        public function getCodigo()
        {
                return $this->codigo;
        }

        /**
         * Set the value of codigo
         *
         * @return  self
         */ 
        public function setCodigo($codigo)
        {
                $this->codigo = $codigo;

                return $this;
        }
       } 