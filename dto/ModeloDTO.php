<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModeloDTO
 *
 * @author LUCCAR
 */
class ModeloDTO {
    private $idModelo;
    private $modelo;
    private $montadora_id;
    
    public function getIdModelo() {
        return $this->idModelo;
    }

    public function getModelo() {
        return $this->modelo;
    }

    public function getMontadora_id() {
        return $this->montadora_id;
    }

    public function setIdModelo($idModelo) {
        $this->idModelo = $idModelo;
    }

    public function setModelo($modelo) {
        $this->modelo = $modelo;
    }

    public function setMontadora_id($montadora_id) {
        $this->montadora_id = $montadora_id;
    }


}
