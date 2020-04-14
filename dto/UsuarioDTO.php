<?php
class UsuarioDTO {
    private $idUsuario;
    private $usuario;
    private $senha;
    private $nome;
    private $email;
    private $telefone;
    private $dataCadastro;
    private $perfilId;
    
    public function getIdUsuario() {
        return $this->idUsuario;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function getDataCadastro() {
        return $this->dataCadastro;
    }

    public function getPerfilId() {
        return $this->perfilId;
    }

    public function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    public function setDataCadastro($dataCadastro) {
        $this->dataCadastro = $dataCadastro;
    }

    public function setPerfilId($perfilId) {
        $this->perfilId = $perfilId;
    }

}
