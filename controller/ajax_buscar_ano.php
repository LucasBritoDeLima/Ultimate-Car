<?php
require_once '../dao/CarroDAO.php';
$carro = $_GET["carro"];
$carroDAO = new CarroDAO();
$carros = $carroDAO->findAnoByCarro($carro);
echo "<select name='ano' id='ano' class='form-control' onchange='buscar_motor()' onmouseover='buscar_motor()'>";
foreach ($carros as $c){
    echo "<option value='{$c["ano"]}'>".$c["ano"]."</option>";
}
echo "</select>";

