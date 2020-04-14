<?php
session_start();
require_once '../includes/header.php';
$perfil = isset($_SESSION["perfil"])?($_SESSION["perfil"]):"";
if($perfil != "Administrador"){
    header("location: ../index.php");
}
$idCentro = $_GET["idc"];
$idUser = $_GET["user"];
$idComment = $_GET["id"];
require_once '../dao/ComentarioDAO.php';
$comentarioDAO = new ComentarioDAO();
$comentario = $comentarioDAO->selecionarComentarioCentroU($idCentro, $idUser,$idComment);
?>
<div class="container mb-5">
    <h3 class="text text-center">Editar Comentário</h3>
    <p class="text text-center">Edite os comentários</p>
    <form method="post" action="../controller/editarComent.php">
        <input type="hidden" name="idcentro" value="<?php echo $idCentro?>">
        <input type="hidden" name="iduser" value="<?php echo $idUser?>">
        <input type="hidden" name="idComment" value="<?php echo $idComment?>">
        <div class="row">
            <label>Conte-nos sua história com essa empresa</label>
            <textarea id="comentario" name="comentario" rows="6" cols="40" maxlength="300" class="form-control" required><?php echo $comentario["comentario"]?></textarea>
        </div>       
        <div class="row">
            <label class="text" class="form-control">Nota</label>
            <select name="nota" class="form-control">
                <option>Selecione uma opção</option>
                <option value="1" <?=($comentario["nota"] == '1')?'selected':''?> >1</option>
                <option value="2" <?=($comentario["nota"] == '2')?'selected':''?> >2</option>
                <option value="3" <?=($comentario["nota"] == '3')?'selected':''?> >3</option>
                <option value="4" <?=($comentario["nota"] == '4')?'selected':''?> >4</option>
                <option value="5" <?=($comentario["nota"] == '5')?'selected':''?> >5</option>
            </select>
        </div>
        <div class="row" style="margin-top: 10px">
            <div class="col-sm"><p class="text text-center"><button type="submit" class="btn btn-primary"><i class="far fa-paper-plane"></i>&nbsp;Enviar</button></p>
            </div>
        </div>
    </form>
</div>
<?php
require_once '../includes/footer.php';
?>