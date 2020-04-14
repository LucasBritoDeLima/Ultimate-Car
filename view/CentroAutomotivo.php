<?php
session_start();
require_once '../includes/header.php';
//require_once '../controller/paginacaoPesquisaCentro.php';
?>
<?php
define("ROW_PER_PAGE",10);
require_once '../dao/conexao/Conexao.php';
	$pdo_conn = Conexao::getInstance();
?>
<div class="container mb-5">
    <h1 class="text text-center">Buscar Centros Automotivos</h1>
    <p class="text text-center">Encontre o centros automotivos de sua preferência</p>
<?php	
	$search_keyword = '';
	if(!empty($_POST['search']['keyword'])) {
		$search_keyword = $_POST['search']['keyword'];
	}
	$sql = 'SELECT * FROM centroautomotivo WHERE nomeFantasia LIKE :keyword OR razaoSocial LIKE :keyword OR servico LIKE :keyword ORDER BY idCentro DESC ';
	
	/* Pagination Code starts */
	$per_page_html = '';
	$page = 1;
	$start=0;
	if(!empty($_POST["page"])) {
		$page = $_POST["page"];
		$start=($page-1) * ROW_PER_PAGE;
	}
	$limit=" limit " . $start . "," . ROW_PER_PAGE;
	$pagination_statement = $pdo_conn->prepare($sql);
	$pagination_statement->bindValue(':keyword', '%' . $search_keyword . '%', PDO::PARAM_STR);
	$pagination_statement->execute();

	$row_count = $pagination_statement->rowCount();
	if(!empty($row_count)){
		$per_page_html .= "<div style='text-align:center;margin:20px 0px;'>";
		$page_count=ceil($row_count/ROW_PER_PAGE);
		if($page_count>1) {
			for($i=1;$i<=$page_count;$i++){
				if($i==$page){
					$per_page_html .= '<input type="submit" name="page" value="' . $i . '" class="btn btn-outline-primary" />';
				} else {
					$per_page_html .= '<input type="submit" name="page" value="' . $i . '" class="btn btn-outline-primary" style="margin: 5px 5px 5px"/>';
				}
			}
		}
		$per_page_html .= "</div>";
	}
	
	$query = $sql.$limit;
	$pdo_statement = $pdo_conn->prepare($query);
	$pdo_statement->bindValue(':keyword', '%' . $search_keyword . '%', PDO::PARAM_STR);
	$pdo_statement->execute();
	$result = $pdo_statement->fetchAll();
?>
<form name='frmSearch' action='' method='post'>
<div class="container">
    
    <div class="d-flex justify-content-center"><img src="../img/Logotipo.png" class="img-fluid"></div>
    <div class="d-flex justify-content-center"><div class="col-sm"><input type='text' name='search[keyword]' value="<?php echo $search_keyword; ?>" id='keyword' maxlength='25' class="form-control" style="margin-bottom: 10px;" placeholder="Busque pelo nome, seviço, ou endereço" ></div></div>
    <div class="d-flex justify-content-center" style="margin-bottom: 10px"><button type="submit" class="btn btn-primary text"><i class="fas fa-search"></i>&nbsp;Buscar</button></div>
</div>

    <center>
        <div class="row">
	<?php
	if(!empty($result)) { 
		foreach($result as $row) {
	?>
            <div class="col-sm" style="margin: 10px 10px 10px;">
                <div class="card" style="width: 18rem;">
                <img src="../controller<?php echo $row["foto"]?>" class="img-fluid card-img-top " width="150px" height="150px">
                <div class="card-body">
                    <h5 class="card-title text"><b><?php echo $row["nomeFantasia"]?></b></h5>
                <p class="card-text text"><b>Endereço: </b> <?php echo $row["logradouro"] ." - ".$row["numero"]." ".$row["bairro"],"<br>",$row["cidade"],"/",$row["estado"]?></p>
                <p class="card-text text"><b>Telefone: </b><?php echo $row["telefone"]?></p>
                <p class="card-text text"><b>Serviços: </b><?php echo $row["servico"]?></p>
                <a href="centro.php?id=<?php echo $row["idCentro"];?>" class="btn btn-outline-primary"><i class="fas fa-sign-in-alt"></i>&nbsp;Visitar página</a>
                </div>
                </div>
            </div><br>
    <?php
		}
	}
	?>
        </div>
    </center>
<?php echo $per_page_html; ?>
</form>
</div>
<?php 
require_once '../includes/footer.php';

