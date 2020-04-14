<?php
require_once '../dao/CarroDAO.php';
$montadora = $_POST["montadora"];
$montadora2 = strtoupper($montadora);
$carroDAO = new CarroDAO();
if($carroDAO->newMontadora($montadora2)){
    echo "<script>";
    echo "     window.alert('Adicionado com sucesso!');";
    echo "</script>";
    echo "<script>";
    echo "       window.location.href = '../view/painelAdministrador.php';";
    echo "</script>";
} else{
    echo "Não foi possível cadastrar<br>";
    var_dump($carroDAO);
}