<?php
require_once 'conexao/Conexao.php';
class FiltroDAO {
    private $pdo;
    public function __construct() {
        $this->pdo = Conexao::getInstance();
    }
    
    public function cadastrarFiltro(FiltroDTO $filtroDTO){
        try{
            $sql = "INSERT INTO filtro(marcaFiltro,tipoFiltro,cod,foto,motorFiltro) "
                    . "VALUES (?,?,?,?,?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $filtroDTO->getMarcaFiltro());
            $stmt->bindValue(2, $filtroDTO->getTipoFiltro());
            $stmt->bindValue(3, $filtroDTO->getCod());
            $stmt->bindValue(4, $filtroDTO->getFoto());
            $stmt->bindValue(5, $filtroDTO->getMotorFiltro());
            return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function listarFiltroById($idFiltro){
        try{
            $sql = "SELECT * FROM filtro WHERE idFiltro=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $idFiltro);
            $stmt->execute();
            $filtro = $stmt->fetch(PDO::FETCH_ASSOC);
            return $filtro;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function listarAllFiltros(){
        try{
            $sql = "SELECT * FROM filtro";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $filtros = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $filtros;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function pesquisarFiltros($tudo){
        try{
            $sql = "SELECT * FROM filtro WHERE  cod LIKE ?";
            $stmt = $this->pdo->prepare($sql);            
            $stmt->bindValue(1, "%".$tudo."%",PDO::PARAM_STR);
            $stmt->execute();
            $filtros = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $filtros;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function excluirFiltro($idFiltro){
        try{
           $sql = "DELETE FROM filtro WHERE idFiltro=?";
           $stmt = $this->pdo->prepare($sql);
           $stmt->bindValue(1, $idFiltro);
           return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function atualizar(FiltroDTO $filtroDTO){
        try{
            $sql = "UPDATE filtro SET "
                    . "marcaFiltro=?, "
                    . "tipoFiltro=?, "
                    . "cod=?, "
                    . "foto=?, "
                    . "motorFiltro=? "
                    . "WHERE idFiltro = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $filtroDTO->getMarcaFiltro());
            $stmt->bindValue(2, $filtroDTO->getTipoFiltro());
            $stmt->bindValue(3, $filtroDTO->getCod());
            $stmt->bindValue(4, $filtroDTO->getFoto());
            $stmt->bindValue(5, $filtroDTO->getMotorFiltro());
            $stmt->bindValue(6, $filtroDTO->getIdFiltro());
            return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
        public function atualizarF(FiltroDTO $filtroDTO){
        try{
            $sql = "UPDATE filtro SET "
                    . "marcaFiltro=?, "
                    . "tipoFiltro=?, "
                    . "cod=?, "
                    . "motorFiltro=? "
                    . "WHERE idFiltro = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $filtroDTO->getMarcaFiltro());
            $stmt->bindValue(2, $filtroDTO->getTipoFiltro());
            $stmt->bindValue(3, $filtroDTO->getCod());
            $stmt->bindValue(4, $filtroDTO->getMotorFiltro());
            $stmt->bindValue(5, $filtroDTO->getIdFiltro());
            return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
}
