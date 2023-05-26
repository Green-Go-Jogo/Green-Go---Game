<?php 

    class Usuario {

        private $id;
        private $nomeUsuario;
        private $email;
        private $senha;
        private $genero;
        private $escolaridade;
        private $tipoUsuario;


        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
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
       } 