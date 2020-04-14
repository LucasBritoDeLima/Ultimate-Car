<?php
session_start();
require_once '../includes/header.php';
require_once '../dao/CarroDAO.php';
$carroDAO = new CarroDAO();
$montadoras = $carroDAO->listarAllMontadoras();
?>
<div class="container mb-5">
    <h1 class="text-center text">Consultar Veículo</h1>
    <h6 class="text-center text">Selecione o seu veículo abaixo</h6>
</div>
<div class="container mb-5">
    <form method="post" action="carroConsulta.php">
        <div class="form-group">
            <div class="form-group">
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
        <div class="form-group">
            <div class="form-group">
                <label class="text">Modelo</label>
                <div id="load_modelo">
                    <select name="modelo" class="form-control" id="modelo" onmouseover="buscar_carro()">
                        <option>-- Selecione um --</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="form-group">
                <label for="inputEmail4">Carro</label>
                <div id="load_carro">
                    <select name="carro" class="form-control" id="carro" onmouseover="buscar_ano()" onchange="buscar_ano()">
                        <option>-- Selecione uma opção --</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="form-group">
                <label for="inputEmail4">Ano</label>
                <div id="load_ano">
                    <select name="ano" class="form-control" id="ano" onmouseover="buscar_motor()" onchange="buscar_motor()">
                        <option>-- Selecione uma opção --</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="form-group">
                <label for="inputEmail4">Motor</label>
                <div id="load_motor">
                    <select name="motor" class="form-control" id="motor" onmouseover="buscar_all()" onchange="buscar_all()">
                        <option>-- Selecione uma opção --</option>
                    </select>
                </div>
                <div id="load_key">
                </div>
            </div>
        </div>
        <center> <button type="submit" class="btn btn-primary">Pesquisar</button></center>
</div>

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
            var url = "../controller/ajax_id.php?carro=" + carro + "&ano=" + ano + "&motor=" + motor;
            $.get(url, function (dataReturn) {
                $('#load_key').html(dataReturn);
            });
        }
    }
</script>
<?php
require_once '../includes/footer.php';
?>