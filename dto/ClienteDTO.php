<?php
class ClienteDTO {
  private $idCliente;
  private $logradouro;
  private $cep;
  private $numero;
  private $bairro;
  private $cidade;
  private $estado;
  private $foto;
  private $usuario_idUsuario;
  
  public function getIdCliente() {
      return $this->idCliente;
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

  public function getFoto() {
      return $this->foto;
  }

  public function getUsuario_idUsuario() {
      return $this->usuario_idUsuario;
  }

  public function setIdCliente($idCliente) {
      $this->idCliente = $idCliente;
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

  public function setFoto($foto) {
      $this->foto = $foto;
  }

  public function setUsuario_idUsuario($usuario_idUsuario) {
      $this->usuario_idUsuario = $usuario_idUsuario;
  }
}
