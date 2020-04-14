<?php
require_once '../dao/CarroDAO.php';
$marca = $_GET['marca'];
$tipo = $_GET['tipo'];
$carroDAO = new CarroDAO();
$filtros = $carroDAO->findCodByTipoByMarca($marca, $tipo);

echo "<select name='codfiltro' id='cod' class='form-control' onmouseover='buscar_key()' onchange='buscar_key()'>";
foreach ($filtros as $f) {
    echo "<option value='{$f['cod']}'>".$f['cod']."</option>";
}
echo "</select>";