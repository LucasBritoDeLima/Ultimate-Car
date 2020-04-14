<?php
require_once '../dao/CarroDAO.php';
$key_carro = $_POST['rkey'];
$key_filtro = $_POST['rkeyf'];
$carroDAO = new CarroDAO();

if($carroDAO->carroEFiltro($key_filtro, $key_carro)){
    echo "<script>";
    echo "          window.alert('Vinculação executada com sucesso!');";
    echo "</script>";
    echo "<script>";
    echo "          window.location.href = '../view/vFV.php'";
    echo "</script>";
}