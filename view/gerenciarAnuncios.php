<?php
session_start();
require_once '../controller/validaLogin.php';
require_once '../dao/UsuarioDAO.php';
require_once '../dao/AnuncioDAO.php';
$usuarioDAO = new UsuarioDAO();
$idUsuario = $_SESSION["idUsuario"];
$perfil = $_SESSION["perfil"];
$idCentro = isset($_SESSION["centroautomotivo_idCentro"])? ($_SESSION["centroautomotivo_idCentro"]): "";
$clientes = $usuarioDAO->listarUsuarioById($idUsuario);
$anuncioDAO = new AnuncioDAO();
if($perfil == "Cliente"){
    $anuncios = $anuncioDAO->listarAnuncio($idUsuario);
}
else{
    $anuncios = $anuncioDAO->listarAnuncioCentroAutomotivo($idCentro); 
}
?>
<?php
require_once '../includes/header.php';
?>
<div class="container mb-5">
    <h4 class="text text-center">Gerenciar anúncios</h4>
    <?php
    if (count($anuncios) <= 0){
        echo "<h5 class=\"text text-center\" style=\" color: #ff253a;\">"."Não há anúncios disponíveis, comece criando um agora mesmo"."</h5>";
    }
    else{
    foreach ($anuncios as $anuncio) {
        ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 mt-3">
                        <div class="card">
                            <div class="card-horizontal">
                                <div class="img-square-wrapper">
                                    <img class="img-fluid" src="../images/<?php echo $anuncio["fotoUm"]?>" alt="Imagem do anuncio" style="width: 300px; height: 200px; object-fit: scale-down">
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title text"><center><?php echo $anuncio["titulo"]?></center></h4>
                                    <p class="card-text"></p>
                                    <p class="card-text text">
                                    <h5 class="text text-right"><?php echo "R$ " . str_replace(".", ",", $anuncio["preco"]) ?></h5></p>
                                <p class="card-text text-center"><br>
                                    <a class="btn btn-outline-primary" href="editarAnuncio.php?id=<?php echo $idUsuario?>&idP=<?php echo $anuncio["idAnuncio"]?>" role="button" style="float:bottom; margin-right: 5px; margin-bottom: 5px;"><i class="far fa-edit"></i>&nbsp;Editar</a>
                                    <a class="btn btn-outline-danger" href="../controller/excluirAnuncioController.php?id=<?php echo $anuncio["idAnuncio"]?>&perfil=<?php echo $perfil;?>" role="button" style="float:bottom; margin-right: 5px; margin-bottom: 5px;" onclick="return confirm('Está certo disso?');"><i class="fas fa-trash"></i>&nbsp;Excluir</a>
                                    </p>
                                </div>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted" style="float: left;"><?php echo date('d/m/Y', strtotime($anuncio["dataCadastro"])) ?></small>
                                <small class="text-muted" style="float: right;"><a href="verPeca.php?id=<?php echo $anuncio["idAnuncio"]?>">Ir para Anuncio&gt;&gt;</a></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <?php } }?>
</div>
<?php
require_once '../includes/footer.php';
?>

