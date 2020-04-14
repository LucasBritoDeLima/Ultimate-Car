<?php
if(isset($_POST['submit'])){
require_once '../dto/CentroAutomotivoDTO.php';
require_once '../dao/CentroAutomotivoDAO.php';
$id =   $_POST["id"];
$name = "foto-perfil";
$temp = explode(".", $_FILES["avatar"]["name"]);
$newfilename = round(microtime(true)) . '.' . end($temp);
move_uploaded_file($_FILES["avatar"]["tmp_name"], "images/" . $newfilename);
$avatar = "/images/" . $newfilename;

$centroAutomtivoDTO = new CentroAutomotivoDTO();
$centroAutomtivoDTO->setFoto($avatar);
$centroAutomtivoDTO->setIdCentro($id);
$centroAutomotivoDAO = new CentroAutomotivoDAO();
if($centroAutomotivoDAO->atualizarFoto($centroAutomtivoDTO)){
    header("location: ../view/painelCentroAutomotivo.php");
    exit();
}else{
    die("ocorreu um erro");
}
}
