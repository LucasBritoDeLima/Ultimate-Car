<?php
require_once 'conexao/Conexao.php';
class ComentarioDAO {
    private $pdo;
    
    public function __construct() {
        $this->pdo = Conexao::getInstance();
    }
    
    public function salvar(ComentarioDTO $comentarioDTO){
        try{
            $sql = "INSERT INTO comentario(nota,comentario,cliente_id,centroAutomotivo) "
                    . "VALUES (?,?,?,?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $comentarioDTO->getNota());
            $stmt->bindValue(2, $comentarioDTO->getComentario());
            $stmt->bindValue(3, $comentarioDTO->getCliente_id());
            $stmt->bindValue(4, $comentarioDTO->getCentroAutomotivo());
            return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function listarComentariosCentro($idCentro){
        try{
            $sql = "SELECT cm.*,cl.*,ca.*,u.* FROM comentario cm INNER JOIN cliente cl ON (cl.idCliente = cm.cliente_id) INNER JOIN centroautomotivo ca ON (cm.centroAutomotivo = ca.idCentro) INNER JOIN usuario u ON (u.idUsuario = cl.usuario_idUsuario) WHERE cm.centroAutomotivo=? ORDER BY cm.idComentario DESC";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $idCentro);
            $stmt->execute();
            $comentarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $comentarios;     
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function apagarComentario($idComment,$idUsuario){
        try{
            $sql = "DELETE FROM comentario WHERE idComentario= ? AND cliente_id= ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $idComment);
            $stmt->bindValue(2, $idUsuario);
            return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function mediaCentro($idCentro){
        try{
            $sql = "SELECT AVG(nota) FROM comentario where centroAutomotivo= ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $idCentro);
            $stmt->execute();
            $notas = $stmt->fetch(PDO::FETCH_ASSOC);
            return $notas;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function selecionarComCentro($idCentro){
        try{
            $sql = "SELECT cm.*,ca.*,cl.*,u.* FROM comentario cm INNER JOIN centroautomotivo ca ON (cm.centroAutomotivo = ca.idCentro) INNER JOIN cliente cl ON (cl.idCliente = cm.cliente_id) INNER JOIN usuario u ON (u.idUsuario = cl.usuario_idUsuario) WHERE cm.centroAutomotivo=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $idCentro);
            $stmt->execute();
            $comentCentro = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $comentCentro;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
        public function selecionarComentarioCentroU($idCentro,$idUser,$idComment){
        try{
            $sql = "SELECT cm.*, u.* from comentario cm inner join usuario u on (cm.cliente_id = u.idUsuario) WHERE centroAutomotivo=? and cliente_id=? and idComentario = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $idCentro);
            $stmt->bindValue(2, $idUser);
            $stmt->bindValue(3, $idComment);
            $stmt->execute();
            $comentCentro = $stmt->fetch(PDO::FETCH_ASSOC);
            return $comentCentro;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function atualizar(ComentarioDTO $comentarioDTO,$idCentro,$idUser,$idComment){
        try{
            $sql = "UPDATE comentario SET "
                    . "nota=?, "
                    . "comentario=? "
                    . "WHERE centroAutomotivo=? and cliente_id=? and idComentario=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $comentarioDTO->getNota());
            $stmt->bindValue(2, $comentarioDTO->getComentario());
            $stmt->bindValue(3, $idCentro);
            $stmt->bindValue(4, $idUser);
            $stmt->bindValue(5, $idComment);
            return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
}
