<?php
session_start();
require_once '../dao/ClienteDAO.php';
$idUsuario = $_GET["id"];
$idCliente = $_GET["idC"];
$clienteDAO = new ClienteDAO();
if($clienteDAO->apagarUsuario($idUsuario,$idCliente)){
    echo "<script>";
    echo "window.alert('Excluido com sucesso!');";
    echo " window.location.href='../view/painelAdministrador.php';";
    echo "</script>";
}else {
    die("Erro ao excluir");
}