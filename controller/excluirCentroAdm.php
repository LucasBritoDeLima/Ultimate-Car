<?php
require_once '../dao/CentroAutomotivoDAO.php';
$idCentroAutomotivo = $_GET["id"];
$centroAutomotivoDAO = new CentroAutomotivoDAO();
if($centroAutomotivoDAO->excluirCentroAutomotivo($idCentroAutomotivo)){
echo "<script>";
echo "    window.location.href='../view/painelAdministrador.php';";
echo "</script>";
}else{
    die("Erro ao excluir o centro automotivo");
}