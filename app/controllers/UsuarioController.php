<?php
#Classe de controller para especie

include_once(__DIR__ . "/../dao/UsuarioDAO.php");

class UsuarioController
{

    private $usuarioDAO;


    public function __construct()
    {
        $this->usuarioDAO = new UsuarioDAO();
    }

    public function listar()
    {
        return $this->usuarioDAO->list();
    }

    public function buscarPorId($idUsuario)
    {
        return $this->usuarioDAO->findById($idUsuario);
    }

    public function manterSessaoADM($nomeADM)
    {
        $this->usuarioDAO->manterSessaoADM($nomeADM);
    }

    public function buscarUsuarios($idEquipe, $idPartida)
    {
        return $this->usuarioDAO->findUsers($idEquipe, $idPartida);
    }

    public function sair()
    {
        $this->usuarioDAO->logout();
    }

    public function salvar($usuario)
    {
        $this->usuarioDAO->save($usuario);
    }

    public function atualizar($usuario)
    {
        $this->usuarioDAO->update($usuario);
    }

    public function atualizarAcesso($usuario)
    {
        $this->usuarioDAO->updateAcess($usuario);
    }

    public function excluir($idUsuario)
    {
        $this->usuarioDAO->delete($idUsuario);
        return true;
    }
    public function buscarUsuarioPorTipo($tipo)
    {
        return $this->usuarioDAO->findUserByType($tipo);
    }
    public function checarSenhaPorIdUsuario($idUsuario, $senha) {
        return $this->usuarioDAO->checkSenhaByIdUser($idUsuario, $senha);
    }

    public function alterarSenhaPorId($idUsuario, $senhaNovaHash) {
        $this->usuarioDAO->updateSenhaById($idUsuario, $senhaNovaHash);
        return true;
    }

    public function alterarSenhaPorEmail($email, $senhaNovaHash) {
        $this->usuarioDAO->updateSenhaByEmail($email, $senhaNovaHash);
        return true;
    }

    public function gerarSenhaCodigoRecuperacao($email){
        return $this->usuarioDAO->generateSenhaCodigo($email);
    }

    public function checarCodigo($email, $codigo){
        return $this->usuarioDAO->checkCodigo($email, $codigo);
    }

    public function checarEmailExiste($email){
        return $this->usuarioDAO->checkEmailExists($email);
    }
}
