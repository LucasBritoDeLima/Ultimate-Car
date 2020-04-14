<?php
session_start();
$idUsuario = isset($_SESSION["idUsuario"]) ? ($_SESSION["idUsuario"]) : '';
require_once '../controller/validaLogin.php';
require_once '../includes/header.php';
?>
<div class="container mb-5">
    <h3 class="text text-center">Criar Anúncio</h3>
    <form method="POST" action="../controller/criarAnuncioController.php" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $idUsuario ?>" name="id"/>
        <div class="row">
            <div class="col-sm">
                <label class="text dica">Título<span class="dicatext">Coloque um nome sugestivo ao anúncio</span></label>
                <input type="text" name="titulo" class="form-control" required>
            </div>
            <div class="col-sm">
                <label class="text dica">Preço <span class="dicatext">Coloque um preço que seja coerente com o produto</span></label>
                <input type="text" name="preco" class="form-control" required>
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <label class="text dica">Categoria <span class="dicatext">Escolha a categoria que melhor se encaixa</span></label>
                <select name="categoria" class="form-control">
                    <option value="Mecânica em geral">Mecânica em geral</option>
                    <option value="Acessórios">Acessórios</option>
                    <option value="Parte Elétrica">Parte Elétrica</option>
                    <option value="Outros">Outros</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <label  class="text dica">Descrição <span class="dicatext">Coloque uma descrição detalhada do anúncio</span></label>
            <textarea class="form-control" name="descricao" rows="5" required></textarea>
            </div>
        </div><br>
        <div class="row">
            <div class="col-sm">
                <label class="text">Foto1</label>
                <input type="file" name="foto1"  class="form-control-file" required="required" value=""/> 
            </div>
            <div class="col-sm">
                <label class="text">Foto2</label>
                <input type="file" name="foto2"  class="form-control-file" required="required" value=""/>
            </div>
            <div class="col-sm">
                <label class="text">Foto3</label>
                <input type="file" name="foto3"  class="form-control-file" required="required" value=""/>
                
            </div>
        </div><br>
        <p class="text-center">
            <button type="submit" class="btn btn-outline-primary" name="submit"><i class="fab fa-telegram-plane"></i>&nbsp;Anunciar</button></p>
    </form>
</div>
<?php 
require_once '../includes/footer.php';
?>
