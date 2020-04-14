<?php
require_once '../dao/CarroDAO.php';
$idModelo = $_GET["modelo"];
$carroDAO = new CarroDAO();
$carros = $carroDAO->findCarroByModelo($idModelo);

echo "<select name='carro' id='carro' class='form-control' onmouseover='buscar_ano()' onchange='buscar_ano()'>";
foreach ($carros as $c){
    echo "<option value='{$c["nomeCarro"]}'>".$c["nomeCarro"]."</option>";
}
echo "</select>";

