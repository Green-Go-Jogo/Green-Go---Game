<?php
##Classe DAO para o model de questao

include_once(__DIR__ . "/../connection/Connection.php");
include_once(__DIR__ . "/../models/QuestaoModel.php");
include_once(__DIR__ . "/../models/UsuarioModel.php");

class QuestaoDAO
{
    private const SQL_QUESTAO = "SELECT * FROM questao q";
    private const SQL_ALTERNATIVA = "SELECT * FROM alternativa a";

    private function mapQuestoes($resultSql)
    {
        $questoes = array();
        foreach ($resultSql as $reg) :

            $questao = new Questao();
            $questao->setIdQuestao($reg['idQuestao']);
            $questao->setDescricaoQuestao($reg['descricaoQuestao']);
            $questao->setGrauDificuldade($reg['grauDificuldade']);
            $questao->setImagemQuestao($reg['imagemQuestao']);
            $questao->setIdEspecie($reg['idEspecie']);
            $questao->setPontuacaoQuestao($reg['pontuacaoQuestao']);

            array_push($questoes, $questao);
        endforeach;

        return $questoes;
    }

    private function mapQuestoesPlanta($resultSql)
    {
        $questoes = array();
        foreach ($resultSql as $reg) :

            $questao = new Questao();
            $questao->setIdPlantaQuestao($reg['idPlantaQuestao']);
            $questao->setIdPlanta($reg['idPlanta']);
            $questao->setIdQuestao($reg['idQuestao']);
            $questao->setPontuacaoQuestao($reg['pontuacaoQuestao']);
            

            array_push($questoes, $questao);
        endforeach;

        return $questoes;
    }

    private function mapAlternativas($resultSql)
    {        
        $questoes = array();
        foreach ($resultSql as $reg) :

            $questao = new Questao();
            $questao->setDescricaoAlternativa($reg['descricaoAlternativa']);
            $questao->setAlternativaCerta($reg['alternativaCerta']);
            $questao->setIdAlternativa($reg['idAlternativa']);

            array_push($questoes, $questao);
        endforeach;

        return $questoes;
    }

    public function list()
    {
        $conn = conectar_db();

        $sql = QuestaoDAO::SQL_QUESTAO;
        $stm = $conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();

        $questoes = array();
        foreach ($result as $reg) :
            $questao = new Questao(
                $reg['idQuestao'],
                $reg['descricaoQuestao'],
                $reg['grauDificuldade'],
                $reg['imagemQuestao'],
                $reg['idEspecie']
            );
            array_push($questoes, $questao);
        endforeach;

        return $questoes;
    }

    public function listByEspecie($idEspecie)
    {
        $conn = conectar_db();

        $sql = QuestaoDAO::SQL_QUESTAO . " WHERE q.idEspecie = ?";
        $stm = $conn->prepare($sql);
        $stm->execute([$idEspecie]);
        $result = $stm->fetchAll();

        return $this->mapQuestoes($result);
    }

    public function listByPlanta($idPlanta)
    {
        $conn = conectar_db();

        $sql = "SELECT * FROM planta_questao" . " WHERE idPlanta = ?";
        $stm = $conn->prepare($sql);
        $stm->execute([$idPlanta]);
        $result = $stm->fetchAll();

        return $this->mapQuestoesPlanta($result);
    }

    public function findById($idQuestao)
    {
        $conn = conectar_db();

        $sql = questaoDAO::SQL_QUESTAO .
            " WHERE q.idQuestao = ?";

        $stmt = $conn->prepare($sql);
        $stmt->execute([$idQuestao]);
        $result = $stmt->fetchAll();

        //Criar o objeto stand
        $questoes = $this->mapQuestoes($result);

        if (count($questoes) == 1)
            return $questoes[0];
        elseif (count($questoes) == 0)
            return null;

        die("questaoDAO.findById - Erro: mais de uma questão" .
            " encontrado para o ID " . $idQuestao);
    }

    public function findByIdPlantaAndIdQuestao($idPlanta, $idQuestao)
    {
        $conn = conectar_db();

        $sql = "SELECT * FROM planta_questao" . " WHERE idPlanta = ? AND idQuestao = ?";
        $stm = $conn->prepare($sql);
        $stm->execute([$idPlanta, $idQuestao]);
        $result = $stm->fetchAll();

        $questoes = $this->mapQuestoesPlanta($result);

        if (count($questoes) == 1)
            return $questoes[0];
        elseif (count($questoes) == 0)
            return null;

        die("questaoDAO.findById - Erro: mais de uma questão" .
            " encontrado para o id questao " . $idQuestao. " e id planta ". $idPlanta);
    }

    public function findAlternativas($idQuestao)
    {
        $conn = conectar_db();

        $sql = questaoDAO::SQL_ALTERNATIVA .
            " JOIN questao q ON q.idQuestao = a.idQuestao WHERE q.idQuestao = ?";

        $stmt = $conn->prepare($sql);
        $stmt->execute([$idQuestao]);
        $result = $stmt->fetchAll();

        //Criar o objeto stand
        return $this->mapAlternativas($result);
    }

    // public function listByPartida($idPartida) {
    //     $conn = conectar_db();

    //     $sql = ZonaDAO::SQL_ZONA_PARTIDA. 
    //             " WHERE pz.idPartida = ?";

    //     $stmt = $conn->prepare($sql);
    //     $stmt->execute([$idPartida]);
    //     $result = $stmt->fetchAll();



    //     //Criar o objeto Partida
    //     $zonas = $this->mapZonas($result);

    //     return $zonas; 
    // }


    public function saveQuestao(Questao $questao)
    {
        $conn = conectar_db();

        $sql = "INSERT INTO questao (descricaoQuestao, grauDificuldade, imagemQuestao, idEspecie)" .
            " VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$questao->getDescricaoQuestao(), $questao->getGrauDificuldade(), $questao->getImagemQuestao(), $questao->getIdEspecie()]);

        $idQuestao = $conn->lastInsertId();
        $questao->setIdQuestao($conn->lastInsertId());
        $this->saveAlternativa($questao, $idQuestao);
    }

    public function saveAlternativa(Questao $questao, $idQuestao)
    {
        $conn = conectar_db();

        for ($i = 1; $i < 5; $i++) {
            $alternativas = $questao->getAlternativas();
            if ($i == $questao->getAlternativaCerta()) {
                $trueOrFalse = 1;
            } else {
                $trueOrFalse = 0;
            }
            $questao->setDescricaoAlternativa($alternativas[$i]);

            $sql = "INSERT INTO alternativa (descricaoAlternativa, alternativaCerta, idQuestao) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$questao->getDescricaoAlternativa(), $trueOrFalse, $idQuestao]);
        }
    }

    public function update(Questao $questao)
    {
        $conn = conectar_db();

        $sql = "UPDATE questao SET descricaoQuestao = ?, grauDificuldade = ?, imagemQuestao = ? WHERE idQuestao = ?";
        $stmtUpdate = $conn->prepare($sql);
        $stmtUpdate->execute([
            $questao->getDescricaoQuestao(), $questao->getGrauDificuldade(), $questao->getImagemQuestao(),
            $questao->getIdQuestao()
        ]);

        $this->updateAlternativa($questao);
    }

    public function updateAlternativa(Questao $questao) {
        $conn = conectar_db();

            for ($i = 1; $i < 5; $i++) {
                $alternativas = $questao->getAlternativas();
                
                $idsArray = $questao->getIdsArray();
                if ($i == $questao->getAlternativaCerta()) {
                    $trueOrFalse = 1;
                } else {
                    $trueOrFalse = 0;
                }
                $questao->setDescricaoAlternativa($alternativas[$i]);
                $questao->setIdAlternativa($idsArray[$i]);

        $sql = "UPDATE alternativa SET descricaoAlternativa = ?, alternativaCerta = ? WHERE idAlternativa = ?";
        $stmtUpdate = $conn->prepare($sql);
        $stmtUpdate->execute([
            $questao->getDescricaoAlternativa(), $trueOrFalse, $questao->getIdAlternativa()
        ]);
        }
    }

    public function checkQuestion($idQuestao, $idAlternativa) {
        $conn = conectar_db();

        $sql = questaoDAO::SQL_ALTERNATIVA .
            " JOIN questao q ON q.idQuestao = a.idQuestao WHERE q.idQuestao = ? AND a.idAlternativa = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            $idQuestao, $idAlternativa
        ]);

        $result = $stmt->fetchAll();
        if ($result) {
            // Itera sobre cada linha do resultado
            foreach ($result as $row) {
                // Acesse o campo 'alternativaCerta' de cada linha
                if($row['alternativaCerta'] == 1) {
                    return true;
                }
                else {
                    return false;
                }
            }
        } else {
            echo "Nenhum resultado encontrado.";
        }
    }

    public function delete(Questao $questao)
    {
        $conn = conectar_db();

        $sql = "DELETE FROM questao WHERE idQuestao = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$questao->getIdQuestao()]);
    }
}
