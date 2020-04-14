<?php
class AnuncioDTO {
    private $idAnuncio;
    private $titulo;
    private $categoria;
    private $preco;
    private $descricao;
    private $fotoUm;
    private $fotoDois;
    private $fotoTres;
    private $dataCadastro;
    private $usuarioId;
    
    public function getIdAnuncio() {
        return $this->idAnuncio;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getCategoria() {
        return $this->categoria;
    }

    public function getPreco() {
        return $this->preco;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function getFotoUm() {
        return $this->fotoUm;
    }

    public function getFotoDois() {
        return $this->fotoDois;
    }

    public function getFotoTres() {
        return $this->fotoTres;
    }

    public function getDataCadastro() {
        return $this->dataCadastro;
    }

    public function getUsuarioId() {
        return $this->usuarioId;
    }

    public function setIdAnuncio($idAnuncio) {
        $this->idAnuncio = $idAnuncio;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    public function setPreco($preco) {
        $this->preco = $preco;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function setFotoUm($fotoUm) {
        $this->fotoUm = $fotoUm;
    }

    public function setFotoDois($fotoDois) {
        $this->fotoDois = $fotoDois;
    }

    public function setFotoTres($fotoTres) {
        $this->fotoTres = $fotoTres;
    }

    public function setDataCadastro($dataCadastro) {
        $this->dataCadastro = $dataCadastro;
    }

    public function setUsuarioId($usuarioId) {
        $this->usuarioId = $usuarioId;
    }


}
