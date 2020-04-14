<?php
require_once '../dao/CarroDAO.php';
$ano = $_GET["ano"];
$carroDAO = new CarroDAO();
$carros = $carroDAO->findMotorByAno($ano);

echo "<select name='motor' id='motor' class='form-control' onmouseover='buscar_all()' onchange='buscar_all()'>";
foreach ($carros as $c){
    echo "<option value='{$c["motor"]}'>".$c["motor"]."</option>";
}
echo "</select>";

