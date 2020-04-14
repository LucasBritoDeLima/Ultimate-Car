<?php
require_once '../dao/OleoDAO.php';
require_once '../dto/OleoDTO.php';

//receber as variaveis
$nomeoleo = $_POST["nomeoleo"];
$marca = $_POST["marca"];
$api = $_POST["api"];
$sae = $_POST["sae"];
$acea = $_POST["acea"];
$tipo = $_POST["tipo"];
$foto = $_FILES["foto"];

$destino = '../images/' . $foto['name'];
$arquivo_tmp = $foto['tmp_name'];
$fotos = move_uploaded_file( $arquivo_tmp, $destino);

$oleoDTO = new OleoDTO();
$oleoDTO->setMarcaOleo($marca);
$oleoDTO->setNomeOleo($nomeoleo);
$oleoDTO->setApiOleo($api);
$oleoDTO->setSae($sae);
$oleoDTO->setAcea($acea);
$oleoDTO->setFoto($foto['name']);
$oleoDTO->setTipoOleo($tipo);
$OleoDAO = new OleoDAO();

if($OleoDAO->addOleo($oleoDTO)){
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