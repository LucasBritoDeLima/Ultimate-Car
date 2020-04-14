<?php

require_once 'conexao/Conexao.php';

class ClienteDAO {

    private $pdo;

    public function __construct() {
        $this->pdo = Conexao::getInstance();
    }

    public function cadastrarCliente(UsuarioDTO $usuarioDTO, ClienteDTO $clienteDTO) {
        try {
            //Primeiro Passamos o perfil do usuario
            $sql = "INSERT INTO usuario(usuario, senha, nome, email, telefone, dataCadastro, perfil_id) "
                    . "VALUES(?,?,?,?,?,?,?) ";
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
            //Agora os dados do usuario que no caso se chama cliente
            $sql = "INSERT INTO cliente(logradouro, cep, numero, bairro, cidade, estado, usuario_idUsuario) "
                    . "VALUES(?,?,?,?,?,?,?) ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $clienteDTO->getLogradouro());
            $stmt->bindValue(2, $clienteDTO->getCep());
            $stmt->bindValue(3, $clienteDTO->getNumero());
            $stmt->bindValue(4, $clienteDTO->getBairro());
            $stmt->bindValue(5, $clienteDTO->getCidade());
            $stmt->bindValue(6, $clienteDTO->getEstado());
            $stmt->bindValue(7, $idUsuario);
            return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function atualizar(UsuarioDTO $usuarioDTO, ClienteDTO $clienteDTO) {
        try {
            $sql = "UPDATE usuario SET "
                    . "usuario=?, "
                    . "senha=?, "
                    . "nome=?, "
                    . "email=?, "
                    . "telefone=? "
                    . "WHERE idUsuario = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $usuarioDTO->getUsuario());
            $stmt->bindValue(2, $usuarioDTO->getSenha());
            $stmt->bindValue(3, $usuarioDTO->getNome());
            $stmt->bindValue(4, $usuarioDTO->getEmail());
            $stmt->bindValue(5, $usuarioDTO->getTelefone());
            $stmt->bindValue(6, $usuarioDTO->getIdUsuario());
            $stmt->execute();
            $sql = "UPDATE cliente SET "
                    . "logradouro=?, "
                    . "cep=?, "
                    . "numero=?, "
                    . "bairro=?, "
                    . "cidade=?, "
                    . "estado=? "
                    . "WHERE usuario_idUsuario = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $clienteDTO->getLogradouro());
            $stmt->bindValue(2, $clienteDTO->getCep());
            $stmt->bindValue(3, $clienteDTO->getNumero());
            $stmt->bindValue(4, $clienteDTO->getBairro());
            $stmt->bindValue(5, $clienteDTO->getCidade());
            $stmt->bindValue(6, $clienteDTO->getEstado());
            $stmt->bindValue(7, $clienteDTO->getUsuario_idUsuario());
            return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function mudarFoto(ClienteDTO $clienteDTO) {
        try {
            $sql = "UPDATE cliente SET "
                    . "foto=?"
                    . "WHERE idCliente = ? ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $clienteDTO->getFoto());
            $stmt->bindValue(2, $clienteDTO->getIdCliente());
            return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function apagarUsuario($idUsuario, $idCliente) {
        try {
            $sql = "DELETE comentario FROM comentario INNER JOIN cliente ON (comentario.cliente_id = cliente.idCliente) WHERE cliente_id=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $idCliente);
            $stmt->execute();
            $sql = "DELETE anuncio FROM anuncio INNER JOIN usuario on (anuncio.usuario_idUsuario = usuario.idUsuario) WHERE anuncio.usuario_idUsuario=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $idUsuario);
            $stmt->execute();
            $sql = "DELETE cliente FROM cliente INNER JOIN usuario on (cliente.usuario_idUsuario = usuario.idUsuario) WHERE usuario_idUsuario=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $idUsuario);
            $stmt->execute();
            $sql = "DELETE usuario FROM usuario WHERE idUsuario=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $idUsuario);
            return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function inativarUsuario($sit, $idUsuario) {
        try {
            $sql = "UPDATE usuario SET "
                    . "situacao=?"
                    . "WHERE idUsuario = ? ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $sit);
            $stmt->bindValue(2, $idUsuario);
            return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function ativarUsuario($sit, $idUsuario) {
        try {
            $sql = "UPDATE usuario SET "
                    . "situacao=?"
                    . "WHERE idUsuario = ? ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $sit);
            $stmt->bindValue(2, $idUsuario);
            return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function listarAllClientes() {
        try {
            $sql = "SELECT cl.*,u.* FROM cliente cl INNER JOIN usuario u ON (u.idUsuario = cl.usuario_idUsuario)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $cliente = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $cliente;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

}
