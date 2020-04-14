<?php
require_once '../dao/CarroDAO.php';
$idMontadora = $_GET["montadora"];
$carroDAO = new CarroDAO();
$modelos = $carroDAO->findModeloByMontadora($idMontadora);

echo "<select name='modelo' id='modelo' class='form-control' onchange='buscar_carro()' onmouseover='buscar_carro()'>";
foreach ($modelos as $m){
    echo "<option value='{$m["idModelo"]}'>".$m["modelo"]."</option>";
}
echo "</select>";

