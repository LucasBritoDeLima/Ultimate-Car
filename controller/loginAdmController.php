<?php
session_start();
require_once '../dao/LoginDAO.php';
$senha = md5($_POST["senha"]);
$usuario = $_POST["usuario"];
$loginDAO = new LoginDAO();
$usuario = $loginDAO->loginAdm($usuario, $senha);
if(!empty($usuario)){
    $_SESSION["usuario"] = $usuario["usuario"];
    $_SESSION["perfil"] = $usuario["perfil"];
    $_SESSION["idUsuario"] = $usuario["idUsuario"];
    $_SESSION["idCliente"] = $usuario["idCliente"];
    header("location: ../view/painelAdministrador.php");
    
} else {
    $msg ="dados incorretos";
    echo "<script>";
    echo "alert('dados incorretos');";
    echo "window.location.href= '../index.php';";    
    echo "</script>";
}