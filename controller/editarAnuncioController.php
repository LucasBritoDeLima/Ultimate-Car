<?php
session_start();
$perfil = $_SESSION["perfil"];
if(isset($_POST['submit'])){//Condição que testa se o botão de enviar formulário foi apertado
#Incluindo arquivos de transferência de objeto
require_once '../dto/AnuncioDTO.php';
require_once '../dao/AnuncioDAO.php';
#Recebendo as variaveis do formulário
$idPeca = $_POST["idP"];
$titulo = $_POST["titulo"];
$categoria = $_POST["categoria"];
$preco = $_POST["preco"];
$descricao = $_POST["descricao"];
$foto1 = $_FILES["fotoUm"];
$foto2 = $_FILES["fotoDois"];
$foto3 = $_FILES["fotoTres"];
#upload de imagem
$destino = '../images/' . $foto1['name'];
$arquivo_tmp = $foto1['tmp_name'];
$fotos = move_uploaded_file( $arquivo_tmp, $destino);
//
$destino1 = '../images/' . $foto2['name'];
$arquivo_tmp1 = $foto2['tmp_name'];
$fotos1 = move_uploaded_file($arquivo_tmp1, $destino1);
//
$destino2 = '../images/' . $foto3['name'];
$arquivo_tmp2 = $foto3['tmp_name'];
$fotos2 = move_uploaded_file($arquivo_tmp2, $destino2);
//
$anuncioDTO = new AnuncioDTO();
$anuncioDTO->setTitulo($titulo);
$anuncioDTO->setCategoria($categoria);
$anuncioDTO->setPreco($preco);
$anuncioDTO->setDescricao($descricao);
$anuncioDTO->setFotoUm($foto1["name"]);
$anuncioDTO->setFotoDois($foto2["name"]);
$anuncioDTO->setFotoTres($foto3["name"]);
$anuncioDTO->setIdAnuncio($idPeca);
$anuncioDAO = new AnuncioDAO();

if($_FILES['fotoUm']['size']== 0&&$_FILES['fotoDois']['size']== 0&&$_FILES['fotoTres']['size']== 0){
    if($anuncioDAO->atualizarAnuncioNoFoto($anuncioDTO)){
        echo "<script>";
        echo "          window.alert(\"Atualizado com sucesso!\");";
        echo "</script>";
        if($perfil == "Cliente"){
            echo "<script>";
            echo "     window.location.href=\"../view/painelUsuario.php\";";
            echo "</script>";
        }elseif($perfil == "Centro Automotivo"){
            echo "<script>";
            echo "     window.location.href=\"../view/painelCentroAutomotivo.php\";";
            echo "</script>";
        }else{
            echo "<script>";
            echo "     window.location.href=\"../view/painelAdministrador.php\";";
            echo "</script>";
        }
    } else {
        echo "Erro ao excluir";
            echo "<script>";
            echo "     window.location.href=\"../index.php\";";
            echo "</script>";
    }
} elseif($_FILES['fotoUm']['size'] > 0 && $_FILES['fotoDois']['size']== 0 &&$_FILES['fotoTres']['size']== 0){
    $anuncioDTO->setFoto1($foto1['name']);
    if($anuncioDAO->atualizarAF($anuncioDTO)){
        echo "<script>";
        echo "          window.alert(\"Atualizado com sucesso!\");";
        echo "</script>";
        if($perfil == "Cliente"){
            echo "<script>";
            echo "     window.location.href=\"../view/painelUsuario.php\";";
            echo "</script>";
        }elseif($perfil == "Centro Automotivo"){
            echo "<script>";
            echo "     window.location.href=\"../view/painelCentroAutomotivo.php\";";
            echo "</script>";
        }else{
            echo "<script>";
            echo "     window.location.href=\"../view/painelAdministrador.php\";";
            echo "</script>";
        }
    } else {
        echo "Erro ao excluir";
            echo "<script>";
            echo "     window.location.href=\"../index.php\";";
            echo "</script>";
    }
} elseif($_FILES['fotoDois']['size'] > 0 && $_FILES['fotoUm']['size']== 0 &&$_FILES['fotoTres']['size']== 0){
$anuncioDTO->setFoto2($foto2['name']);   
    if($anuncioDAO->atualizarAFF($anuncioDTO)){
        echo "<script>";
        echo "          window.alert(\"Atualizado com sucesso!\");";
        echo "</script>";
        if($perfil == "Cliente"){
            echo "<script>";
            echo "     window.location.href=\"../view/painelUsuario.php\";";
            echo "</script>";
        }elseif($perfil == "Centro Automotivo"){
            echo "<script>";
            echo "     window.location.href=\"../view/painelCentroAutomotivo.php\";";
            echo "</script>";
        }else{
            echo "<script>";
            echo "     window.location.href=\"../view/painelAdministrador.php\";";
            echo "</script>";
        }
    } else {
        echo "Erro ao excluir";
            echo "<script>";
            echo "     window.location.href=\"../index.php\";";
            echo "</script>";
    }
}elseif($_FILES['fotoTres']['size'] > 0 && $_FILES['fotoUm']['size']== 0 &&$_FILES['fotoDois']['size']== 0){
$anuncioDTO->setFoto3($foto3['name']);    
    if($anuncioDAO->atualizarAFFF($anuncioDTO)){
        echo "<script>";
        echo "          window.alert(\"Atualizado com sucesso!\");";
        echo "</script>";
        if($perfil == "Cliente"){
            echo "<script>";
            echo "     window.location.href=\"../view/painelUsuario.php\";";
            echo "</script>";
        }elseif($perfil == "Centro Automotivo"){
            echo "<script>";
            echo "     window.location.href=\"../view/painelCentroAutomotivo.php\";";
            echo "</script>";
        }else{
            echo "<script>";
            echo "     window.location.href=\"../view/painelAdministrador.php\";";
            echo "</script>";
        }
    } else {
        echo "Erro ao excluir";
            echo "<script>";
            echo "     window.location.href=\"../index.php\";";
            echo "</script>";
    }
}elseif($_FILES['fotoUm']['size'] > 0 && $_FILES['fotoDois']['size']> 0 &&$_FILES['fotoTres']['size']== 0){
    $anuncioDTO->setFoto1($foto1['name']);
$anuncioDTO->setFoto2($foto2['name']);    
    if($anuncioDAO->atualizarAFoto1Foto2($anuncioDTO)){
        echo "<script>";
        echo "          window.alert(\"Atualizado com sucesso!\");";
        echo "</script>";
        if($perfil == "Cliente"){
            echo "<script>";
            echo "     window.location.href=\"../view/painelUsuario.php\";";
            echo "</script>";
        }elseif($perfil == "Centro Automotivo"){
            echo "<script>";
            echo "     window.location.href=\"../view/painelCentroAutomotivo.php\";";
            echo "</script>";
        }else{
            echo "<script>";
            echo "     window.location.href=\"../view/painelAdministrador.php\";";
            echo "</script>";
        }
    } else {
        echo "Erro ao excluir";
            echo "<script>";
            echo "     window.location.href=\"../index.php\";";
            echo "</script>";
    }
}elseif($_FILES['fotoUm']['size'] > 0 && $_FILES['fotoTres']['size'] > 0 &&$_FILES['fotoDois']['size']== 0){  
    if($anuncioDAO->atualizarAFoto1Foto3($anuncioDTO)){
        echo "<script>";
        echo "          window.alert(\"Atualizado com sucesso!\");";
        echo "</script>";
        if($perfil == "Cliente"){
            echo "<script>";
            echo "     window.location.href=\"../view/painelUsuario.php\";";
            echo "</script>";
        }elseif($perfil == "Centro Automotivo"){
            echo "<script>";
            echo "     window.location.href=\"../view/painelCentroAutomotivo.php\";";
            echo "</script>";
        }else{
            echo "<script>";
            echo "     window.location.href=\"../view/painelAdministrador.php\";";
            echo "</script>";
        }
    } else {
        echo "Erro ao excluir";
            echo "<script>";
            echo "     window.location.href=\"../index.php\";";
            echo "</script>";
    }
}elseif($_FILES['fotoDois']['size'] > 0 && $_FILES['fotoTres']['size'] > 0 &&$_FILES['fotoUm']['size']== 0){
        if($anuncioDAO->atualizarAFoto2Foto3($anuncioDTO)){
        echo "<script>";
        echo "          window.alert(\"Atualizado com sucesso!\");";
        echo "</script>";
        if($perfil == "Cliente"){
            echo "<script>";
            echo "     window.location.href=\"../view/painelUsuario.php\";";
            echo "</script>";
        }elseif($perfil == "Centro Automotivo"){
            echo "<script>";
            echo "     window.location.href=\"../view/painelCentroAutomotivo.php\";";
            echo "</script>";
        }else{
            echo "<script>";
            echo "     window.location.href=\"../view/painelAdministrador.php\";";
            echo "</script>";
        }
    } else {
        echo "Erro ao excluir";
            echo "<script>";
            echo "     window.location.href=\"../index.php\";";
            echo "</script>";
    }
}elseif($_FILES['fotoUm']['size'] > 0 && $_FILES['fotoDois']['size'] > 0 &&$_FILES['fotoTres']['size']> 0){
        if($anuncioDAO->atualizarAnuncio($anuncioDTO)){
        echo "<script>";
        echo "          window.alert(\"Atualizado com sucesso!\");";
        echo "</script>";
        if($perfil == "Cliente"){
            echo "<script>";
            echo "     window.location.href=\"../view/painelUsuario.php\";";
            echo "</script>";
        }elseif($perfil == "Centro Automotivo"){
            echo "<script>";
            echo "     window.location.href=\"../view/painelCentroAutomotivo.php\";";
            echo "</script>";
        }else{
            echo "<script>";
            echo "     window.location.href=\"../view/painelAdministrador.php\";";
            echo "</script>";
        }
    } else {
        echo "Erro ao excluir";
            echo "<script>";
            echo "     window.location.href=\"../index.php\";";
            echo "</script>";
    }
}
}
