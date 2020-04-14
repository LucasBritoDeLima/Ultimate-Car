<?php
session_start();
$_SESSION["perfil"] = "";
require_once '../dao/CentroAutomotivoDAO.php';
$idCentroAutomotivo = $_GET["id"];
$centroAutomotivoDAO = new CentroAutomotivoDAO();
$sit = 0;
if($centroAutomotivoDAO->inativarCentroAutomotivo($sit, $idCentroAutomotivo)){
echo "<script>";
echo "    window.location.href='../view/situationDel.php';";
echo "</script>";
session_destroy();
}else{
    die("Erro ao excluir o centro automotivo");
}