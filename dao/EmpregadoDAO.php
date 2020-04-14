<?php
require_once 'conexao/Conexao.php';
class EmpregadoDAO {
        private $pdo;
        public function __construct() {
        $this->pdo = Conexao::getInstance();
        }
        
        public function cadastrarEmp(UsuarioDTO $usuarioDTO, $idCentro){
            try{
                $sql = "INSERT INTO usuario(usuario,senha,nome,email,telefone,dataCadastro,perfil_id) "
                        . "VALUES (?,?,?,?,?,?,?)";
                $stmt = $this->pdo->prepare($sql);
                $stmt->bindValue(1, $usuarioDTO->getUsuario());
                $stmt->bindValue(2, $usuarioDTO->getSenha());
                $stmt->bindValue(3, $usuarioDTO->getNome());
                $stmt->bindValue(4, $usuarioDTO->getEmail());
                $stmt->bindValue(5, $usuarioDTO->getTelefone());
                $stmt->bindValue(6, $usuarioDTO->getDataCadastro());
                $stmt->bindValue(7, $usuarioDTO->getPerfilId());
                $stmt->execute();
                $idUsuario = $this->pdo->lastInsertId();
                
                $sql = "INSERT INTO empregado(usuario_idUsuario,centroautomotivo_idCentro) "
                        . "VALUES (?,?)";
                 $stmt = $this->pdo->prepare($sql);
                 $stmt->bindValue(1, $idUsuario);
                 $stmt->bindValue(2, $idCentro);
                 return $stmt->execute();
            } catch (PDOException $exc) {
                echo $exc->getMessage();
            }
        }
        
        public function mostrarEmp($email){
        try{
            $sql = "SELECT u.*, e.*,c.* FROM usuario u INNER JOIN empregado e ON (u.idUsuario = e.usuario_idUsuario) INNER JOIN centroautomotivo c ON (c.idCentro = e.centroautomotivo_idCentro) WHERE u.usuario=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $email);
            $stmt->execute();
            $resp = $stmt->fetch(PDO::FETCH_ASSOC);
            return $resp;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }        
        }
        
        public function listarEmpregado($id){
            try{
                $sql = "SELECT usuario.idUsuario as idUsuario, usuario.usuario as usuario, usuario.senha as senha, usuario.nome as nome, usuario.email as emailUser, usuario.telefone as celular, usuario.dataCadastro as DataEntrada, usuario.perfil_id as perfil, e.*, c.* FROM usuario INNER JOIN empregado e ON (idUsuario = usuario_idUsuario) INNER JOIN centroautomotivo c ON (c.idCentro = e.centroautomotivo_idCentro) WHERE c.idCentro=?";
                $stmt = $this->pdo->prepare($sql);
                $stmt->bindValue(1, $id);
                $stmt->execute();
                $responsaveis = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $responsaveis;
            } catch (PDOException $exc) {
                echo $exc->getMessage();
            }
        }
        
        public function listarResponsavelById($id){
            try{
                $sql = "SELECT e.*,c.*,u.* FROM usuario u INNER JOIN empregado e ON (u.idUsuario = e.usuario_idUsuario) INNER JOIN centroautomotivo c ON (c.idCentro = e.centroautomotivo_idCentro) WHERE u.idUsuario=?";
                $stmt = $this->pdo->prepare($sql);
                $stmt->bindValue(1, $id);
                $stmt->execute();
                $responsavel = $stmt->fetch(PDO::FETCH_ASSOC);
                return $responsavel;
            } catch (PDOException $exc) {
                echo $exc->getMessage();
            }
        }
        
        public function AtualizarResponsavel(UsuarioDTO $usuarioDTO){
            try{
                $sql = "UPDATE usuario SET "
                        . "usuario=?, "
                        . "senha=?,"
                        . "nome=?, "
                        . "email=?, "
                        . "telefone=? "
                        . "WHERE idUsuario=? ";
                $stmt = $this->pdo->prepare($sql);
                $stmt->bindValue(1, $usuarioDTO->getUsuario());
                $stmt->bindValue(2, $usuarioDTO->getSenha());
                $stmt->bindValue(3, $usuarioDTO->getNome());
                $stmt->bindValue(4, $usuarioDTO->getEmail());
                $stmt->bindValue(5, $usuarioDTO->getTelefone());
                $stmt->bindValue(6, $usuarioDTO->getIdUsuario());
                return $stmt->execute();
            } catch (PDOException $exc) {
                echo $exc->getMessage();
            }
        }
        
        public function excluirResponsavel($idResp){
            try{

                $sql = "DELETE FROM empregado where usuario_idUsuario = ?";
                $stmt = $this->pdo->prepare($sql);
                $stmt->bindValue(1, $idResp);
                $stmt->execute();
                $sql = "DELETE FROM usuario WHERE idUsuario = ? ";
                $stmt = $this->pdo->prepare($sql);
                $stmt->bindValue(1, $idResp);
                return $stmt->execute();
            } catch (PDOException $exc) {
                echo $exc->getMessage();
            }
        }
        
}
