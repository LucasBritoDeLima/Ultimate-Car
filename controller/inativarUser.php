<?php
require_once '../dao/ClienteDAO.php';
$idUsuario = $_GET['id'];
$sit = 0;
$clienteDAO = new ClienteDAO();
if($clienteDAO->inativarUsuario($sit, $idUsuario)){
    echo "<script>";
    echo "      window.alert('Ação concluida com sucesso');";
    echo "</script>";
    echo "<script>";
    echo "            window.location.href = '../view/VerCliente.php?id={$idUsuario}'";
    echo "</script>";
} else {
    
}
