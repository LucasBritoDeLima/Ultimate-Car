<?php
class FiltroDTO {
    private $idFiltro;
    private $marcaFiltro;
    private $tipoFiltro;
    private $cod;
    private $foto;
    private $motorFiltro;
    
    public function getIdFiltro() {
        return $this->idFiltro;
    }

    public function getMarcaFiltro() {
        return $this->marcaFiltro;
    }

    public function getTipoFiltro() {
        return $this->tipoFiltro;
    }

    public function getCod() {
        return $this->cod;
    }

    public function getFoto() {
        return $this->foto;
    }

    public function getMotorFiltro() {
        return $this->motorFiltro;
    }

    public function setIdFiltro($idFiltro) {
        $this->idFiltro = $idFiltro;
    }

    public function setMarcaFiltro($marcaFiltro) {
        $this->marcaFiltro = $marcaFiltro;
    }

    public function setTipoFiltro($tipoFiltro) {
        $this->tipoFiltro = $tipoFiltro;
    }

    public function setCod($cod) {
        $this->cod = $cod;
    }

    public function setFoto($foto) {
        $this->foto = $foto;
    }

    public function setMotorFiltro($motorFiltro) {
        $this->motorFiltro = $motorFiltro;
    }            
}
