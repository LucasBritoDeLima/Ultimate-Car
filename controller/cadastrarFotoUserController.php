<?php
if(isset($_POST['submit'])){
require_once '../dto/UsuarioDTO.php';
require_once '../dao/UsuarioDAO.php';

$name = "foto-perfil";
$temp = explode(".", $_FILES["avatar"]["name"]);
$newfilename = round(microtime(true)) . '.' . end($temp);
move_uploaded_file($_FILES["avatar"]["tmp_name"], "images/" . $newfilename);
$avatar = "/images/" . $newfilename;

$usuarioDTO = new UsuarioDTO();
$usuarioDTO->setFoto($avatar);
$UsuarioDAO = new UsuarioDAO();
if($UsuarioDAO->addFoto($usuarioDTO)){
    header("location: ../view/situation.php");
    exit();
}else{
    die("ocorreu um erro");
}
}
