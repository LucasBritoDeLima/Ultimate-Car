<?php
require_once 'conexao/Conexao.php';
class AnuncioDAO {
    private $pdo;
    
    public function __construct() {
        $this->pdo = Conexao::getInstance();
    }
    
    public function criarAnuncio(AnuncioDTO $anuncioDTO){
        try{
            $sql = "INSERT INTO anuncio(titulo, categoria, preco, descricao, fotoUm, fotoDois, fotoTres, dataCadastro, usuario_idUsuario) "
                    . "VALUES (?,?,?,?,?,?,?,?,?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $anuncioDTO->getTitulo());
            $stmt->bindValue(2, $anuncioDTO->getCategoria());
            $stmt->bindValue(3, $anuncioDTO->getPreco());
            $stmt->bindValue(4, $anuncioDTO->getDescricao());
            $stmt->bindValue(5, $anuncioDTO->getFotoUm());
            $stmt->bindValue(6, $anuncioDTO->getFotoDois());
            $stmt->bindValue(7, $anuncioDTO->getFotoTres());
            $stmt->bindValue(8, $anuncioDTO->getDataCadastro());
            $stmt->bindValue(9, $anuncioDTO->getUsuarioId());
            return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function atualizarAnuncio(AnuncioDTO $anuncioDTO){
        try{
            $sql = "UPDATE anuncio SET "
                    . "titulo=?, "
                    . "categoria=?, "
                    . "preco=?, "
                    . "descricao=?, "
                    . "fotoUm=?, "
                    . "fotoDois=?, "
                    . "fotoTres=? "
                    . "WHERE idAnuncio=? ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $anuncioDTO->getTitulo());
            $stmt->bindValue(2, $anuncioDTO->getCategoria());
            $stmt->bindValue(3, $anuncioDTO->getPreco());
            $stmt->bindValue(4, $anuncioDTO->getDescricao());
            $stmt->bindValue(5, $anuncioDTO->getFotoUm());
            $stmt->bindValue(6, $anuncioDTO->getFotoDois());
            $stmt->bindValue(7, $anuncioDTO->getFotoTres());
            $stmt->bindValue(8, $anuncioDTO->getIdAnuncio());
            return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function listarAnuncio($idUsuario) {
        try{
            $sql = "SELECT * FROM anuncio WHERE usuario_idUsuario= ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $idUsuario);
            $stmt->execute();
            $anuncios = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $anuncios;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function listarAnuncioCentroAutomotivo($idCentro){
        try{
            $sql = "SELECT a.*,u.*,e.*,ca.* FROM anuncio a INNER JOIN usuario u ON (a.usuario_idUsuario = u.idUsuario) INNER JOIN empregado e ON (e.usuario_idUsuario = u.idUsuario) INNER JOIN centroautomotivo ca ON (ca.idCentro = e.centroautomotivo_idCentro) WHERE e.centroautomotivo_idCentro=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $idCentro);
            $stmt->execute();
            $ads = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $ads;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    public function listarAnuncioById($idPeca) {
        try{
            $sql = "SELECT * FROM anuncio WHERE idAnuncio = ? ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $idPeca);
            $stmt->execute();
            $ads = $stmt->fetch(PDO::FETCH_ASSOC);
            return $ads;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function excluirAnuncio($idPeca) {
        try{
            $sql = "DELETE FROM anuncio WHERE idAnuncio = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $idPeca);
            return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function atualizarAF(AnuncioDTO $anuncioDTO){
        try{
            $sql = "UPDATE anuncio SET "
                    . "titulo=?, "
                    . "categoria=?, "
                    . "preco=?, "
                    . "descricao=?, "
                    . "fotoUm=? "
                    . "WHERE idAnuncio=? ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $anuncioDTO->getTitulo());
            $stmt->bindValue(2, $anuncioDTO->getCategoria());
            $stmt->bindValue(3, $anuncioDTO->getPreco());
            $stmt->bindValue(4, $anuncioDTO->getDescricao());
            $stmt->bindValue(5, $anuncioDTO->getFotoUm());
            $stmt->bindValue(6, $anuncioDTO->getIdAnuncio());
            return $stmt->execute(); 
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function atualizarAFF(AnuncioDTO $anuncioDTO){
        try{
            $sql = "UPDATE anuncio SET "
                    . "titulo=?, "
                    . "categoria=?, "
                    . "preco=?, "
                    . "descricao=?, "
                    . "fotoDois=? "
                    . "WHERE idAnuncio=? ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $anuncioDTO->getTitulo());
            $stmt->bindValue(2, $anuncioDTO->getCategoria());
            $stmt->bindValue(3, $anuncioDTO->getPreco());
            $stmt->bindValue(4, $anuncioDTO->getDescricao());
            $stmt->bindValue(5, $anuncioDTO->getFotoDois());
            $stmt->bindValue(6, $anuncioDTO->getIdAnuncio());
            return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function atualizarAFFF(AnuncioDTO $anuncioDTO){
        try{
            $sql = "UPDATE anuncio SET "
                    . "titulo=?, "
                    . "categoria=?, "
                    . "preco=?, "
                    . "descricao=?, "
                    . "fotoTres=? "
                    . "WHERE idAnuncio=? ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $anuncioDTO->getTitulo());
            $stmt->bindValue(2, $anuncioDTO->getCategoria());
            $stmt->bindValue(3, $anuncioDTO->getPreco());
            $stmt->bindValue(4, $anuncioDTO->getDescricao());
            $stmt->bindValue(5, $anuncioDTO->getFotoTres());
            $stmt->bindValue(6, $anuncioDTO->getIdAnuncio());
            return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function atualizarAFoto1Foto2(AnuncioDTO $anuncioDTO){
        try{
            $sql = "UPDATE anuncio SET "
                    . "titulo=?, "
                    . "categoria=?, "
                    . "preco=?, "
                    . "descricao=?, "
                    . "fotoUm=?, "
                    . "fotoDois=? "
                    . "WHERE idAnuncio=? ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $anuncioDTO->getTitulo());
            $stmt->bindValue(2, $anuncioDTO->getCategoria());
            $stmt->bindValue(3, $anuncioDTO->getPreco());
            $stmt->bindValue(4, $anuncioDTO->getDescricao());
            $stmt->bindValue(5, $anuncioDTO->getFotoUm());
            $stmt->bindValue(6, $anuncioDTO->getFotoDois());
            $stmt->bindValue(7, $anuncioDTO->getIdAnuncio());
            return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function atualizarAFoto1Foto3(AnuncioDTO $anuncioDTO){
        try{
            $sql = "UPDATE anuncio SET "
                    . "titulo=?, "
                    . "categoria=?, "
                    . "preco=?, "
                    . "descricao=?, "
                    . "fotoUm=?, "
                    . "fotoTres=? "
                    . "WHERE idAnuncio=? ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $anuncioDTO->getTitulo());
            $stmt->bindValue(2, $anuncioDTO->getCategoria());
            $stmt->bindValue(3, $anuncioDTO->getPreco());
            $stmt->bindValue(4, $anuncioDTO->getDescricao());
            $stmt->bindValue(5, $anuncioDTO->getFotoUm());
            $stmt->bindValue(6, $anuncioDTO->getFotoTres());
            $stmt->bindValue(7, $anuncioDTO->getIdAnuncio());
            return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function atualizarAFoto2Foto3(AnuncioDTO $anuncioDTO){
        try{
            $sql = "UPDATE anuncio SET "
                    . "titulo=?, "
                    . "categoria=?, "
                    . "preco=?, "
                    . "descricao=?, "
                    . "fotoDois=?, "
                    . "fotoTres=? "
                    . "WHERE idAnuncio=? ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $anuncioDTO->getTitulo());
            $stmt->bindValue(2, $anuncioDTO->getCategoria());
            $stmt->bindValue(3, $anuncioDTO->getPreco());
            $stmt->bindValue(4, $anuncioDTO->getDescricao());
            $stmt->bindValue(5, $anuncioDTO->getFotoDois());
            $stmt->bindValue(6, $anuncioDTO->getFotoTres());
            $stmt->bindValue(7, $anuncioDTO->getIdAnuncio());
            return $stmt->execute(); 
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function atualizarAnuncioNoFoto(AnuncioDTO $anuncioDTO){
        try{
            $sql = "UPDATE anuncio SET "
                    . "titulo=?, "
                    . "categoria=?, "
                    . "preco=?, "
                    . "descricao=? "
                    . "WHERE idAnuncio=? ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $anuncioDTO->getTitulo());
            $stmt->bindValue(2, $anuncioDTO->getCategoria());
            $stmt->bindValue(3, $anuncioDTO->getPreco());
            $stmt->bindValue(4, $anuncioDTO->getDescricao());
            $stmt->bindValue(5, $anuncioDTO->getIdAnuncio());
            return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function listarAnuncioId($idUser){
        try{
            $sql = "SELECT * FROM anuncio WHERE usuario_idUsuario=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $idUser);
            $stmt->execute();
            $anuncios = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $anuncios;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
}
