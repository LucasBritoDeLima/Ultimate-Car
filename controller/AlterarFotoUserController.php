<?php
if(isset($_POST['submit'])){
require_once '../dto/ClienteDTO.php';
require_once '../dao/ClienteDAO.php';
$id =   $_POST["id"];
$name = "foto-perfil";
$temp = explode(".", $_FILES["avatar"]["name"]);
$newfilename = round(microtime(true)) . '.' . end($temp);
move_uploaded_file($_FILES["avatar"]["tmp_name"], "images/" . $newfilename);
$avatar = "/images/" . $newfilename;

$clienteDTO = new ClienteDTO();
$clienteDTO->setFoto($avatar);
$clienteDTO->setIdCliente($id);
$clienteDAO = new ClienteDAO();
if($clienteDAO->mudarFoto($clienteDTO)){
    header("location: ../view/painelUsuario.php");
    exit();
}else{
    die("ocorreu um erro");
}
}
