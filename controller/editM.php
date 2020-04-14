<?php
require_once '../dao/CarroDAO.php';//1º passo
/*
 * Passos para a atualização dos dados
 * 1 - incluir arquivos de acesso a dados - aqueles que contem os inserts, updates,deletes, selects
 * 2 - Receber informações do formulário
 * 3 - incluir arquivos que contém os metodos get e set para transferencia de informação
 * 4 - instanciar a classe de transferencia de dados e usar os metodos set
 * 5 - instanciar a classe de acesso a dados e usar a função desejada para receber os valores dos metodos set */

//Inicio do 2º passo
$idMontadora = isset($_POST["idMontadora"]) ? ($_POST["idMontadora"]) : "";
$montadora = isset($_POST["montadora"]) ? ($_POST["montadora"]) : "";
//Fim do 2º passo

$carroDAO = new CarroDAO();
if($carroDAO->updateM(strtoupper($montadora), $idMontadora)){
    echo "<script>";
    echo "          window.alert('Montadora atualizada com sucesso');";
    echo "</script>";
    echo "<script>";
    echo "         window.location.href = '../view/gMont.php';";
    echo "</script>";
} else {
    echo "<b style='color: red; margin-bottom: 10px'>Não foi possível atender a solicitação</b><br>";
}