<?php
if(isset($_POST['submit'])){
require_once '../dto/AdministradorDTO.php';
require_once '../dao/AdministradorDAO.php';
$id =   $_POST["id"];
$name = "foto-perfil";
$temp = explode(".", $_FILES["avatar"]["name"]);
$newfilename = round(microtime(true)) . '.' . end($temp);
move_uploaded_file($_FILES["avatar"]["tmp_name"], "images/" . $newfilename);
$avatar = "/images/" . $newfilename;

$administradorDTO = new AdministradorDTO();
$administradorDTO->setFoto($avatar);
$administradorDTO->setUsuarioId($id);
$administradorDAO = new AdministradorDAO();
if($administradorDAO->mudarFoto($administradorDTO)){
    header("location: ../view/painelAdministrador.php");
    exit();
}else{
  die("ocorreu um erro");
}
}
