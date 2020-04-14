<?php
session_start();
$perfil = isset($_SESSION["perfil"]) ? ($_SESSION["perfil"]) : "";
require_once '../dao/ComentarioDAO.php';

$Comentario = $_GET["id"];
$idUsuario = $_GET["centro"];

$comentarioDAO = new ComentarioDAO();

if ($comentarioDAO->apagarComentario($Comentario, $idUsuario)) {
    if ($perfil == "Administrador") {
        echo "<script>";
        echo "    window.location.href='../view/painelAdministrador.php';";
        echo "</script>";
    } else{
        echo "<script>";
        echo "    window.location.href='../view/CentroAutomotivo.php';";
        echo "</script>";
    }
} else {
    die("Erro ao excluir o cliente");
}
