<?php
class Especie implements JsonSerializable {
	private $IdEspecie;
	private $ImagemEspecie;
	private $Descricao;
	private $NomePopular;
	private $NomeCientifico;
	private $Panc;
	private $Ornamental;
	private $Endemica;
	private $Nativa;
	private $Frutifera;
	private $Toxidade;
	private $Exotica;
	private $Raridade;
	private $Medicinal;
	private $Comestivel;
	private $Usuario;
	private $caracteristicas = array();

	#[\ReturnTypeWillChange]
	public function jsonSerialize() {
        return
        [
            'IdEspecie' => $this->IdEspecie,
            'ImagemEspecie' => $this->ImagemEspecie,
            'Descricao' => $this->Descricao,
            'NomePopular' => $this->NomePopular,
			'NomeCientifico' => $this->NomeCientifico,

            'Frutifera' => $this->Frutifera,
            'Toxidade' => $this->Toxidade,
            'Exotica' => $this->Exotica,
			'Raridade' => $this->Raridade,
            'Medicinal' => $this->Medicinal,
            'Comestivel' => $this->Comestivel,
			'Endemica' => $this->Endemica,
            'Nativa' => $this->Nativa,
            'PANC' => $this->Panc,
			'Ornamental' => $this->Ornamental,
			'caracteristicas' => $this->caracteristicas
        ];
    }

	//Construtor da classe
    public function __construct($id="",$nomep="", $nomec="")
    {
        $this->IdEspecie = $id;
        $this->NomePopular = $nomep;
        $this->NomeCientifico = $nomec;
    }

	public function __toString() {
        return $this->NomePopular;
		return $this->NomeCientifico;
    }

	public function getIdEspecie()
	{
		return $this->IdEspecie;
	}

	
	public function setIdEspecie($IdEspecie)
	{
		$this->IdEspecie = $IdEspecie;

		return $this;
	}


	public function getImagemEspecie()
	{
		return $this->ImagemEspecie;
	}


	public function setImagemEspecie($ImagemEspecie)
	{
		$this->ImagemEspecie = $ImagemEspecie;

		return $this;
	}


	public function getDescricao()
	{
		return $this->Descricao;
	}

	public function setDescricao($Descricao)
	{
		$this->Descricao = $Descricao;

		return $this;
	}

	/**
	 * Get the value of NomePopular
	 */ 
	public function getNomePopular()
	{
		return $this->NomePopular;
	}

	/**
	 * Set the value of NomePopular
	 *
	 * @return  self
	 */ 
	public function setNomePopular($NomePopular)
	{
		$this->NomePopular = $NomePopular;

		return $this;
	}

	/**
	 * Get the value of NomeCientifico
	 */ 
	public function getNomeCientifico()
	{
		return $this->NomeCientifico;
	}

	/**
	 * Set the value of NomeCientifico
	 *
	 * @return  self
	 */ 
	public function setNomeCientifico($NomeCientifico)
	{
		$this->NomeCientifico = $NomeCientifico;

		return $this;
	}

	/**
	 * Get the value of Frutifera
	 */ 
	public function getFrutifera()
	{
		return $this->Frutifera;
	}

	/**
	 * Set the value of Frutifera
	 *
	 * @return  self
	 */ 
	public function setFrutifera($Frutifera)
	{
		$this->Frutifera = $Frutifera;
		$this->setCaracteristicas("Frutifera");

		return $this;
	}

	/**
	 * Get the value of Toxidade
	 */ 
	public function getToxidade()
	{
		return $this->Toxidade;
	}

	/**
	 * Set the value of Toxidade
	 *
	 * @return  self
	 */ 
	public function setToxidade($Toxidade)
	{
		$this->Toxidade = $Toxidade;
		$this->setCaracteristicas("Toxicidade");
		return $this;
	}

	/**
	 * Get the value of Exotica
	 */ 
	public function getExotica()
	{
		return $this->Exotica;
	}

	/**
	 * Set the value of Exotica
	 *
	 * @return  self
	 */ 
	public function setExotica($Exotica)
	{
		$this->Exotica = $Exotica;
		$this->setCaracteristicas("Exotica");

		return $this;
	}

	/**
	 * Get the value of Raridade
	 */ 
	public function getRaridade()
	{
		return $this->Raridade;
	}

	/**
	 * Set the value of Raridade
	 *
	 * @return  self
	 */ 
	public function setRaridade($Raridade)
	{
		$this->Raridade = $Raridade;
		$this->setCaracteristicas("Raridade");

		return $this;
	}

	/**
	 * Get the value of Medicinal
	 */ 
	public function getMedicinal()
	{
		return $this->Medicinal;
	}

	/**
	 * Set the value of Medicinal
	 *
	 * @return  self
	 */ 
	public function setMedicinal($Medicinal)
	{
		$this->Medicinal = $Medicinal;
		$this->setCaracteristicas("Medicinal");

		return $this;
	}

	/**
	 * Get the value of Comestivel
	 */ 
	public function getComestivel()
	{
		return $this->Comestivel;
	}

	/**
	 * Set the value of Comestivel
	 *
	 * @return  self
	 */ 
	public function setComestivel($Comestivel)
	{
		$this->Comestivel = $Comestivel;
		$this->setCaracteristicas("Comestivel");
		return $this;
	}

	/**
	 * Set the value of caracteristicas
	 *
	 * @return  self
	 */ 
	public function getCaracteristicas()
	{
		return $this->caracteristicas;
	}

	public function setCaracteristicas($Caracteristica)
	{
		$this->caracteristicas[] = $Caracteristica;
		return $this->caracteristicas;
	}

	/**
	 * Get the value of Panc
	 */ 
	public function getPanc()
	{
		return $this->Panc;
	}

	/**
	 * Set the value of Panc
	 *
	 * @return  self
	 */ 
	public function setPanc($Panc)
	{
		$this->Panc = $Panc;
		$this->setCaracteristicas("PANC");
		return $this;
	}

	/**
	 * Get the value of Ornamental
	 */ 
	public function getOrnamental()
	{
		return $this->Ornamental;
	}

	/**
	 * Set the value of Ornamental
	 *
	 * @return  self
	 */ 
	public function setOrnamental($Ornamental)
	{
		$this->Ornamental = $Ornamental;
		$this->setCaracteristicas("Ornamental");
		return $this;
	}

	/**
	 * Get the value of Endemica
	 */ 
	public function getEndemica()
	{
		return $this->Endemica;
	}

	/**
	 * Set the value of Endemica
	 *
	 * @return  self
	 */ 
	public function setEndemica($Endemica)
	{
		$this->Endemica = $Endemica;
		$this->setCaracteristicas("Endemica");
		return $this;
	}

	/**
	 * Get the value of Nativa
	 */ 
	public function getNativa()
	{
		return $this->Nativa;
	}

	/**
	 * Set the value of Nativa
	 *
	 * @return  self
	 */ 
	public function setNativa($Nativa)
	{
		$this->Nativa = $Nativa;
		$this->setCaracteristicas("Nativa");
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