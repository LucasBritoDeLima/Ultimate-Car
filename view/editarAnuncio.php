<?php
session_start();
$idUsuario = isset($_SESSION["id"]) ? ($_SESSION["id"]) : '';
require_once '../controller/validaLogin.php';
require_once '../includes/header.php';
require_once '../dao/AnuncioDAO.php';
$idPeca = $_GET["idP"];
$anuncioDAO = new AnuncioDAO();
$anuncio = $anuncioDAO->listarAnuncioById($idPeca);
?>
<div class="container mb-5">
    <h3 class="text text-center">Criar Anúncio</h3>
    <form method="POST" action="../controller/editarAnuncioController.php" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $idPeca ?>" name="idP"/>
        <div class="row">
            <div class="col-sm">
                <label class="text dica">Título <span class="dicatext">Coloque um nome sugestivo ao anúncio</span></label>
                <input type="text" name="titulo" class="form-control" value="<?php echo $anuncio["titulo"] ?>" required>
            </div>
            <div class="col-sm">
                <label class="text dica">Preço <span class="dicatext">Coloque um preço que seja coerente com o produto</span></label>
                <input type="text" name="preco" class="form-control" value="<?php echo $anuncio["preco"] ?>" required>
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <label class="text dica">Categoria <span class="dicatext">Escolha a categoria que melhor se encaixa</span></label>
                <select name="categoria" class="form-control">
                    <option value="Mecânica em geral" <?php echo $anuncio["categoria"]=='Mecânica em geral'?'selected':''; ?>>Mecânica em geral</option>
                    <option value="Acessórios" <?php echo $anuncio["categoria"]=='Acessórios'?'selected':''; ?>>Acessórios</option>
                    <option value="Parte Elétrica" <?php echo $anuncio["categoria"]=='Parte Elétrica'?'selected':''; ?>>Parte Elétrica</option>
                    <option value="Outros" <?php echo $anuncio["categoria"]=='Outros'?'selected':''; ?>>Outros</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <label  class="text dica">Descrição <span class="dicatext">Coloque uma descrição detalhada do anúncio</span></label>
            <textarea class="form-control" name="descricao" rows="5" required><?php echo $anuncio["descricao"]?></textarea>
            </div>
        </div><br>
        <div class="row">
            <div class="col-sm">
                <label class="text">Foto 1</label>
                <input type="file" name="fotoUm"  class="form-control-file"  value=""/>
                <center>
                    <img src="../images/<?php echo $anuncio["fotoUm"]?>" class="img-thumbnail mgi" style="margin-top: 10px">
                </center>
            </div>
            <div class="col-sm">
                <label class="text">Foto 2</label>
                <input type="file" name="fotoDois"  class="form-control-file"  value=""/>
                <center>
                    <img src="../images/<?php echo $anuncio["fotoDois"]?>" class="img-thumbnail mgi" style="margin-top: 10px">
                </center>
            </div>
            <div class="col-sm">
                <label class="text">Foto 3</label>
                <input type="file" name="fotoTres"  class="form-control-file"  value=""/>
                <center>
                    <img src="../images/<?php echo $anuncio["fotoTres"]?>" class="img-thumbnail mgi" style="margin-top: 10px">
                </center>
            </div>
        </div><br>
        <p class="text-center">
            <button type="submit" class="btn btn-outline-primary" name="submit"><i class="fab fa-telegram-plane"></i>&nbsp;Anunciar</button></p>
    </form>
</div>
<?php 
require_once '../includes/footer.php';
?>
