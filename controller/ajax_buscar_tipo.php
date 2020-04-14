<?php
require_once '../dao/CarroDAO.php';
$marca = $_GET['marca'];
$carroDAO = new CarroDAO();
$filtros = $carroDAO->findTipoByMarca($marca);

echo "<select name='tipo' id='tipo' class='form-control' onmouseover='buscar_cod()' onchange='buscar_cod()'>";
foreach ($filtros as $f) {
    echo "<option value='{$f['tipoFiltro']}'>".$f['tipoFiltro']."</option>";
}
echo "</select>";