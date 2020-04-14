<?php
require_once '../dao/FiltroDAO.php';
$idFiltro = $_GET["id"];
$filtroDAO = new FiltroDAO();
if($filtroDAO->excluirFiltro($idFiltro)){
    echo "<script>";
    echo "              window.alert('excluido com sucesso');";
    echo "</script>";
    echo "<script>";
    echo "               window.location.href='../view/painelAdministrador.php';";
    echo "</script>";
}