<?php 

Class Equipe implements JsonSerializable{

    private $idEquipe;
    private $nomeEquipe;
    private $pontuacaoEquipe;
    private $corEquipe;
    private $iconeEquipe;


    //Construtor da classe

    #[\ReturnTypeWillChange]
    public function jsonSerialize() {
        return
        [
            'IdEquipe' => $this->idEquipe,
            'NomeEquipe' => $this->nomeEquipe,
            'PontuacaoEquipe' => $this->pontuacaoEquipe,
            'CorEquipe' => $this->corEquipe
        ];
    }
    public function __construct($id="",$nome="",$icone="",$pontuacao="")
    {
        $this->idEquipe = $id;
        $this->nomeEquipe = $nome;
        $this->iconeEquipe = $icone;  
        $this->pontuacaoEquipe = $pontuacao;
    }
    public function __toString() {
        return $this->nomeEquipe;
    }
    /**
     * Get the value of idEquipe
     */ 
    public function getIdEquipe()
    {
        return $this->idEquipe;
    }

    /**
     * Set the value of idEquipe
     *
     * @return  self
     */ 
    public function setIdEquipe($idEquipe)
    {
        $this->idEquipe = $idEquipe;

        return $this;
    }

    /**
     * Get the value of nomeEquipe
     */ 
    public function getNomeEquipe()
    {
        return $this->nomeEquipe;
    }

    /**
     * Set the value of nomeEquipe
     *
     * @return  self
     */ 
    public function setNomeEquipe($nomeEquipe)
    {
        $this->nomeEquipe = $nomeEquipe;

        return $this;
    }


    /**
     * Get the value of corEquipe
     */ 
    public function getCorEquipe()
    {
        return $this->corEquipe;
    }

    /**
     * Set the value of corEquipe
     *
     * @return  self
     */ 
    public function setCorEquipe($corEquipe)
    {
        $this->corEquipe = $corEquipe;

        return $this;
    }

    /**
     * Get the value of iconeEquipe
     */ 
    public function getIconeEquipe()
    {
        return $this->iconeEquipe;
    }

    /**
     * Set the value of iconeEquipe
     *
     * @return  self
     */ 
    public function setIconeEquipe($iconeEquipe)
    {
        $this->iconeEquipe = $iconeEquipe;

        return $this;
    }

    /**
     * Get the value of pontuacaoEquipe
     */ 
    public function getPontuacaoEquipe()
    {
        return $this->pontuacaoEquipe;
    }

    /**
     * Set the value of pontuacaoEquipe
     *
     * @return  self
     */ 
    public function setPontuacaoEquipe($pontuacaoEquipe)
    {
        $this->pontuacaoEquipe = $pontuacaoEquipe;

        return $this;
    }
}