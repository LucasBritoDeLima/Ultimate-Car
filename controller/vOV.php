<?php
require_once '../dao/CarroDAO.php';
$key_carro = $_POST['rkey'];
$key_oleo = $_POST['rkeyo'];
$carroDAO = new CarroDAO();
if($carroDAO->carroEOleo($key_oleo, $key_carro)){
    echo "<script>";
    echo "        window.alert('Dados inseridos com sucesso');";
    echo "</script>";
    echo "<script>";
    echo "        window.location.href = '../view/vOV.php';";
    echo "</script>";
}else{
    echo "<b class='text-danger'>Não foi possível atender a solicitação</b>";
}
