<?php
require_once '../dao/CarroDAO.php';
$marca = $_GET['marca'];
$oleo = $_GET['oleo'];
$sae = $_GET['sae'];
$carroDAO = new CarroDAO();
$info = $carroDAO->retornaOleo($marca, $oleo, $sae);
echo "<input type=\"hidden\" name=\"key_oleo\" value='{$info['idOleo']}' id=\"key_oleo\">";
echo "<br>";
echo "<div class=\"alert alert-success\" role=\"alert\">";
echo "Chave gerada com sucesso <button onclick='copiaValor2()' class='btn btn-success'>Clique aqui</button>";
echo "</div>";
