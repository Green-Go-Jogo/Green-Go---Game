<?php 

Class Partida {

    private $IdPartida;
    private $IdADM;
    private $DataInicio;
    private $DataFim;
    private $LimiteJogadores;
    private $IdPartidaUsuario;
    private $IdPartidaEquipe;
    private $IdUsuario;
    private $IdEquipe;
    private $Zonas;
    private $Equipes;
    private $plantasLidas;
    private $QuestoesRespondidas;
    private $Senha;
    private $TempoPartida;
    private $NomePartida;
    private $StatusPartida;
    private $PontuacaoEquipe;
    private $PontuacaoPlantas;
    private $PontuacaoQuestoes;


    public function __toString() {
        return $this->DataInicio;
		return $this->DataFim;
    }
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
     * Get the value of Senha
     */ 
    public function getSenha()
    {
        return $this->Senha;
    }

    /**
     * Set the value of Senha
     *
     * @return  self
     */ 
    public function setSenha($Senha)
    {
        $this->Senha = $Senha;

        return $this;
    }

    /**
     * Get the value of TempoPartida
     */ 
    public function getTempoPartida()
    {
        return $this->TempoPartida;
    }

    /**
     * Set the value of TempoPartida
     *
     * @return  self
     */ 
    public function setTempoPartida($TempoPartida)
    {
        $this->TempoPartida = $TempoPartida;

        return $this;
    }

    /**
     * Get the value of NomePartida
     */ 
    public function getNomePartida()
    {
        return $this->NomePartida;
    }

    /**
     * Set the value of NomePartida
     *
     * @return  self
     */ 
    public function setNomePartida($NomePartida)
    {
        $this->NomePartida = $NomePartida;

        return $this;
    }

    /**
     * Get the value of StatusPartida
     */ 
    public function getStatusPartida()
    {
        return $this->StatusPartida;
    }

    /**
     * Set the value of StatusPartida
     *
     * @return  self
     */ 
    public function setStatusPartida($StatusPartida)
    {
        $this->StatusPartida = $StatusPartida;

        return $this;
    }

    /**
     * Get the value of IdADM
     */ 
    public function getIdADM()
    {
        return $this->IdADM;
    }

    /**
     * Set the value of IdADM
     *
     * @return  self
     */ 
    public function setIdADM($IdADM)
    {
        $this->IdADM = $IdADM;

        return $this;
    }

    /**
     * Get the value of IdPartidaUsuario
     */ 
    public function getIdPartidaUsuario()
    {
        return $this->IdPartidaUsuario;
    }

    /**
     * Set the value of IdPartidaUsuario
     *
     * @return  self
     */ 
    public function setIdPartidaUsuario($IdPartidaUsuario)
    {
        $this->IdPartidaUsuario = $IdPartidaUsuario;

        return $this;
    }

    /**
     * Get the value of IdPartidaEquipe
     */ 
    public function getIdPartidaEquipe()
    {
        return $this->IdPartidaEquipe;
    }

    /**
     * Set the value of IdPartidaEquipe
     *
     * @return  self
     */ 
    public function setIdPartidaEquipe($IdPartidaEquipe)
    {
        $this->IdPartidaEquipe = $IdPartidaEquipe;

        return $this;
    }

    /**
     * Get the value of IdUsuario
     */ 
    public function getIdUsuario()
    {
        return $this->IdUsuario;
    }

    /**
     * Set the value of IdUsuario
     *
     * @return  self
     */ 
    public function setIdUsuario($IdUsuario)
    {
        $this->IdUsuario = $IdUsuario;

        return $this;
    }

    function issetDataFim($valor) {
        // Verifique o valor aqui e retorne true ou false com base nos critérios
        if ($valor) {
            return true;
        } else {
            return false;
        }
    }

    function issetDataInicio($valor) {
        // Verifique o valor aqui e retorne true ou false com base nos critérios
        if ($valor) {
            return true;
        } else {
            return false;
        }
    }


    /**
     * Get the value of IdEquipe
     */ 
    public function getIdEquipe()
    {
        return $this->IdEquipe;
    }

    /**
     * Set the value of IdEquipe
     *
     * @return  self
     */ 
    public function setIdEquipe($IdEquipe)
    {
        $this->IdEquipe = $IdEquipe;

        return $this;
    }
    
    public function calcularTempoRestante()
    {
        $dataAtual = new DateTime('now');
        $dataInicio = new DateTime($this->DataInicio);

        $intervalo = $dataInicio->diff($dataAtual);
        $tempoPassadoMinutos = $intervalo->format('%i'); // Tempo passado em minutos
        $tempoPassadoSegundos = $intervalo->format('%s'); // Tempo passado em segundos

        $tempoRestanteMinutos = max(0, $this->TempoPartida - $tempoPassadoMinutos);
        $tempoRestanteSegundos = max(0, 60 - $tempoPassadoSegundos);

        return [
            'minutos' => $tempoRestanteMinutos,
            'segundos' => $tempoRestanteSegundos
        ];
    }



    /**
     * Get the value of plantasLidas
     */ 
    public function getPlantasLidas()
    {
        return $this->plantasLidas;
    }

    /**
     * Set the value of plantasLidas
     *
     * @return  self
     */ 
    public function setPlantasLidas($plantasLidas)
    {
        $this->plantasLidas = $plantasLidas;

        return $this;
    }

    /**
     * Get the value of PontuacaoPlantas
     */ 
    public function getPontuacaoPlantas()
    {
        return $this->PontuacaoPlantas;
    }

    /**
     * Set the value of PontuacaoPlantas
     *
     * @return  self
     */ 
    public function setPontuacaoPlantas($PontuacaoPlantas)
    {
        $this->PontuacaoPlantas = $PontuacaoPlantas;

        return $this;
    }

    /**
     * Get the value of PontuacaoQuestoes
     */ 
    public function getPontuacaoQuestoes()
    {
        return $this->PontuacaoQuestoes;
    }

    /**
     * Set the value of PontuacaoQuestoes
     *
     * @return  self
     */ 
    public function setPontuacaoQuestoes($PontuacaoQuestoes)
    {
        $this->PontuacaoQuestoes = $PontuacaoQuestoes;

        return $this;
    }

    /**
     * Get the value of QuestoesRespondidas
     */ 
    public function getQuestoesRespondidas()
    {
        return $this->QuestoesRespondidas;
    }

    /**
     * Set the value of QuestoesRespondidas
     *
     * @return  self
     */ 
    public function setQuestoesRespondidas($QuestoesRespondidas)
    {
        $this->QuestoesRespondidas = $QuestoesRespondidas;

        return $this;
    }
}