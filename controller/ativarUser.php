<?php
require '../dao/ClienteDAO.php';
$idUsuario = $_GET['id'];
$sit = 1;
$clienteDAO = new ClienteDAO();
if($clienteDAO->ativarUsuario($sit, $idUsuario)){
    echo "<script>";
    echo "      window.alert('Ação concluida com sucesso');";
    echo "</script>";
    echo "<script>";
    echo "            window.location.href = '../view/VerCliente.php?id={$idUsuario}'";
    echo "</script>";
} else {
    
}
