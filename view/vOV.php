<?php
session_start();
$perfil = isset($_SESSION["perfil"]) ? ($_SESSION["perfil"]) : "";
if ($perfil != "Administrador") {
    echo "<script>";
    echo "          window.location.href = '../index.php';";
    echo "</script>";
}
require_once '../includes/header.php';
require_once '../dao/CarroDAO.php';
$carroDAO = new CarroDAO();
$montadoras = $carroDAO->listarAllMontadoras();
$oleos = $carroDAO->listarAllOleo();
?>
<div class="container mb-5">
    <h3 class="text text-center">Vincular óleo ao carro</h3><br/>
    <div class="row">
        <div class="col-sm">
            <h5 class="text text-center">Dados do veículo</h5>
            <div class="row">
                <div class="col-sm">
                    <label class="text">Montadora</label>
                    <select name="montadora" class="form-control" id="montadora" onmouseover="buscar_modelo()" onchange="buscar_modelo()">
                        <?php
                        foreach ($montadoras as $m) {
                            echo "<option value=\"{$m["idMontadora"]}\">";
                            echo $m["montadora"];
                            echo "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <label class="text">Modelo</label>
                    <div id="load_modelo">
                        <select name="modelo" class="form-control" id="modelo" onmouseover="buscar_carro()">
                            <option>-- Selecione um --</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <label class="text">Carro</label>
                    <div id="load_carro">
                        <select name="carro" class="form-control" id="carro" onmouseover="buscar_ano()" onchange="buscar_ano()">
                            <option>-- Selecione uma opção --</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <label class="text">Ano</label>
                    <div id="load_ano">
                        <select name="ano" class="form-control" id="ano" onmouseover="buscar_motor()" onchange="buscar_motor()">
                            <option>-- Selecione uma opção --</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <label>Motor</label>
                    <div id="load_motor">
                        <select name="motor" class="form-control" id="motor" onmouseover="buscar_all()" onchange="buscar_all()">
                            <option>-- Selecione uma opção --</option>
                        </select>
                    </div>
                    <div id="load_key">

                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm">
            <h5 class="text text-center">Dados do óleo</h5>
            <div class="row">
                <div class="col-sm">
                    <label>Marca</label>
                    <select name="marca" class="form-control" id="marca" onmouseover="buscar_oleo()" onchange="buscar_oleo()">
                        <?php
                        foreach ($oleos as $o) {
                            echo "<option value=\"{$o['marcaOleo']}\">".$o["marcaOleo"]."</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <label>Óleo</label>
                    <div id="load_oleo">
                        <select name="oleo" id="oleo" class="form-control" onmouseover="buscar_sae()" onchange="buscar_sae()">
                            <option>Selecione uma opção</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <label>Viscosidade SAE</label>
                    <div id="load_sae">
                        <select name="sae" id="sae" class="form-control" onmouseover="buscar_all_oleo()" onchange="buscar_all_oleo()">
                            <option>Selecione uma opção</option>
                        </select>
                    </div>
                    <div id="load_oleo_key">
                    </div>
                </div>
            </div>
        </div>
    </div><!-- Fim da div class row-->
    <form method="post" action="../controller/vOV.php">
        <input type="hidden" name="rkey" id="rkey" value="">
        <input type="hidden" name="rkeyo" id="rkeyo" value="">
        <br>
        <center>
            <input type="submit" value="Vincular" class="btn btn-primary">
        </center>
    </form>
</div>
<script>
    function buscar_modelo() {
        var montadora = $('#montadora').val();
        if (montadora) {
            var url = "../controller/ajax_buscar_modelo.php?montadora=" + montadora;
            $.get(url, function (dataReturn) {
                $('#load_modelo').html(dataReturn);
            });
        }
    }
</script>
<script>
    function buscar_oleo(){
        var marca = $('#marca').val();
        if (marca){
            var url = "../controller/ajax_buscar_oleo.php?marca=" + marca;
            $.get(url, function(dataReturn) {
                $('#load_oleo').html(dataReturn);
            });
        }
    }
</script>
<script>
    function buscar_sae(){
        var oleo = $('#oleo').val();
        if (oleo){
            var url = "../controller/ajax_buscar_sae.php?oleo=" + oleo;
            $.get(url, function(dataReturn){
               $('#load_sae').html(dataReturn); 
            });
        }
    }
</script>
<script>
    function buscar_all_oleo() {
        var marca = $('#marca').val();
        var oleo = $('#oleo').val();
        var sae = $('#sae').val();
        if (marca && oleo && sae) {
            var url = "../controller/ajax_buscar_oleoAll.php?marca=" + marca + "&oleo=" + oleo + "&sae=" + sae;
            $.get(url, function (dataReturn) {
                $('#load_oleo_key').html(dataReturn);
            });
        }
    }
</script>
<script>
    function buscar_carro() {
        var modelo = $('#modelo').val();
        if (modelo) {
            var url = "../controller/ajax_buscar_carro.php?modelo=" + modelo;
            $.get(url, function (dataReturn) {
                $('#load_carro').html(dataReturn);
            });
        }
    }
</script>
<script>
    function buscar_ano() {
        var carro = $('#carro').val();
        if (carro) {
            var url = "../controller/ajax_buscar_ano.php?carro=" + carro;
            $.get(url, function (dataReturn) {
                $('#load_ano').html(dataReturn);
            });
        }
    }
</script>
<script>
    function buscar_motor() {
        var ano = $('#ano').val();
        if (ano) {
            var url = "../controller/ajax_buscar_motor.php?ano=" + ano;
            $.get(url, function (dataReturn) {
                $('#load_motor').html(dataReturn);
            });
        }
    }
</script>
<script>
    function buscar_all() {
        var carro = $('#carro').val();
        var ano = $('#ano').val();
        var motor = $('#motor').val();
        if (carro && ano && motor) {
            var url = "../controller/ajax_buscar_all.php?carro=" + carro + "&ano=" + ano + "&motor=" + motor;
            $.get(url, function (dataReturn) {
                $('#load_key').html(dataReturn);
            });
        }
    }
</script>
<script>
    function copiaValor() {
        var key = document.getElementById("key").value;
        document.getElementById("rkey").value = key;
    }
    function copiaValor2() {
        var keyo = document.getElementById("key_oleo").value;
        document.getElementById("rkeyo").value = keyo;
    }
</script>
<?php
require_once '../includes/footer.php';
?>
