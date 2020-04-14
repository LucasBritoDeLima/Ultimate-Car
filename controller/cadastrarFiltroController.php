<?php
require_once '../dto/FiltroDTO.php';
require_once '../dao/FiltroDAO.php';

$marca = $_POST["marca"];
$tipo = $_POST["tipo"];
$cod = $_POST["cod"];
$motores = $_POST["motores"];
$foto = $_FILES["foto"];

$destino = '../images/' . $foto['name'];
$arquivo_tmp = $foto['tmp_name'];
$fotos = move_uploaded_file( $arquivo_tmp, $destino);

$filtroDTO = new FiltroDTO();
$filtroDTO->setMarcaFiltro($marca);
$filtroDTO->setTipoFiltro($tipo);
$filtroDTO->setCod($cod);
$filtroDTO->setMotorFiltro($motores);
$filtroDTO->setFoto($foto['name']);

$filtroDAO = new FiltroDAO();
if($filtroDAO->cadastrarFiltro($filtroDTO)){
    echo "<script>";
    echo "               alert('Cadastrado com sucesso!');";
    echo "</script>";
    echo "<script>";
    echo "                 window.location.href = '../view/painelAdministrador.php';";
    echo "</script>";
}else{
    echo "Erro ao cadastrar filtro";
    var_dump($filtroDAO);
}

