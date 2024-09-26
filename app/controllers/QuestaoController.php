<?php
#Classe de controller para planta

include_once(__DIR__."/../dao/QuestaoDAO.php");

class QuestaoController {

    private $questao;

    public function __construct() {
        $this->questao = new QuestaoDAO();
    }

    public function listar() {
        return $this->questao->list();
    }

    public function listarPorEspecie($idEspecie) {
        return $this->questao->listByEspecie($idEspecie);
    }

    public function listarPorPlanta($idPlanta) {
        return $this->questao->listByPlanta($idPlanta);
    }

    public function buscarPorId($idQuestao) {
        return $this->questao->findById($idQuestao);
    }

    public function buscarAlternativa($idQuestao) {
        return $this->questao->findAlternativas($idQuestao);
    }

    public function salvar($questao) {
        $this->questao->saveQuestao($questao);
    }

    public function atualizar($questao) {
        $this->questao->update($questao);
    }

    public function excluir($questao) {
        $this->questao->delete($questao);
    }
    

    // public function apagarImagem($idQuestao) {
    //     $this->questao->deleteImage($idQuestao);
    // }

    // public function filtrar(Array $caracteristicas, string $busca, array $ADMs, array $zonas) {
    //     return $this->questao->filter($caracteristicas, $busca, $ADMs, $zonas);        
    //}
}

?>



