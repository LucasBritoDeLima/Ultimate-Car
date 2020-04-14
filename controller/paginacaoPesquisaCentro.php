<?php
#Incluindo a conexão no banco de dados
require_once '../dao/conexao/Conexao.php';
$conexao = Conexao::getInstance();
define("ROW_PER_PAGE",2); //definindo o numero de resultados exibidos na pagina
$search_keyword = ''; //palavra chave -> recebe o que for digitado no campo de busca
$sql = 'SELECT * FROM centroautomotivo WHERE nomefantasia LIKE :keyword ORDER BY idCentro DESC';
/*Inicio da paginacao*/
$per_page_html = '';
$page = 1;
$start = 0;
if(!empty($_POST["page"])){
    $page = $_POST["page"];
    $start=($page-1)* ROW_PER_PAGE;
}
$limit=" limit ". $start . " ," . ROW_PER_PAGE;
$pagination_statement = $conexao->prepare($sql);
$pagination_statement->bindValue(':keyword', '%'. $search_keyword . '%', PDO::PARAM_STR);
$pagination_statement->execute();

$row_count = $pagination_statement->rowCount();
    if(!empty($row_count)){
        $per_page_html .="<div style='text-align:center;margin:20px 0px'>";
        $page_count=ceil($row_count/ROW_PER_PAGE);
        if($page_count>1){
            for($i=1;$i<$page_count;$i++){
                if($i==$page){
                    $per_page_html .= '<input type="submit" name="page" value="'. $i . '" class="btn-page current"/>';
                } else {
                    $per_page_html .= '<input type="submit" name="page" value="' . $i . '" class="btn-page"/>';
                }
            }
        }
        $per_page_html .="</div>";
    }
    
    $query = $sql.$limit; 
    $pdo_statement = $conexao->prepare($query);
    $pdo_statement->bindValue(':keyword', '%'. $search_keyword. '%', PDO::PARAM_STR);
    $pdo_statement->execute();
    $result = $pdo_statement->fetchAll();