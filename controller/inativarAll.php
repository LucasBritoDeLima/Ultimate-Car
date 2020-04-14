<?php
require_once '../dao/CentroAutomotivoDAO.php';
$idCentroAutomotivo = $_GET['id'];
$centroAutomotivoDAO = new CentroAutomotivoDAO();
$sit = 0;
if($centroAutomotivoDAO->inativarCentroAutomotivo($sit, $idCentroAutomotivo)){
    header("location: ../view/VerCentro.php?id={$idCentroAutomotivo}");
}else {
    echo "Não foi possivel atender a solicitação";
}