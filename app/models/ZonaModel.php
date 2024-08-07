<?php
#Arquivo com a declaração da classe Stand

class Zona implements JsonSerializable{

    private $IdZona;
    private $NomeZona;
    private $QntdPlanta;
    private $PontosTotais;
    private $Usuario;
   
    #[\ReturnTypeWillChange]
    public function jsonSerialize() {
        return
        [
            'IdZona' => $this->IdZona,
            'NomeZona' => $this->NomeZona,
            'QntdPlanta' => $this->QntdPlanta,
            'PontosTotais' => $this->PontosTotais
        ];
    }
    //Construtor da classe
    public function __construct($id="",$nome="", $qntP="", $pontosT=0, $idUsuario="")
    {
        $this->IdZona = $id;
        $this->NomeZona = $nome;
        $this->QntdPlanta = $qntP;
        $this->PontosTotais = $pontosT;
        $this->Usuario = $idUsuario;
    }
    
    public function __toString() {
        return $this->NomeZona;
    }
    /**
     * Get the value of IdZona
     */ 
    public function getIdZona()
    {
        return $this->IdZona;
    }

    /**
     * Set the value of IdZona
     *
     * @return  self
     */ 
    public function setIdZona($IdZona)
    {
        $this->IdZona = $IdZona;

        return $this;
    }

    /**
     * Get the value of QntdPlanta
     */ 
    public function getQntdPlanta()
    {
        return $this->QntdPlanta;
    }

    /**
     * Set the value of QntdPlanta
     *
     * @return  self
     */ 
    public function setQntdPlanta($QntdPlanta)
    {
        $this->QntdPlanta = $QntdPlanta;

        return $this;
    }

    /**
     * Get the value of NomeZona
     */ 
    public function getNomeZona()
    {
        return $this->NomeZona;
    }

    /**
     * Set the value of NomeZona
     *
     * @return  self
     */ 
    public function setNomeZona($NomeZona)
    {
        $this->NomeZona = $NomeZona;

        return $this;
    }

    /**
     * Get the value of PontosTotais
     */ 
    public function getPontosTotais()
    {
        return $this->PontosTotais;
    }

    /**
     * Set the value of PontosTotais
     *
     * @return  self
     */ 
    public function setPontosTotais($PontosTotais)
    {
        $this->PontosTotais = $PontosTotais;

        return $this;
    }

    /**
     * Get the value of Usuario
     */ 
    public function getUsuario()
    {
        return $this->Usuario;
    }

    /**
     * Set the value of Usuario
     *
     * @return  self
     */ 
    public function setUsuario($Usuario)
    {
        $this->Usuario = $Usuario;

        return $this;
    }
    }
    /**
     * Get the value of idStand
     */
