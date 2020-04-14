<?php
require_once 'conexao/Conexao.php';
class AdministradorDAO {
    private $pdo;
    
    public function __construct() {
        $this->pdo = Conexao::getInstance();
    }
    
    public function cadastrarAdministrador(AdministradorDTO $administradorDTO){
        try{
            $sql = "INSERT INTO `usuario`(usuario, senha, nome, email, telefone,dataCadastro, perfil_id) "
                    . "VALUES(?,?,?,?,?,?,?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $administradorDTO->getUsuario());
            $stmt->bindValue(2, $administradorDTO->getSenha());
            $stmt->bindValue(3, $administradorDTO->getNome());
            $stmt->bindValue(4, $administradorDTO->getEmail());
            $stmt->bindValue(5, $administradorDTO->getTelefone());
            $stmt->bindValue(6, $administradorDTO->getDataCadastro());
            $stmt->bindValue(7, $administradorDTO->getPerfilId());
            return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function listarAdministradorById($perfil,$idAdministrador){
        try{
            $sql = "SELECT * FROM usuario WHERE perfil_id=? AND idUsuario=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $perfil);
            $stmt->bindValue(2, $idAdministrador);
            $stmt->execute();
            $administrador = $stmt->fetch(PDO::FETCH_ASSOC);
            return $administrador;
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }
    
    
    public function atualizar(AdministradorDTO $administradorDTO){
        try{
            $sql = "UPDATE usuario SET "
                    . "usuario=?, "
                    . "senha=?, "
                    . "nome=?, "
                    . "email=?, "
                    . "telefone=? "
                    . "WHERE idUsuario=? ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $administradorDTO->getUsuario());
            $stmt->bindValue(2, $administradorDTO->getSenha());
            $stmt->bindValue(3, $administradorDTO->getNome());
            $stmt->bindValue(4, $administradorDTO->getEmail());
            $stmt->bindValue(5, $administradorDTO->getTelefone());
            $stmt->bindValue(6, $administradorDTO->getIdUsuario());
            return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
        public function apagarUsuario($idUsuario){
        try{
            $sql = "DELETE FROM usuario WHERE idUsuario=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $idUsuario);
            return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function listarAllAdm($idAdm){
        try{
            $sql = "SELECT * FROM usuario WHERE perfil_id=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $idAdm);
            $stmt->execute();
            $adm = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $adm;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
}
