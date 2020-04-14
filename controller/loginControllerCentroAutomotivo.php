<?php
session_start();
require_once '../dao/LoginDAO.php';
$usuario = $_POST["email"];
$senha = md5($_POST["senha"]);
/*print_r($usuario);
echo "<br>";
print_r($senha);
exit();*/
$loginDAO = new LoginDAO();
$usuario = $loginDAO->loginCentroAutomotivo($usuario, $senha);

if(!empty($usuario)){
    $_SESSION["usuario"] = $usuario["usuario"];
    $_SESSION["perfil"] = $usuario["perfil"];
    $_SESSION["idUsuario"] = $usuario["idUsuario"];
    $_SESSION["centroautomotivo_idCentro"] = $usuario["centroautomotivo_idCentro"];
    if($_SESSION["perfil"]=="Centro Automotivo"){
        header("location: ../view/painelCentroAutomotivo.php");
    }else{
        header("location: ../index.php");
    }
    echo "<script>";
    echo "window.location.href= '../view/painelCentroAutomotivo.php';";
    echo "</script>";
} else {
    $msg ="dados incorretos";
    echo "<script>";
    echo "alert('dados incorretos');";
    echo "window.location.href= '../index.php';";    
    echo "</script>";
}