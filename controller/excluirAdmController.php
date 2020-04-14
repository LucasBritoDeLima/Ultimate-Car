<?php
session_start();
require_once '../dao/AdministradorDAO.php';
$idUsuario = $_GET["id"];
$administradorDAO = new AdministradorDAO();
if($administradorDAO->apagarUsuario($idUsuario)){
    session_destroy();
    echo "<script>";
    echo "window.alert('Excluido com sucesso!, Faça login novamente');";
    echo " window.location.href='../index.php';";
    echo "</script>";
}else {
    die("Erro ao excluir");
}