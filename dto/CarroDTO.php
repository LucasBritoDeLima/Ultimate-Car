<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CarroDTO
 *
 * @author LUCCAR
 */
class CarroDTO {
    private $idCarro;
    private $nomeCarro;
    private $ano;
    private $motor;
    private $combustivel;
    private $saeR;
    private $saeA;
    private $acea;
    private $api;
    private $tipoOleo;
    private $capacidade;
    private $foto;
    private $modelo_id;
    
    public function getIdCarro() {
        return $this->idCarro;
    }

    public function getNomeCarro() {
        return $this->nomeCarro;
    }

    public function getAno() {
        return $this->ano;
    }

    public function getMotor() {
        return $this->motor;
    }

    public function getCombustivel() {
        return $this->combustivel;
    }

    public function getSaeR() {
        return $this->saeR;
    }

    public function getSaeA() {
        return $this->saeA;
    }

    public function getAcea() {
        return $this->acea;
    }

    public function getApi() {
        return $this->api;
    }

    public function getTipoOleo() {
        return $this->tipoOleo;
    }

    public function getCapacidade() {
        return $this->capacidade;
    }

    public function getFoto() {
        return $this->foto;
    }

    public function getModelo_id() {
        return $this->modelo_id;
    }

    public function setIdCarro($idCarro) {
        $this->idCarro = $idCarro;
    }

    public function setNomeCarro($nomeCarro) {
        $this->nomeCarro = $nomeCarro;
    }

    public function setAno($ano) {
        $this->ano = $ano;
    }

    public function setMotor($motor) {
        $this->motor = $motor;
    }

    public function setCombustivel($combustivel) {
        $this->combustivel = $combustivel;
    }

    public function setSaeR($saeR) {
        $this->saeR = $saeR;
    }

    public function setSaeA($saeA) {
        $this->saeA = $saeA;
    }

    public function setAcea($acea) {
        $this->acea = $acea;
    }

    public function setApi($api) {
        $this->api = $api;
    }

    public function setTipoOleo($tipoOleo) {
        $this->tipoOleo = $tipoOleo;
    }

    public function setCapacidade($capacidade) {
        $this->capacidade = $capacidade;
    }

    public function setFoto($foto) {
        $this->foto = $foto;
    }

    public function setModelo_id($modelo_id) {
        $this->modelo_id = $modelo_id;
    }
}
