<?php
require_once '../dao/CarroDAO.php';
$marcaOleo = $_GET["marca"];
$carroDAO = new CarroDAO();
$oleos = $carroDAO->findOleoByMarca($marcaOleo);

echo "<select name='oleo' id='oleo' class='form-control' onmouseover='buscar_sae()' onchange='buscar_sae()'>";
foreach ($oleos as $o) {
    echo "<option value='{$o['nomeOleo']}'>".$o['nomeOleo']."</option>";
}
echo "</select>";