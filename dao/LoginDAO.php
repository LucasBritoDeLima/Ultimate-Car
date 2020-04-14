<?php
require_once 'conexao/Conexao.php';
class LoginDAO {
    private $pdo;
    
    public function __construct() {
        $this->pdo = Conexao::getInstance();
    }
    
    public function login($email,$senha){
    try {
        $situacao = 1;
        $perfil = "Cliente";
        $sql = "SELECT u.usuario,p.perfil,u.idUsuario,c.* FROM usuario u INNER JOIN perfil p ON (u.perfil_id = p.idPerfil) INNER JOIN cliente c ON (c.usuario_idUsuario = u.idUsuario) WHERE u.usuario=? AND u.senha=? AND p.perfil=? AND u.situacao=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1, $email);
        $stmt->bindValue(2, $senha);
        $stmt->bindValue(3, $perfil);
        $stmt->bindValue(4, $situacao);
        $stmt->execute();
        $login = $stmt->fetch(PDO::FETCH_ASSOC);
        return $login;
            } catch (PDOException $exc) {
        echo $exc->getMessage();
        }
    }
    
    public function loginCentroAutomotivo($email,$senha){
        try{
            $situacao = 1;
            $perfil = "Centro Automotivo";
            $sql = "SELECT u.usuario,p.perfil,u.idUsuario,c.idCentro,e.idEmpregado,e.usuario_idUsuario,e.centroautomotivo_idCentro FROM usuario u INNER JOIN perfil p ON (u.perfil_id = p.idPerfil) INNER JOIN empregado e ON (e.usuario_idUsuario = u.idUsuario) INNER JOIN centroautomotivo c ON(c.idCentro = e.centroautomotivo_idCentro) WHERE u.usuario=? AND u.senha=? AND p.perfil=? AND u.situacao=? ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $email);
            $stmt->bindValue(2, $senha);
            $stmt->bindValue(3, $perfil);
            $stmt->bindValue(4, $situacao);
            $stmt->execute();
            $login = $stmt->fetch(PDO::FETCH_ASSOC);
            return $login;
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function loginAdm($email, $senha){
        try{
            $situacao = 1;
            $sql = "SELECT u.*, p.* FROM usuario u INNER JOIN perfil p ON (u.perfil_id = p.idPerfil) WHERE u.usuario=? AND u.senha=? AND u.situacao=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $email);
            $stmt->bindValue(2, $senha);
            $stmt->bindValue(3, $situacao);
            $stmt->execute();
            $login = $stmt->fetch(PDO::FETCH_ASSOC);
            return $login;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
}
