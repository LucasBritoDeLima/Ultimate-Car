<?php
require_once '../dao/OleoDAO.php';
$idOleo = $_GET["id"];
$oleoDAO = new OleoDAO();
if($oleoDAO->excluirOleo($idOleo)){
    echo "<script>";
    echo "              window.alert('excluido com sucesso');";
    echo "</script>";
    echo "<script>";
    echo "               window.location.href='../view/painelAdministrador.php';";
    echo "</script>";
}


