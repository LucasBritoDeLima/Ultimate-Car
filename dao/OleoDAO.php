<?php
require_once 'conexao/Conexao.php';
class OleoDAO {

    private $pdo;

    public function __construct() {
        $this->pdo = Conexao::getInstance();
    }

    public function addOleo(OleoDTO $oleoDTO) {
        try {
            $sql = "INSERT INTO oleo(marcaOleo,nomeOleo,apiOleo,sae,acea,foto,tipoOleo) "
                    . "VALUES (?,?,?,?,?,?,?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $oleoDTO->getMarcaOleo());
            $stmt->bindValue(2, $oleoDTO->getNomeOleo());
            $stmt->bindValue(3, $oleoDTO->getApiOleo());
            $stmt->bindValue(4, $oleoDTO->getSae());
            $stmt->bindValue(5, $oleoDTO->getAcea());
            $stmt->bindValue(6, $oleoDTO->getFoto());
            $stmt->bindValue(7, $oleoDTO->getTipoOleo());
            return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function listarOleoById($idOleo) {
        try {
            $sql = "SELECT * FROM oleo WHERE idOleo=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $idOleo);
            $stmt->execute();
            $oleo = $stmt->fetch(PDO::FETCH_ASSOC);
            return $oleo;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function listarAllOleos(){
        try{
            $sql = "SELECT * FROM oleo";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $oleos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $oleos;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function pesquisarOleos($oleo){
        try{
            $sql = "SELECT * FROM oleo WHERE marcaoleo LIKE ?";
            $stmt = $this->pdo->prepare($sql);            
            $stmt->bindValue(1, "%".$oleo."%",PDO::PARAM_STR);
            $stmt->execute();
            $oleos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $oleos;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function excluirOleo($idOleo){
        try{
           $sql = "DELETE FROM oleo WHERE idOleo=?";
           $stmt = $this->pdo->prepare($sql);
           $stmt->bindValue(1, $idOleo);
           return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function atualizar(OleoDTO $oleoDTO){
        try{
            $sql = "UPDATE oleo SET "
                    . "marcaOleo=?, "
                    . "nomeOleo=?, "
                    . "apiOleo=?, "
                    . "sae=?, "
                    . "acea=?, "
                    . "foto=?, "
                    . "tipoOleo=? "
                    . "WHERE idOleo = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $oleoDTO->getMarcaOleo());
            $stmt->bindValue(2, $oleoDTO->getNomeOleo());
            $stmt->bindValue(3, $oleoDTO->getApiOleo());
            $stmt->bindValue(4, $oleoDTO->getSae());
            $stmt->bindValue(5, $oleoDTO->getAcea());
            $stmt->bindValue(6, $oleoDTO->getFoto());
            $stmt->bindValue(7, $oleoDTO->getTipoOleo());
            $stmt->bindValue(8, $oleoDTO->getIdOleo());
            return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
        public function atualizarF(OleoDTO $oleoDTO){
        try{
            $sql = "UPDATE oleo SET "
                    . "marcaOleo=?, "
                    . "nomeOleo=?, "
                    . "apiOleo=?, "
                    . "sae=?, "
                    . "acea=?, "
                    . "tipoOleo=? "
                    . "WHERE idOleo = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $oleoDTO->getMarcaOleo());
            $stmt->bindValue(2, $oleoDTO->getNomeOleo());
            $stmt->bindValue(3, $oleoDTO->getApiOleo());
            $stmt->bindValue(4, $oleoDTO->getSae());
            $stmt->bindValue(5, $oleoDTO->getAcea());
            $stmt->bindValue(6, $oleoDTO->getTipoOleo());
            $stmt->bindValue(7, $oleoDTO->getIdOleo());
            return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

}
