<?php

include_once(__DIR__ . "/../connection/Connection.php");
include_once(__DIR__ . "/../models/EquipeModel.php");

class EquipeDAO
{

    private const SQL_EQUIPE = "SELECT * FROM equipe e WHERE e.ativo = 1";
    private const SQL_EQUIPE_PARTIDA = "SELECT pe.pontuacaoEquipe,e.*" .
        " FROM partida_equipe pe" .
        " JOIN equipe e ON pe.idEquipe = e.idEquipe";


    private function mapEquipes($resultSql)
    {
        $equipes = array();
        foreach ($resultSql as $reg):

            $equipe = new Equipe();
            $equipe->setIdEquipe($reg['idEquipe']);
            $equipe->setNomeEquipe($reg['nomeEquipe']);
            $equipe->setCorEquipe($reg['cor']);
            $equipe->setIconeEquipe($reg['icone']);
            if (isset($reg['pontuacaoEquipe'])) {
                $equipe->setPontuacaoEquipe($reg['pontuacaoEquipe']);
            }

            array_push($equipes, $equipe);
        endforeach;

        return $equipes;
    }

    public function list()
    {
        $conn = conectar_db();

        $sql = EquipeDAO::SQL_EQUIPE .
            " order BY e.nomeEquipe";
        $stm = $conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();

        return $this->mapEquipes($result);
    }

    public function findById($idEquipe)
    {
        $conn = conectar_db();

        $sql = EquipeDAO::SQL_EQUIPE .
            " AND e.idEquipe = ?";

        $stmt = $conn->prepare($sql);
        $stmt->execute([$idEquipe]);
        $result = $stmt->fetchAll();

        //Criar o objeto Especie
        $equipes = $this->mapEquipes($result);

        if (count($equipes) == 1)
            return $equipes[0];
        elseif (count($equipes) == 0)
            return null;

        die("EspecieDAO.findById - Erro: mais de uma equipe" .
            " encontrado para o ID " . $idEquipe);
    }

    public function listByPartida($idPartida)
    {
        $conn = conectar_db();

        $sql = EquipeDAO::SQL_EQUIPE_PARTIDA .
            " WHERE pe.idPartida = ?";

        $stmt = $conn->prepare($sql);
        $stmt->execute([$idPartida]);
        $result = $stmt->fetchAll();



        //Criar o objeto Partida
        $equipes = $this->mapEquipes($result);

        return $equipes;
    }



    public function save(Equipe $equipe)
    {
        $conn = conectar_db();

        $sql = "INSERT INTO equipe (nomeEquipe, cor, icone)" .
            " VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$equipe->getNomeEquipe(), $equipe->getCorEquipe(), $equipe->getIconeEquipe()]);
    }

    public function update(Equipe $equipe)
    {
        $conn = conectar_db();

        $sql = "UPDATE equipe SET nomeEquipe = ?, cor = ?, icone = ? WHERE idEquipe = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$equipe->getNomeEquipe(), $equipe->getCorEquipe(), $equipe->getIconeEquipe(), $equipe->getIdEquipe()]);
    }


    public function delete(Equipe $equipe)
    {
        $conn = conectar_db();


        $sql = "UPDATE equipe e SET e.ativo = 0 WHERE e.idEquipe = ?";

        $stmt = $conn->prepare($sql);
        $stmt->execute([$equipe->getIdEquipe()]);
    }
}
