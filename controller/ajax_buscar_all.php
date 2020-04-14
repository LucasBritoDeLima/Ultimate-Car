<?php
require_once '../dao/CarroDAO.php';
$carro = $_GET["carro"];
$ano = $_GET["ano"];
$motor = $_GET["motor"];
$carroDAO = new CarroDAO();
$carros = $carroDAO->obterInfo($carro, $ano, $motor);
//echo "<span style='font-weight: bold; font-size: 36px; text-align: center; color: red'>";
//echo $carros["idCarro"];
//echo "</span>";

echo "<input type=\"hidden\" name=\"key_carro\" value='{$carros['idCarro']}' id=\"key\">";
echo "<br>";
echo "<div class=\"alert alert-success\" role=\"alert\">";
echo "Chave gerada com sucesso <button onclick='copiaValor()' class='btn btn-success'>Clique aqui</button>";
echo "</div>";