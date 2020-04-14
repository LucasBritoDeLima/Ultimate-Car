<?php
require_once '../dao/CarroDAO.php';
$marca = $_GET['marca'];
$tipo = $_GET['tipo'];
$cod = $_GET['cod'];
$carroDAO = new CarroDAO();
$filtros = $carroDAO->findFiltroFull($marca, $tipo, $cod);

echo "<input type=\"hidden\" name=\"key_filtro\" value='{$filtros['idFiltro']}' id=\"key_filtro\">";
echo "<br>";
echo "<div class=\"alert alert-success\" role=\"alert\">";
echo "Chave gerada com sucesso <button onclick='copiaValor2()' class='btn btn-success'>Clique aqui</button>";
echo "</div>";

