<?php
require_once 'conexao/Conexao.php';
class CentroAutomotivoDAO {
    private $pdo;
    
    public function __construct() {
        $this->pdo = Conexao::getInstance();
    }
    
 
    public function cadastrarCentroAutomotivo(EmpregadoDTO $empregadoDTO, CentroAutomotivoDTO $centroAutomotivoDTO){
        try{
            $sql = "INSERT INTO usuario(usuario, senha, nome, email, telefone, dataCadastro, perfil_id) "
                . "VALUES(?,?,?,?,?,?,?) ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $empregadoDTO->getUsuario());
            $stmt->bindValue(2, $empregadoDTO->getSenha());
            $stmt->bindValue(3, $empregadoDTO->getNome());
            $stmt->bindValue(4, $empregadoDTO->getEmail());
            $stmt->bindValue(5, $empregadoDTO->getTelefone());
            $stmt->bindValue(6, $empregadoDTO->getDataCadastro());
            $stmt->bindValue(7, $empregadoDTO->getPerfil_id());
            $stmt->execute();
            $idUsuario = $this->pdo->lastInsertId();
            $sql = "INSERT INTO centroautomotivo(nomeFantasia, razaoSocial, cnpj, ie, logradouro, cep, numero, bairro, cidade, estado, servico, email, telefone, dataCadastro) "
                    . "VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $centroAutomotivoDTO->getNomeFantasia());
            $stmt->bindValue(2, $centroAutomotivoDTO->getRazaoSocial());
            $stmt->bindValue(3, $centroAutomotivoDTO->getCnpj());
            $stmt->bindValue(4, $centroAutomotivoDTO->getIe());
            $stmt->bindValue(5, $centroAutomotivoDTO->getLogradouro());
            $stmt->bindValue(6, $centroAutomotivoDTO->getCep());
            $stmt->bindValue(7, $centroAutomotivoDTO->getNumero());
            $stmt->bindValue(8, $centroAutomotivoDTO->getBairro());
            $stmt->bindValue(9, $centroAutomotivoDTO->getCidade());
            $stmt->bindValue(10, $centroAutomotivoDTO->getEstado());
            $stmt->bindValue(11, $centroAutomotivoDTO->getServicos());
            $stmt->bindValue(12, $centroAutomotivoDTO->getEmail());
            $stmt->bindValue(13, $centroAutomotivoDTO->getTelefone());
            $stmt->bindValue(14, $centroAutomotivoDTO->getDataentrada());
            $stmt->execute();
            $idCentroAutomotivo = $this->pdo->lastInsertId();
            #####
            $sql = "INSERT INTO empregado(usuario_idUsuario, centroautomotivo_idCentro) "
                    . "VALUES (?,?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $idUsuario);
            $stmt->bindValue(2, $idCentroAutomotivo);
            return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function listarCentroById($idCentroAutomotivo){
        try{
            $sql = "SELECT * FROM centroautomotivo WHERE idCentro = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $idCentroAutomotivo);
            $stmt->execute();
            $userCentro = $stmt->fetch(PDO::FETCH_ASSOC);
            return $userCentro;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function atualizar(CentroAutomotivoDTO $centroAutomotivoDTO){
        try{
            $sql = "UPDATE centroautomotivo SET "
                    . "nomeFantasia=?, "
                    . "razaoSocial=?, "
                    . "cnpj=?, "
                    . "ie=?, "
                    . "logradouro=?, "
                    . "cep=?, "
                    . "numero=?, "
                    . "bairro=?, "
                    . "cidade=?, "
                    . "estado=?, "
                    . "servico=?, "
                    . "email=?, "
                    . "telefone=? "
                    . "WHERE idCentro=? ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $centroAutomotivoDTO->getNomeFantasia());
            $stmt->bindValue(2, $centroAutomotivoDTO->getRazaoSocial());
            $stmt->bindValue(3, $centroAutomotivoDTO->getCnpj());
            $stmt->bindValue(4, $centroAutomotivoDTO->getIe());
            $stmt->bindValue(5, $centroAutomotivoDTO->getLogradouro());
            $stmt->bindValue(6, $centroAutomotivoDTO->getCep());
            $stmt->bindValue(7, $centroAutomotivoDTO->getNumero());
            $stmt->bindValue(8, $centroAutomotivoDTO->getBairro());
            $stmt->bindValue(9, $centroAutomotivoDTO->getCidade());
            $stmt->bindValue(10, $centroAutomotivoDTO->getEstado());
            $stmt->bindValue(11, $centroAutomotivoDTO->getServicos());
            $stmt->bindValue(12, $centroAutomotivoDTO->getEmail());
            $stmt->bindValue(13, $centroAutomotivoDTO->getTelefone());
            $stmt->bindValue(14, $centroAutomotivoDTO->getIdCentro());
            return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function excluirCentroAutomotivo($idCentroAutomotivo){
        try{
            $sql = "DELETE usuario FROM usuario INNER JOIN empregado ON (empregado.usuario_idUsuario = usuario.idUsuario) WHERE centroautomotivo_idCentro = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $idCentroAutomotivo);
            $stmt->execute();
            $sql = "DELETE FROM centroautomotivo WHERE idCentro=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $idCentroAutomotivo);
            return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage(); 
        }
    }
    
    public function inativarCentroAutomotivo($sit, $idCentroAutomotivo){
        try{
            $sql = "UPDATE usuario u INNER JOIN empregado e ON e.usuario_idUsuario = u.idUsuario SET u.situacao=? WHERE e.centroautomotivo_idCentro = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $sit);
            $stmt->bindValue(2, $idCentroAutomotivo);
            return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
        public function ativarCentroAutomotivo($sit, $idCentroAutomotivo){
        try{
            $sql = "UPDATE usuario u INNER JOIN empregado e ON e.usuario_idUsuario = u.idUsuario SET u.situacao=? WHERE e.centroautomotivo_idCentro = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $sit);
            $stmt->bindValue(2, $idCentroAutomotivo);
            return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
        public function addFoto(CentroAutomotivoDTO $centroAutomotivoDTO){
        try{
            $sql = "INSERT INTO centroautomotivo(foto) "."VALUES (?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $centroAutomotivoDTO->getFoto());
            return $stmt->execute();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function atualizarFoto(CentroAutomotivoDTO $centroAutomotivoDTO){
        try{
            $sql = "UPDATE `centroautomotivo` SET "
                    . "foto=? "
                    . "WHERE idCentro=? ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $centroAutomotivoDTO->getFoto());
            $stmt->bindValue(2, $centroAutomotivoDTO->getIdCentro());
            return $stmt->execute();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function listarAllCentros(){
        try{
            $sql = "SELECT c.* , u.*, e.* FROM centroautomotivo c INNER JOIN empregado e ON (c.idCentro = e.centroautomotivo_idCentro) INNER JOIN usuario u ON (u.idUsuario = e.usuario_idUsuario) GROUP BY e.centroautomotivo_idCentro";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $centro = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $centro;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function obterCentro(){
        try{
            $sql = "SELECT * FROM `centroautomotivo`";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $centro = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $centro;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
}
