<?php
require_once '../dao/ComentarioDAO.php';
require_once '../dto/ComentarioDTO.php';

#Receber as variaveis do formulário
$comentario = $_POST["comentario"];
$nota = $_POST["nota"];
$idCentro = $_POST["idcentro"];
$idUser = $_POST["iduser"];
$idComment = $_POST["idComment"];

#instanciar o comentariodto
$comentarioDTO = new ComentarioDTO();
$comentarioDTO->setComentario($comentario);
$comentarioDTO->setNota($nota);

#instanciar o objeto comentariodao
$comentarioDAO = new ComentarioDAO();
if($comentarioDAO->atualizar($comentarioDTO, $idCentro, $idUser, $idComment)){
    echo "<script>";
    echo "          window.alert('Alterado com sucesso!');";
    echo "</script>";
    echo "<script>";
    echo "             window.location.href = \"../view/painelAdministrador.php\";";
    echo "</script>";
}else{
    echo "Erro ao editar comentário";
}
