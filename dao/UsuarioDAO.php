<?php
require_once 'conexao/Conexao.php';
class UsuarioDAO {
    private $pdo;
    
    public function __construct() {
        $this->pdo = Conexao::getInstance();
    }
    public function cadastrarUsuario(UsuarioDTO $usuarioDTO){
        try{
            $sql = "INSERT INTO dadousuario(nome, logradouro, numero, cep, bairro, estado, cidade, telefone, email, senha, fk_id_perfil) ".
                    "VALUES (?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $usuarioDTO->getNome());
            $stmt->bindValue(2, $usuarioDTO->getLogradouro());
            $stmt->bindValue(3, $usuarioDTO->getNumero());
            $stmt->bindValue(4, $usuarioDTO->getCep());
            $stmt->bindValue(5, $usuarioDTO->getBairro());
            $stmt->bindValue(6, $usuarioDTO->getEstado());
            $stmt->bindValue(7, $usuarioDTO->getCidade());
            $stmt->bindValue(8, $usuarioDTO->getTelefone());
            $stmt->bindValue(9, $usuarioDTO->getEmail());
            $stmt->bindValue(10, $usuarioDTO->getSenha());
            $stmt->bindValue(11, $usuarioDTO->getIdperfil());
            return $stmt->execute();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }
    public function listarUsuarioById($idUsuario){
        try{
            $sql = "SELECT u.*,c.* FROM cliente c INNER JOIN usuario u ON (u.idUsuario = c.usuario_idUsuario) WHERE u.idUsuario = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $idUsuario);
            $stmt->execute();
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            return $usuario;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    public function atualizar(UsuarioDTO $usuarioDTO){
        try {
            $sql = "UPDATE dadousuario SET "
                    . "nome=?,"
                    . "logradouro=?, "
                    . "numero=?, "
                    . "cep=?, "
                    . "bairro=?, "
                    . "estado=?, "
                    . "cidade=?, "
                    . "email=?, "
                    . "telefone=?, "
                    . "senha=? "
                    . "WHERE id=? ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $usuarioDTO->getNome());
            $stmt->bindValue(2, $usuarioDTO->getLogradouro());
            $stmt->bindValue(3, $usuarioDTO->getNumero());
            $stmt->bindValue(4, $usuarioDTO->getCep());
            $stmt->bindValue(5, $usuarioDTO->getBairro());
            $stmt->bindValue(6, $usuarioDTO->getEstado());
            $stmt->bindValue(7, $usuarioDTO->getCidade());
            $stmt->bindValue(8, $usuarioDTO->getEmail());
            $stmt->bindValue(9, $usuarioDTO->getTelefone());
            $stmt->bindValue(10, $usuarioDTO->getSenha());
            $stmt->bindValue(11, $usuarioDTO->getId());
            return $stmt->execute();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }
    public function excluir($idUsuario){
        try{
            $sql = "DELETE FROM dadousuario WHERE id = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $idUsuario);
            return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function addFoto(UsuarioDTO $usuarioDTO){
        try {
            $sql = "INSERT INTO dadousuario(foto) "."VALUES (?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $usuarioDTO->getFoto());
            return $stmt->execute();
        } catch (PDOException $exc){
            echo $exc->getMessage();
        }
    }
    
    public function atualizarFoto(UsuarioDTO $usuarioDTO){
        try{
            $sql = "UPDATE dadousuario SET "
                    . "foto=? "
                    . "WHERE id=? ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $usuarioDTO->getFoto());
            $stmt->bindValue(2, $usuarioDTO->getId());
            return $stmt->execute();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function selectAllUsuarios(){
        try{
            $sql = "SELECT * FROM usuario WHERE perfil_id=2 or perfil_id=3";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $usuarios;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function pUser(){
        try{
            $limite = 2;
            $sql = "SELECT * FROM `usuario`";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $total_resultados = $stmt->rowCount();
            $total_paginas = ceil($total_resultados/$limite);
            //-----------------------------------------------
                if(!isset($_GET['page'])){
                    $page = 1;
                } else {
                    $page = $_GET['page'];
                }
            //-----------------------------------------------
            $limite_inicial = ($page-1) * $limite;
            $exibir = "SELECT * FROM `usuario` ORDER BY idUsuario DESC LIMIT {$limite_inicial},{$limite}";
            $st = $this->pdo->prepare($exibir);
            $st->execute();
            $users = $st->fetchAll(PDO::FETCH_ASSOC);
            return $users;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

}
