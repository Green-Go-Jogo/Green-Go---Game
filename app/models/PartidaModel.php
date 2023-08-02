<?php 

Class Partida {

    private $IdPartida;
    private $DataInicio;
    private $DataFim;
    private $LimiteJogadores;
    private $Zonas;
    private $Equipes;
    private $PontuacaoEquipe;
    private $PontuacaoUsuario;




    /**
     * Get the value of IdPartida
     */ 
    public function getIdPartida()
    {
        return $this->IdPartida;
    }

    /**
     * Set the value of IdPartida
     *
     * @return  self
     */ 
    public function setIdPartida($IdPartida)
    {
        $this->IdPartida = $IdPartida;

        return $this;
    }

    /**
     * Get the value of DataInicio
     */ 
    public function getDataInicio()
    {
        return $this->DataInicio;
    }

    /**
     * Set the value of DataInicio
     *
     * @return  self
     */ 
    public function setDataInicio($DataInicio)
    {
        $this->DataInicio = $DataInicio;

        return $this;
    }

    /**
     * Get the value of DataFim
     */ 
    public function getDataFim()
    {
        return $this->DataFim;
    }

    /**
     * Set the value of DataFim
     *
     * @return  self
     */ 
    public function setDataFim($DataFim)
    {
        $this->DataFim = $DataFim;

        return $this;
    }

    /**
     * Get the value of LimiteJogadores
     */ 
    public function getLimiteJogadores()
    {
        return $this->LimiteJogadores;
    }

    /**
     * Set the value of LimiteJogadores
     *
     * @return  self
     */ 
    public function setLimiteJogadores($LimiteJogadores)
    {
        $this->LimiteJogadores = $LimiteJogadores;

        return $this;
    }

    /**
     * Get the value of Zonas
     */ 
    public function getZonas()
    {
        return $this->Zonas;
    }

    /**
     * Set the value of Zonas
     *
     * @return  self
     */ 
    public function setZonas($Zonas)
    {
        $this->Zonas = $Zonas;

        return $this;
    }

    /**
     * Get the value of Equipes
     */ 
    public function getEquipes()
    {
        return $this->Equipes;
    }

    /**
     * Set the value of Equipes
     *
     * @return  self
     */ 
    public function setEquipes($Equipes)
    {
        $this->Equipes = $Equipes;

        return $this;
    }

    /**
     * Get the value of PontuacaoEquipe
     */ 
    public function getPontuacaoEquipe()
    {
        return $this->PontuacaoEquipe;
    }

    /**
     * Set the value of PontuacaoEquipe
     *
     * @return  self
     */ 
    public function setPontuacaoEquipe($PontuacaoEquipe)
    {
        $this->PontuacaoEquipe = $PontuacaoEquipe;

        return $this;
    }

    /**
     * Get the value of PontuacaoUsuario
     */ 
    public function getPontuacaoUsuario()
    {
        return $this->PontuacaoUsuario;
    }

    /**
     * Set the value of PontuacaoUsuario
     *
     * @return  self
     */ 
    public function setPontuacaoUsuario($PontuacaoUsuario)
    {
        $this->PontuacaoUsuario = $PontuacaoUsuario;

        return $this;
    }
}