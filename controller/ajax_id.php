<?php
require_once '../dao/CarroDAO.php';
$carro = $_GET["carro"];
$ano = $_GET["ano"];
$motor = $_GET["motor"];
$carroDAO = new CarroDAO();
$carros = $carroDAO->obterInfo($carro, $ano, $motor);
echo "<input type=\"hidden\" name=\"key_carro\" value='{$carros['idCarro']}' id=\"key\">";
echo "<br>";
