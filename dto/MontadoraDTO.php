<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MontadoraDTO
 *
 * @author LUCCAR
 */
class MontadoraDTO {
    private $idMontadora;
    private $montadora;
    
    public function getIdMontadora() {
        return $this->idMontadora;
    }

    public function getMontadora() {
        return $this->montadora;
    }

    public function setIdMontadora($idMontadora) {
        $this->idMontadora = $idMontadora;
    }

    public function setMontadora($montadora) {
        $this->montadora = $montadora;
    }
}
