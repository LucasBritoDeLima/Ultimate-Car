<?php
class OleoDTO {
    private $idOleo;
    private $marcaOleo;
    private $nomeOleo;
    private $apiOleo;
    private $sae;
    private $acea;
    private $foto;
    private $tipoOleo;
    
    public function getIdOleo() {
        return $this->idOleo;
    }

    public function getMarcaOleo() {
        return $this->marcaOleo;
    }

    public function getNomeOleo() {
        return $this->nomeOleo;
    }

    public function getApiOleo() {
        return $this->apiOleo;
    }

    public function getSae() {
        return $this->sae;
    }

    public function getAcea() {
        return $this->acea;
    }

    public function getFoto() {
        return $this->foto;
    }

    public function getTipoOleo() {
        return $this->tipoOleo;
    }

    public function setIdOleo($idOleo) {
        $this->idOleo = $idOleo;
    }

    public function setMarcaOleo($marcaOleo) {
        $this->marcaOleo = $marcaOleo;
    }

    public function setNomeOleo($nomeOleo) {
        $this->nomeOleo = $nomeOleo;
    }

    public function setApiOleo($apiOleo) {
        $this->apiOleo = $apiOleo;
    }

    public function setSae($sae) {
        $this->sae = $sae;
    }

    public function setAcea($acea) {
        $this->acea = $acea;
    }

    public function setFoto($foto) {
        $this->foto = $foto;
    }

    public function setTipoOleo($tipoOleo) {
        $this->tipoOleo = $tipoOleo;
    }
}
