<?php
require_once '../dao/CarroDAO.php';
$idModelo = isset($_POST["id"]) ? ($_POST["id"]) :  "";
$modelo = isset($_POST["modelo"]) ? ($_POST["modelo"]) : "";

$carroDAO = new CarroDAO();
if($carroDAO->updateModel($modelo, $idModelo)){
    echo "<script>";
    echo "        window.alert('Atualizado com sucesso!')";
    echo "</script>";
    echo "<script>";
    echo "         window.location.href = '../view/gMod.php';";
    echo "</script>";
} else {
    echo "<b style='color: red'>"."Não foi possível atender a solicitação"."</b><br>";
    var_dump($carroDAO->updateModel($modelo, $idModelo));
}