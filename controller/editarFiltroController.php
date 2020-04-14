<?php

require_once '../dto/FiltroDTO.php';
require_once '../dao/FiltroDAO.php';

$idFiltro = $_POST["idFiltro"];
$marca = $_POST["marca"];
$tipo = $_POST["tipo"];
$cod = $_POST["cod"];
$motores = $_POST["motores"];
$foto = $_FILES["foto"];

$destino = '../images/' . $foto['name'];
$arquivo_tmp = $foto['tmp_name'];
$fotos = move_uploaded_file($arquivo_tmp, $destino);

$filtroDTO = new FiltroDTO();
$filtroDTO->setIdFiltro($idFiltro);
$filtroDTO->setMarcaFiltro($marca);
$filtroDTO->setTipoFiltro($tipo);
$filtroDTO->setCod($cod);
$filtroDTO->setMotorFiltro($motores);
$filtroDTO->setFoto($foto['name']);

$filtroDAO = new FiltroDAO();
if ($_FILES['foto']['size'] == 0) {
if ($filtroDAO->atualizarF($filtroDTO)) {
echo "<script>";
echo "            window.alert('Alterado com sucesso!');";
echo "</script>";
echo "<script>";
echo "                 window.location.href='../view/painelAdministrador.php';";
echo "</script>";
} else {
echo "<br>Não foi possivel completar a ação<br>";
}
} else {
if ($filtroDAO->atualizar($filtroDTO)) {
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