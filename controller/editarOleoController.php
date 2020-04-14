<?php

require_once '../dao/OleoDAO.php';
require_once '../dto/OleoDTO.php';

$idOleo = $_POST["idOleo"];
$nomeoleo = $_POST["nomeoleo"];
$marca = $_POST["marca"];
$api = $_POST["api"];
$sae = $_POST["sae"];
$acea = $_POST["acea"];
$tipo = $_POST["tipo"];
$foto = $_FILES["foto"];

$destino = '../images/' . $foto['name'];
$arquivo_tmp = $foto['tmp_name'];
$fotos = move_uploaded_file($arquivo_tmp, $destino);

echo $foto;
exit();
$oleoDTO = new OleoDTO();
$oleoDTO->setIdOleo($idOleo);
$oleoDTO->setNomeoleo($nomeoleo);
$oleoDTO->setMarcaoleo($marca);
$oleoDTO->setApioleo($api);
$oleoDTO->setSae($sae);
$oleoDTO->setAcea($acea);
$oleoDTO->setTipoOleo($tipo);
$oleoDTO->setFoto($foto['name']);

$OleoDAO = new OleoDAO();
if ($_FILES['foto']['size'] == 0) {
    if ($OleoDAO->atualizarF($oleoDTO)) {
        echo "<script>";
        echo "            window.alert('Alterado com sucesso!');";
        echo "</script>";
        echo "<script>";
        echo "                 window.location.href='../view/painelAdministrador.php';";
        echo "</script>";
    } else {
        echo "<br>Não foi possivel completar a ação<br>";
    }
} else{
    if ($OleoDAO->atualizar($oleoDTO)) {
        echo "<script>";
        echo "            window.alert('Alterado com sucesso!');";
        echo "</script>";
        echo "<script>";
        echo "                 window.location.href='../view/painelAdministrador.php';";
        echo "</script>";
    } else {
        echo "<br>Não foi possivel completar a ação<br>";
    }
}