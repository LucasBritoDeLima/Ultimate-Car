<?php
session_start();
require_once '../includes/header.php';
require_once '../dao/conexao/Conexao.php';
$termo = isset($_GET['termo']) ? ($_GET['termo']) : "";
$pdo = Conexao::getInstance();
$limite = 2;
$sql = "SELECT * FROM oleo";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$total_resultados = $stmt->rowCount();
$total_paginas = ceil($total_resultados / $limite);
//----------------------------------------------
if (!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
}
//----------------------------------------------
if (empty($termo)):
else:
    $limite_inicial = ($page - 1) * $limite;
    $sql = "SELECT * FROM oleo WHERE marcaOleo LIKE :keyword or nomeOleo LIKE :keyword or tipoOleo LIKE :keyword or sae LIKE :keyword or apiOleo LIKE :keyword ORDER BY idOleo DESC LIMIT {$limite_inicial},{$limite}";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':keyword', '%' . $termo . '%');
    $stmt->execute();
    $oleos = $stmt->fetchAll(PDO::FETCH_OBJ);
endif;
?>
<div class="container mb-5">
    <h3 class="text text-center">Pesquisar Óleo</h3>
    <br>
    <div>
        <center>
            <img src="../img/oleo.png"/>
        </center>
        <form action="pesquisarOleo.php" method="get">
            <input type="text" class="form-control" name="termo">
            <center><input type="submit" class="btn btn-primary" style="margin-top: 5px" name="enviar"></center>
        </form>
    </div>

    <div class="container mb-5" style="margin-top: 20px;">
        <div class="row">
            <?php if (!empty($oleos)): ?>
                <?php foreach ($oleos as $o): ?>
                    <div class="col-md-4 col-sm-6" style="margin-bottom: 10px;">
                        <div class="boxing">
                            <img class="img-responsive" src="../images/<?= $o->foto ?>" style="width: 300; height: 200px; object-fit: contain;">
                            <div class="box-content">
                                <div class="content">
                                    <h3 class="title"><?= $o->nomeOleo ?> - <?= $o->marcaOleo ?></h3>
                                    <span class="post"><?= $o->apiOleo; $o->sae ?></span>
                                    <ul class="icon">
                                        <li><a href="verOleo.php?id=<?= $o->idOleo ?>"><i class="fa fa-search"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <h3 class="text-center text-primary"></h3>
            <?php endif; ?>
        </div>
    </div>
    
        <?php if (empty($oleos)) {
        } else { ?>
        <nav aria-label="Page navigation example">
        <ul class="pagination">
        <?php for ($page = 1; $page <= $total_paginas; $page++): ?>
        <li class="page-item"><a class="page-link" href='<?php echo "?termo=$termo&page=$page"; ?>' class="links"><?php echo $page; ?></a></li>
        <?php endfor; ?>
        </ul>
        </nav>
        <?php } ?>

</div>
<?php
require_once '../includes/footer.php';
?>