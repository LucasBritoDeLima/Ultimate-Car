<?php
session_start();
$perfil = $_SESSION["perfil"];
if(isset($_POST['submit'])){//Condição que testa se o botão de enviar formulário foi apertado
#Incluindo arquivos de transferência de objeto
require_once '../dto/AnuncioDTO.php';
require_once '../dao/AnuncioDAO.php';
#Recebendo as variaveis do formulário
$id =   $_POST["id"];
$titulo = $_POST["titulo"];
$preco = $_POST["preco"];
$categoria = $_POST["categoria"];
$descricao = $_POST["descricao"];
$foto1 = $_FILES["foto1"];
$foto2 = $_FILES["foto2"];
$foto3 = $_FILES["foto3"];
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
$anuncioDTO->setDataCadastro(date("Y-m-d"));
$anuncioDTO->setUsuarioId($id);
$anuncioDAO = new AnuncioDAO();

if($anuncioDAO->criarAnuncio($anuncioDTO)){
    if($perfil == "Cliente"){ 
    header("location: ../view/painelUsuario.php");}
    else{
    header("location: ../view/painelCentroAutomotivo.php");
    }
}else{
    echo "<br><br>";
    echo "<b>Não foi possível</b>";
}
}
