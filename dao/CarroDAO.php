<?php

require_once 'conexao/Conexao.php';

Class CarroDAO {

    private $pdo;

    public function __construct() {
        $this->pdo = Conexao::getInstance();
    }

    public function listarMontadora() {
        try {
            $sql = "SELECT idMontadora,montadora FROM montadora";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $arrMontadora = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $arrMontadora;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function listarMontadoraById($idMontadora){
        try{
            $sql = "SELECT * FROM montadora WHERE idMontadora=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $idMontadora);
            $stmt->execute();
            $montadoras = $stmt->fetch(PDO::FETCH_ASSOC);
            return $montadoras;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function listarAllMontadoras() {
        try {
            $sql = "SELECT * FROM montadora ORDER BY montadora ASC";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $arrMontadora = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $arrMontadora;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function findModeloByMontadora($montadora) {
        try {
            $sql = "SELECT * FROM modelo WHERE montadora_id=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $montadora);
            $stmt->execute();
            $modelos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $modelos;
        } catch (PDOException $exc) {
            $exc->getMessage();
        }
    }

    public function findCarroByModelo($modelo) {
        try {
            $sql = "SELECT * FROM carro WHERE modelo_id = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $modelo);
            $stmt->execute();
            $carros = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $carros;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function findAnoByCarro($carro) {
        try {
            $sql = "SELECT * FROM carro WHERE nomeCarro=? GROUP BY ANO";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $carro);
            $stmt->execute();
            $carros = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $carros;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function findMotorByAno($ano) {
        try {
            $sql = "SELECT * FROM carro WHERE ano=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $ano);
            $stmt->execute();
            $motores = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $motores;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function obterInfo($nome, $ano, $motor) {
        try {
            $sql = "SELECT * FROM carro WHERE nomeCarro=? and ano=? and motor=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $nome);
            $stmt->bindValue(2, $ano);
            $stmt->bindValue(3, $motor);
            $stmt->execute();
            $info = $stmt->fetch(PDO::FETCH_ASSOC);
            return $info;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function obterFiltro($carro) {
        try {
            $sql = "SELECT f.*, cf.* FROM filtro f INNER JOIN carroefiltro cf ON (cf.filtro_idFiltro = f.idFiltro) WHERE cf.carro_idCarro=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $carro);
            $stmt->execute();
            $filtros = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $filtros;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function obterOleo($carro) {
        try {
            $sql = "SELECT o.*, co.* FROM oleo o INNER JOIN carroeoleo co ON (co.oleo_idOleo = o.idOleo) WHERE co.carro_idCarro=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $carro);
            $stmt->execute();
            $oleos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $oleos;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function newMontadora($montadora) {
        try {
            $sql = "INSERT INTO montadora(montadora) VALUES (?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $montadora);
            return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function newModelo($montadora, $modelo) {
        try {
            $sql = "INSERT INTO modelo(modelo,montadora_id) VALUES (?,?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $modelo);
            $stmt->bindValue(2, $montadora);
            return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function newCarro(CarroDTO $carroDTO) {
        try {
            $sql = "INSERT INTO carro(nomeCarro,ano,motor,combustivel,saeR,saeA,acea,api,tipoOleo,capacidade,foto,modelo_id) "
                    . "VALUES (?,?,?,?,?,?,?,?,?,?,?,?) ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $carroDTO->getNomeCarro());
            $stmt->bindValue(2, $carroDTO->getAno());
            $stmt->bindValue(3, $carroDTO->getMotor());
            $stmt->bindValue(4, $carroDTO->getCombustivel());
            $stmt->bindValue(5, $carroDTO->getSaeR());
            $stmt->bindValue(6, $carroDTO->getSaeA());
            $stmt->bindValue(7, $carroDTO->getAcea());
            $stmt->bindValue(8, $carroDTO->getApi());
            $stmt->bindValue(9, $carroDTO->getTipoOleo());
            $stmt->bindValue(10, $carroDTO->getCapacidade());
            $stmt->bindValue(11, $carroDTO->getFoto());
            $stmt->bindValue(12, $carroDTO->getModelo_id());
            return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function atualizarCarro(CarroDTO $carroDTO) {
        try {
            $sql = "UPDATE carro SET "
                    . "nomeCarro=?, "
                    . "ano=?, "
                    . "motor=?, "
                    . "combustivel=?, "
                    . "saeR=?, "
                    . "saeA=?, "
                    . "acea=?, "
                    . "api=?, "
                    . "tipoOleo=?, "
                    . "capacidade=?, "
                    . "foto=? "
                    . "WHERE idCarro=? ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $carroDTO->getNomeCarro());
            $stmt->bindValue(2, $carroDTO->getAno());
            $stmt->bindValue(3, $carroDTO->getMotor());
            $stmt->bindValue(4, $carroDTO->getCombustivel());
            $stmt->bindValue(5, $carroDTO->getSaeR());
            $stmt->bindValue(6, $carroDTO->getSaeA());
            $stmt->bindValue(7, $carroDTO->getAcea());
            $stmt->bindValue(8, $carroDTO->getApi());
            $stmt->bindValue(9, $carroDTO->getTipoOleo());
            $stmt->bindValue(10, $carroDTO->getCapacidade());
            $stmt->bindValue(11, $carroDTO->getFoto());
            $stmt->bindValue(12, $carroDTO->getIdCarro());
            return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function atualizarCarroF(CarroDTO $carroDTO) {
        try {
            $sql = "UPDATE carro SET "
                    . "nomeCarro=?, "
                    . "ano=?, "
                    . "motor=?, "
                    . "combustivel=?, "
                    . "saeR=?, "
                    . "saeA=?, "
                    . "acea=?, "
                    . "api=?, "
                    . "tipoOleo=?, "
                    . "capacidade=? "
                    . "WHERE idCarro=? ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $carroDTO->getNomeCarro());
            $stmt->bindValue(2, $carroDTO->getAno());
            $stmt->bindValue(3, $carroDTO->getMotor());
            $stmt->bindValue(4, $carroDTO->getCombustivel());
            $stmt->bindValue(5, $carroDTO->getSaeR());
            $stmt->bindValue(6, $carroDTO->getSaeA());
            $stmt->bindValue(7, $carroDTO->getAcea());
            $stmt->bindValue(8, $carroDTO->getApi());
            $stmt->bindValue(9, $carroDTO->getTipoOleo());
            $stmt->bindValue(10, $carroDTO->getCapacidade());
            $stmt->bindValue(11, $carroDTO->getIdCarro());
            return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function updateM($montadora,$idMontadora){
        try{
            $sql = "UPDATE montadora SET "
                    . "montadora=? "
                    . "WHERE idMontadora=? ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $montadora);
            $stmt->bindValue(2, $idMontadora);
            return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function updateModel($modelo, $idModelo){
        try{
            $sql = "UPDATE modelo SET "
                    . "modelo=? "
                    . "WHERE idModelo=? ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $modelo);
            $stmt->bindValue(2, $idModelo);
            return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function listarAllOleo(){
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
    
    public function listarAllFiltro(){
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
    
    public function findOleoByMarca($marca){
        try{
            $sql = "SELECT * FROM oleo WHERE marcaOleo=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $marca);
            $stmt->execute();
            $oleos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $oleos;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function findTipoByMarca($marca){
        try{
            $sql = "SELECT * FROM filtro WHERE marcaFiltro=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $marca);
            $stmt->execute();
            $filtros = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $filtros;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function findCodByTipoByMarca($marca,$tipo){
        try{
            $sql = "SELECT * FROM filtro WHERE marcaFiltro=? AND tipoFiltro=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $marca);
            $stmt->bindValue(2, $tipo);
            $stmt->execute();
            $filtros = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $filtros;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function findFiltroFull($marca,$tipo,$cod){
        try{
            $sql = "SELECT * FROM filtro WHERE marcaFiltro=? AND tipoFiltro=? AND cod=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $marca);
            $stmt->bindValue(2, $tipo);
            $stmt->bindValue(3, $cod);
            $stmt->execute();
            $filtros = $stmt->fetch(PDO::FETCH_ASSOC);
            return $filtros;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    public function findSaeByOleo($nomeOleo){
        try{
            $sql = "SELECT * FROM oleo WHERE nomeOleo=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $nomeOleo);
            $stmt->execute();
            $oleos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $oleos;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function retornaOleo($marca, $oleo, $sae) {
        try {
            $sql = "SELECT * FROM oleo WHERE marcaOleo=? and nomeOleo=? and sae=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $marca);
            $stmt->bindValue(2, $oleo);
            $stmt->bindValue(3, $sae);
            $stmt->execute();
            $info = $stmt->fetch(PDO::FETCH_ASSOC);
            return $info;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function carroEOleo($oleo,$carro){
        try{
            $sql = "INSERT INTO `carroeoleo`(oleo_idOleo, carro_idCarro) "
                    . "VALUES(?,?) ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $oleo);
            $stmt->bindValue(2, $carro);
            return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function carroEFiltro($filtro,$carro){
        try{
            $sql = "INSERT INTO `carroefiltro`(filtro_idFiltro, carro_idCarro) "
                    . "VALUES(?,?) ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $filtro);
            $stmt->bindValue(2, $carro);
            return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }


}
