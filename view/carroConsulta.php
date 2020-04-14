<?php
session_start();
require_once '../includes/header.php';
?>
<?php
#Receber as variaveis do formulário
$montadora = isset($_POST["montadora"]) ? ($_POST["montadora"]) : "";
$modelo = isset($_POST["modelo"]) ? ($_POST["modelo"]) : "";
$carro = isset($_POST["carro"]) ? ($_POST["carro"]) : "";
$ano = isset($_POST["ano"]) ? ($_POST["ano"]) : "";
$motor = isset($_POST["motor"]) ? ($_POST["motor"]) : "";
$idCarro = isset($_POST["key_carro"]) ? ($_POST["key_carro"]) : "";

//Jogar pra consulta quem não definiu as variaveis do carro
if ($montadora == "" && $modelo == "" && $carro == "" && $ano = "" && $motor == "") {
    echo "<script>";
    echo "      window.alert('Escolha corretamente');";
    echo "</script>";
    header("location: formConsulta.php");
}
#pegando o carro
require_once '../dao/CarroDAO.php';
$carroDAO = new CarroDAO();
$carros = $carroDAO->obterInfo($carro, $ano, $motor);
?>
<div class="container mb-5">
    <h3 class="text text-center">Informações do carro<br> <?php echo $carros["nomeCarro"] . " - " . $carros["ano"] . " - " . $carros["motor"] ?></h3>
    <h4 class="text text-center">Especificações</h4>
    <div class="container mb-5 oleo arr">
        <hr>
        <div class="row">
            <div class="col-sm  text-center"><b>Viscosidade SAE Recomendada</b></div>
            <div class="col-sm text-center"><?php echo $carros["saeR"] ?></div>
        </div>
        <div class="row">
            <div class="col-sm  text-center"><b>Viscosidade SAE Alternativa</b></div>
            <div class="col-sm text-center"><?php echo $carros["saeA"] ?></div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm  text-center"><b>Especificação Americana (API)</b></div>
            <div class="col-sm  text-center"><?php echo $carros["api"] ?></div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm  text-center"><b>Especificação Europeia (ACEA)</b></div>
            <div class="col-sm  text-center"><?php echo $carros["acea"] ?></div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm  text-center"><b>Usar preferencialmente</b></div>
            <div class="col-sm  text-center"><?php echo $carros["tipoOleo"] ?></div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm  text-center"><b>Capacidade com filtro</b></div>
            <div class="col-sm  text-center"><?php echo $carros["capacidade"] ?> Litros</div>
        </div>
        <div class="row">
            <div class="col-sm text-center">
                <img src="../images/<?php echo $carros["foto"] ?>" class="img-fluid muda">
            </div>
        </div>
        <br>
    </div>
    <p class="text text-center">
        <a class="btn btn-warning" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
            <i class="fas fa-tint"></i>&nbsp;Filtros
        </a>
    </p>
    <div class="collapse" id="collapseExample">
        <div class="card card-body">
            <div class="row">
            <?php
            $filtros = $carroDAO->obterFiltro($idCarro);
            foreach ($filtros as $filtro) {
                ?>
                <div class="card" style="width: 18rem; margin-left: 10px; margin-top: 10px; margin-bottom: 10px;">
                    <img class="card-img-top" src="../images/<?php echo $filtro["foto"] ?>" alt="Imagem de capa do card">
                    <div class="card-body">
                        <p class="card-text">Marca: <?php echo $filtro["marcaFiltro"] ?><br>Código: <?php echo $filtro["cod"] ?><br>Tipo: <?php echo $filtro["tipoFiltro"]?></p>
                    </div>
                </div>
<?php } ?>
        </div>
        </div>
    </div><br>
    <p class="text text-center" style="margin-bottom: 10px;">
        <a class="btn btn-warning" data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample">
            <i class="fas fa-tint"></i>&nbsp;Óleo
        </a>
    </p>
    <div class="collapse" id="collapseExample2" style="margin-top: 10px;">
        
        <div class="card card-body">
            <div class="row">
            <?php
            $oleos = $carroDAO->obterOleo($idCarro);
            foreach ($oleos as $oleo) {
                ?>
                <div class="card" style="width: 18rem; margin-left: 10px; margin-top: 10px; margin-bottom: 10px;">
                    <img class="card-img-top" src="../images/<?php echo $oleo["foto"]?>" alt="Imagem de capa do card" style="width: 300px; height: 700px; object-fit: contain">
                    <div class="card-body">
                        <p class="card-text">Marca: <?php echo $oleo["marcaOleo"]?><br>Nome: <?php echo $oleo["nomeOleo"]?><br>API: <?php echo $oleo["apiOleo"]?><br>SAE: <?php echo $oleo["sae"]?><br>Tipo: <?php echo $oleo["tipoOleo"]?></p>
                    </div>
                </div>
            <?php } ?>
            </div>
        </div>
        </div>
    </div>
<?php
require_once '../includes/footer.php';
?>
