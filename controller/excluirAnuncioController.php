<?php
session_start();
require_once '../dao/AnuncioDAO.php';
$idPeca = $_GET["id"];
$anuncioDAO = new AnuncioDAO();
$perfil = $_GET["perfil"];
if($anuncioDAO->excluirAnuncio($idPeca)){ 
echo "<script>";
    echo "window.alert(\"Excluido com sucesso\");";
echo "</script>";
    if($perfil == "Cliente"){
        header("location: ../view/painelUsuario.php");
    }elseif($perfil == "Centro Automotivo"){
        header("location: ../view/painelCentroAutomotivo.php");
    }else{
        header("location: ../view/painelAdministrador.php");
    }
} else {
    echo "Erro ao excluir";
}
