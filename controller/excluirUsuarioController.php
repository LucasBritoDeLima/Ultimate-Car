<?php
session_start();
require_once '../dao/ClienteDAO.php';
$idUsuario = $_GET["id"];
$idCliente = $_GET["idC"];
$sit = 0;
$clienteDAO = new ClienteDAO();
if($clienteDAO->inativarUsuario($sit, $idUsuario)){
    session_destroy();
    echo "<script>";
    echo "window.alert('Excluido com sucesso!');";
    echo " window.location.href='../index.php';";
    echo "</script>";
}else {
    die("Erro ao excluir");
}