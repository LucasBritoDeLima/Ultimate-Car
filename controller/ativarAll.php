<?php
require_once '../dao/CentroAutomotivoDAO.php';
$idCentroAutomotivo = $_GET['id'];
$centroAutomotivoDAO = new CentroAutomotivoDAO();
$sit = 1;
if($centroAutomotivoDAO->ativarCentroAutomotivo($sit, $idCentroAutomotivo)){
    header("location: ../view/VerCentro.php?id={$idCentroAutomotivo}");
}else {
    echo "Não foi possivel atender a solicitação";
}