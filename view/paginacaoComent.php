<?php
require_once '../dao/conexao/Conexao.php';
$conexao = Conexao::getInstance(); //Fazendo a conexão com o banco de dados
?>
<?php
//numero maximo de registros que serão mostrados na tela
$maximo = 3;
//armazenamos o valor da pagina atual
$pagina = isset($_GET['pagina'])? ($_GET['pagina']) : '1';
//subtraimos 1, porque os registros sempre começam do zero como em um array
$inicio = $pagina - 1;
//mutiplicamos a quantidade de registros da pagina pelo valor da pagina atual
$inicio = $maximo * $inicio;
?>
<?php 
$sql = "SELECT cm.*,ca.*,cl.*,u.* FROM comentario cm INNER JOIN centroautomotivo ca ON (cm.centroAutomotivo = ca.idCentro) INNER JOIN cliente cl ON (cm.cliente_id = idCliente) INNER JOIN usuario u ON (cl.usuario_idUsuario = u.idUsuario)";
$stm = $conexao->prepare($sql);
$stm->execute();
$coments = $stm->fetchAll(PDO::FETCH_ASSOC);
$total = 0;
if(count($coments)){
    foreach($coments as $row){
        //armazenar o total de registros da tabela para fazer a paginação
        $total = count($coments);
    }
}
?>
<?php 
$sql = "SELECT cm.*,ca.*,cl.*,u.* FROM comentario cm INNER JOIN centroautomotivo ca ON (cm.centroAutomotivo = ca.idCentro) INNER JOIN cliente cl ON (cm.cliente_id = idCliente) INNER JOIN usuario u ON (cl.usuario_idUsuario = u.idUsuario) WHERE ca.idCentro = ? ORDER BY cm.idComentario LIMIT $inicio,$maximo";
$stm = $conexao->prepare($sql);
$stm->bindValue(1, $idCentroAutomotivo);
$stm->execute();
$comments = $stm->fetchAll(PDO::FETCH_ASSOC);
?>