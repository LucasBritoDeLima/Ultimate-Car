<?php
session_start();
require_once '../includes/header.php';
?>
<div class="container mb-5">
    <h3 class="text text-center">Peças</h3>
    <p class="text text-center">Anuncie aqui algumas peças</p>
    <?php
    define("ROW_PER_PAGE", 10);
    require_once '../dao/conexao/Conexao.php';
    $pdo_conn = Conexao::getInstance();
    ?>
    <?php
    $search_keyword = '';
    if (!empty($_POST['search']['keyword'])) {
        $search_keyword = $_POST['search']['keyword'];
    }
    $sql = 'SELECT * FROM anuncio WHERE preco LIKE :keyword OR titulo LIKE :keyword OR categoria LIKE :keyword ORDER BY idAnuncio DESC ';

    /* Pagination Code starts */
    $per_page_html = '';
    $page = 1;
    $start = 0;
    if (!empty($_POST["page"])) {
        $page = $_POST["page"];
        $start = ($page - 1) * ROW_PER_PAGE;
    }
    $limit = " limit " . $start . "," . ROW_PER_PAGE;
    $pagination_statement = $pdo_conn->prepare($sql);
    $pagination_statement->bindValue(':keyword', '%' . $search_keyword . '%', PDO::PARAM_STR);
    $pagination_statement->execute();

    $row_count = $pagination_statement->rowCount();
    if (!empty($row_count)) {
        $per_page_html .= "<div style='text-align:center;margin:20px 0px;'>";
        $page_count = ceil($row_count / ROW_PER_PAGE);
        if ($page_count > 1) {
            for ($i = 1; $i <= $page_count; $i++) {
                if ($i == $page) {
                    $per_page_html .= '<input type="submit" name="page" value="' . $i . '" class="btn btn-outline-primary" />';
                } else {
                    $per_page_html .= '<input type="submit" name="page" value="' . $i . '" class="btn btn-outline-primary" style="margin: 5px 5px 5px"/>';
                }
            }
        }
        $per_page_html .= "</div>";
    }

    $query = $sql . $limit;
    $pdo_statement = $pdo_conn->prepare($query);
    $pdo_statement->bindValue(':keyword', '%' . $search_keyword . '%', PDO::PARAM_STR);
    $pdo_statement->execute();
    $result = $pdo_statement->fetchAll();
    ?>
    <form name='frmSearch' action='' method='post'>
        <div class="container">

            <div class="d-flex justify-content-center"><img src="../img/Pecas.png" class="img-fluid"></div>
            <div class="d-flex justify-content-center"><div class="col-sm"><input type='text' name='search[keyword]' value="<?php echo $search_keyword; ?>" id='keyword' maxlength='25' class="form-control" style="margin-bottom: 10px;" placeholder="Busque pela peça, categoria ou preço!" ></div></div>
            <div class="d-flex justify-content-center" style="margin-bottom: 10px"><button type="submit" class="btn btn-primary text"><i class="fas fa-search"></i>&nbsp;Buscar</button></div>
        </div>
        <!--Card horizontal-->
        <div class="row">
            <?php
            if (!empty($result)) {
                foreach ($result as $row) {
                    ?>
                <div class="col-md-4 col-sm-6" style="margin-bottom: 10px;">
                        <div class="boxing">
                            <img class="img-responsive" src="../images/<?php echo $row["fotoUm"] ?>" style="width: 300px; height: 200px; object-fit: cover;">
                            <div class="box-content">
                                <div class="content">
                                    <h3 class="title"><?php echo $row["titulo"] ?></h3>
                                    <span class="post">R$<?php echo $row["preco"] ?></span><br>
                                    <span class="post"><?php echo $row["categoria"] ?></span>
                                    <ul class="icon">
                                        <li><a href="verPeca.php?id=<?php echo $row["idAnuncio"] ?>"><i class="far fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>                 
                    <?php
                }
            }
            ?>
        </div>
        <!--Card horizontal-->
        <?php echo $per_page_html; ?>
    </form>
    <!--Resultados da pesquisa-->

</div>
<?php
require_once '../includes/footer.php';
