<?php
require_once '../dao/CarroDAO.php';
$nomeOleo = $_GET["oleo"];
$carroDAO = new CarroDAO();
$oleos = $carroDAO->findSaeByOleo($nomeOleo);

echo "<select name='sae' id='sae' class='form-control' onmouseover='buscar_all_oleo()' onchange='buscar_all_oleo()'>";
foreach ($oleos as $o) {
    echo "<option value='{$o['sae']}'>".$o['sae']."</option>";
}
echo "</select>";