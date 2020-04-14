<?php
require_once '../dto/ComentarioDTO.php';
require_once '../dao/ComentarioDAO.php';

#Receber as variaveis do formulario
$comentario=$_POST["comentario"];
$avaliacao = $_POST["nota"];
$idCentroAutomotivo = $_POST["centroautomotivo"];
$idCliente = $_POST["cliente"];

#instanciar o comentariodto
$comentarioDTO = new ComentarioDTO();
$comentarioDTO->setComentario($comentario);
$comentarioDTO->setNota($avaliacao);
$comentarioDTO->setCliente_id($idCliente);
$comentarioDTO->setCentroAutomotivo($idCentroAutomotivo);

#instanciar o comentariodao
$comentarioDAO = new ComentarioDAO();
if($comentarioDAO->salvar($comentarioDTO)){
    header("location: ../view/centro.php?id={$idCentroAutomotivo}");
} else {
    echo "Não foi possivel fazer o comentario";
    var_dump($comentarioDAO);
}
