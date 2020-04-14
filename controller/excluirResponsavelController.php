<?php
session_start();
$perfil = isset($_SESSION["perfil"])? ($_SESSION["perfil"]) : "" ;
require_once '../dao/EmpregadoDAO.php';
$idResp = $_GET["id"];
$idCentro = isset($_GET["idE"])? ($_GET["idE"]) : "";
$empregadoDAO = new EmpregadoDAO();
if ($empregadoDAO->excluirResponsavel($idResp)){
    if ($perfil == "Administrador"){
        header("location: ../view/VerCentro.php?id={$idCentro}");
    }else{
    $msg="Responsavel excluido com sucesso!";
    header("location: ../view/detalhesResponsavel.php?msg={$msg}");
    }
} else{
    echo "Não foi possivel excluir o responsável";
}
