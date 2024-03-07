<?php

class Questao
{

    private $idQuestao;
    private $descricaoQuestao;
    private $grauDificuldade;
    private $pontuacaoQuestao;
    private $imagemQuestao;
    private $alternativas; //Campo que armazena um array de objetos Alternativa
    private $descricaoAlternativa;
    private $alternativaCerta;
    private $idEspecie;
    private $idAlternativa;
    private $idsArray;
    private $idPlanta;
    private $idPlantaQuestao;
    
    public function getIdQuestao()
    {
        return $this->idQuestao;
    }

    public function setIdQuestao($idQuestao)
    {
        $this->idQuestao = $idQuestao;

        return $this;
    }

    /**
     * Get the value of descricaoP
     */
    public function getDescricaoQuestao()
    {
        return $this->descricaoQuestao;
    }

    /**
     * Set the value of descricaoP
     *
     * @return  self
     */
    public function setDescricaoQuestao($descricaoQuestao)
    {
        $this->descricaoQuestao = $descricaoQuestao;

        return $this;
    }

    /**
     * Get the value of grauDificuldade
     */
    public function getGrauDificuldade()
    {
        return $this->grauDificuldade;
    }

    public function getGrauDificuldadeTexto()
    {
        $grau = '';
        if ($this->grauDificuldade == 'facil')
            $grau = 'Fácil';
        elseif ($this->grauDificuldade == 'medio')
            $grau = 'Médio';
        elseif ($this->grauDificuldade == 'dificil')
            $grau = 'Difícil';

        return $grau;
    }

    /**
     * Set the value of grauDificuldade
     *
     * @return  self
     */
    public function setGrauDificuldade($grauDificuldade)
    {
        $this->grauDificuldade = $grauDificuldade;

        return $this;
    }

    /**
     * Get the value of pontuacaoQuestao
     */
    public function getPontuacaoQuestao()
    {
        return $this->pontuacaoQuestao;
    }

    /**
     * Set the value of pontuacaoQuestao
     *
     * @return  self
     */
    public function setPontuacaoQuestao($pontuacaoQuestao)
    {
        $this->pontuacaoQuestao = $pontuacaoQuestao;

        return $this;
    }

    /**
     * Get the value of imagemQuestao
     */
    public function getImagemQuestao()
    {
        return $this->imagemQuestao;
    }

    /**
     * Set the value of imagemQuestao
     *
     * @return  self
     */
    public function setImagemQuestao($imagemQuestao)
    {
        $this->imagemQuestao = $imagemQuestao;

        return $this;
    }

    public function setAlternativas($alternativas)
    {
        $this->alternativas = $alternativas;

        return $this;
    }

    public function getAlternativas()
    {
        return $this->alternativas;
    }

    

    /**
     * Get the value of descricaoAlternativa
     */ 
    public function getDescricaoAlternativa()
    {
        return $this->descricaoAlternativa;
    }

    /**
     * Set the value of descricaoAlternativa
     *
     * @return  self
     */ 
    public function setDescricaoAlternativa($descricaoAlternativa)
    {
        $this->descricaoAlternativa = $descricaoAlternativa;

        return $this;
    }

    /**
     * Get the value of alternativaCerta
     */ 
    public function getAlternativaCerta()
    {
        return $this->alternativaCerta;
    }

    /**
     * Set the value of alternativaCerta
     *
     * @return  self
     */ 
    public function setAlternativaCerta($alternativaCerta)
    {
        $this->alternativaCerta = $alternativaCerta;

        return $this;
    }

    /**
     * Get the value of idEspecie
     */ 
    public function getIdEspecie()
    {
        return $this->idEspecie;
    }

    /**
     * Set the value of idEspecie
     *
     * @return  self
     */ 
    public function setIdEspecie($idEspecie)
    {
        $this->idEspecie = $idEspecie;

        return $this;
    }

    /**
     * Get the value of idAlternativa
     */ 
    public function getIdAlternativa()
    {
        return $this->idAlternativa;
    }

    /**
     * Set the value of idAlternativa
     *
     * @return  self
     */ 
    public function setIdAlternativa($idAlternativa)
    {
        $this->idAlternativa = $idAlternativa;

        return $this;
    }

    /**
     * Get the value of idsArray
     */ 
    public function getIdsArray()
    {
        return $this->idsArray;
    }

    /**
     * Set the value of idsArray
     *
     * @return  self
     */ 
    public function setIdsArray($idsArray)
    {
        $this->idsArray = $idsArray;

        return $this;
    }

    /**
     * Get the value of idPlanta
     */ 
    public function getIdPlanta()
    {
        return $this->idPlanta;
    }

    /**
     * Set the value of idPlanta
     *
     * @return  self
     */ 
    public function setIdPlanta($idPlanta)
    {
        $this->idPlanta = $idPlanta;

        return $this;
    }

    /**
     * Get the value of idPlantaQuestao
     */ 
    public function getIdPlantaQuestao()
    {
        return $this->idPlantaQuestao;
    }

    /**
     * Set the value of idPlantaQuestao
     *
     * @return  self
     */ 
    public function setIdPlantaQuestao($idPlantaQuestao)
    {
        $this->idPlantaQuestao = $idPlantaQuestao;

        return $this;
    }
}