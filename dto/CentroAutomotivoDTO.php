<?php
class CentroAutomotivoDTO {
    private $idCentro;
    private $nomeFantasia;
    private $razaoSocial;
    private $cnpj;
    private $ie;
    private $logradouro;
    private $cep;
    private $numero;
    private $bairro;
    private $cidade;
    private $estado;
    private $servicos;
    private $email;
    private $foto;
    private $telefone;
    private $dataentrada;
    
    public function getIdCentro() {
        return $this->idCentro;
    }

    public function getNomeFantasia() {
        return $this->nomeFantasia;
    }

    public function getRazaoSocial() {
        return $this->razaoSocial;
    }

    public function getCnpj() {
        return $this->cnpj;
    }

    public function getIe() {
        return $this->ie;
    }

    public function getLogradouro() {
        return $this->logradouro;
    }

    public function getCep() {
        return $this->cep;
    }

    public function getNumero() {
        return $this->numero;
    }

    public function getBairro() {
        return $this->bairro;
    }

    public function getCidade() {
        return $this->cidade;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function getServicos() {
        return $this->servicos;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getFoto() {
        return $this->foto;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function getDataentrada() {
        return $this->dataentrada;
    }

    public function setIdCentro($idCentro) {
        $this->idCentro = $idCentro;
    }

    public function setNomeFantasia($nomeFantasia) {
        $this->nomeFantasia = $nomeFantasia;
    }

    public function setRazaoSocial($razaoSocial) {
        $this->razaoSocial = $razaoSocial;
    }

    public function setCnpj($cnpj) {
        $this->cnpj = $cnpj;
    }

    public function setIe($ie) {
        $this->ie = $ie;
    }

    public function setLogradouro($logradouro) {
        $this->logradouro = $logradouro;
    }

    public function setCep($cep) {
        $this->cep = $cep;
    }

    public function setNumero($numero) {
        $this->numero = $numero;
    }

    public function setBairro($bairro) {
        $this->bairro = $bairro;
    }

    public function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function setServicos($servicos) {
        $this->servicos = $servicos;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setFoto($foto) {
        $this->foto = $foto;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    public function setDataentrada($dataentrada) {
        $this->dataentrada = $dataentrada;
    }
}
