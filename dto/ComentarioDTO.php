<?php
class ComentarioDTO {
    private $idComentario;
    private $nota;
    private $comentario;
    private $cliente_id;
    private $centroAutomotivo;
    
    public function getIdComentario() {
        return $this->idComentario;
    }

    public function getNota() {
        return $this->nota;
    }

    public function getComentario() {
        return $this->comentario;
    }

    public function getCliente_id() {
        return $this->cliente_id;
    }

    public function getCentroAutomotivo() {
        return $this->centroAutomotivo;
    }

    public function setIdComentario($idComentario) {
        $this->idComentario = $idComentario;
    }

    public function setNota($nota) {
        $this->nota = $nota;
    }

    public function setComentario($comentario) {
        $this->comentario = $comentario;
    }

    public function setCliente_id($cliente_id) {
        $this->cliente_id = $cliente_id;
    }

    public function setCentroAutomotivo($centroAutomotivo) {
        $this->centroAutomotivo = $centroAutomotivo;
    }
}
