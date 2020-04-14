<?php
session_start();
require_once '../dao/LoginDAO.php';
$usuario = isset($_POST["email"])? ($_POST["email"]) : "";
$senha = md5($_POST["senha"]);
$loginDAO = new LoginDAO();
$usuario = $loginDAO->login($usuario, $senha);
if(!empty($usuario)){
    $_SESSION["usuario"] = $usuario["usuario"];
    $_SESSION["perfil"] = $usuario["perfil"];
    $_SESSION["idUsuario"] = $usuario["idUsuario"];
    $_SESSION["idCliente"] = $usuario["idCliente"];
    if($_SESSION["perfil"]=="Administrador"){
        header("location: ../view/painelAdministrador.php");
    }elseif($_SESSION["perfil"]=="Cliente"){
        header("location: ../view/painelUsuario.php");
    }
} else {
    $msg ="dados incorretos";
    echo "<script>";
    echo "alert('dados incorretos');";
    echo "window.location.href= '../index.php';";    
    echo "</script>";
}