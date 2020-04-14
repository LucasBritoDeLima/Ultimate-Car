<?php
session_start();
$perfil = isset($_SESSION['perfil']) ? ($_SESSION['perfil']) : "";
if ($perfil != "Administrador") {
    echo "<script>";
    echo "         window.location.href = '../index.php';";
    echo "</script>";
}
require_once '../dao/CarroDAO.php';
require_once '../includes/header.php';
$carroDAO = new CarroDAO();
$montadoras = $carroDAO->listarAllMontadoras();
$filtros = $carroDAO->listarAllFiltro();
?>
<div class="container mb-5">
    <h3 class="text text-center">Vincular filtro a veículo</h3>
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
        </div><!-- div do carro-->
        <div class="col-sm">
            <h5 class="text text-center">Dados do Filtro</h5>
            <div class="row">
                <div class="col-sm">
                    <label>Marca</label>
                    <select name="marca" class="form-control" id="marca" onmouseover="buscar_tipo()" onchange="buscar_tipo()">
                        <?php
                        foreach ($filtros as $f) {
                            echo "<option value=\"{$f['marcaFiltro']}\">" . $f["marcaFiltro"] . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <label>Tipo de Filtro</label>
                    <div id="load_tipo">
                        <select name="tipo" id="tipo" class="form-control" onmouseover="buscar_cod()" onchange="buscar_cod()">
                            <option>Selecione uma opção</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <label>Código do filtro</label>
                    <div id="load_cod">
                        <select name="codfiltro" id="cod" class="form-control" onmouseover="buscar_key()" onchange="buscar_key()">
                            <option>Selecione uma opção</option>
                        </select>
                    </div>
                    <div id="load_filtro_key">
                    </div>
                </div>
            </div>
        </div><!-- div do filtro-->
    </div>
    <form method="post" action="../controller/vFV.php">
        <input type="hidden" name="rkey" id="rkey" value="">
        <input type="hidden" name="rkeyf" id="rkeyf" value="">
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
    function buscar_tipo() {
        var marca = $('#marca').val();
        if (marca) {
            var url = "../controller/ajax_buscar_tipo.php?marca=" + marca;
            $.get(url, function (dataReturn) {
                $('#load_tipo').html(dataReturn);
            });
        }
    }
</script>
<script>
    function buscar_cod() {
        var marca = $('#marca').val();
        var tipo = $('#tipo').val();
        if (marca && tipo) {
            var url = "../controller/ajax_buscar_cod.php?marca=" + marca + "&tipo=" + tipo;
            $.get(url, function (dataReturn) {
                $('#load_cod').html(dataReturn);
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
    function buscar_key() {
        var marca = $('#marca').val();
        var tipo = $('#tipo').val();
        var cod = $('#cod').val();
        if (marca && tipo && cod) {
            var url = "../controller/ajax_filtro_all.php?marca=" + marca + "&tipo=" + tipo + "&cod=" + cod;
            $.get(url, function (dataReturn) {
                $('#load_filtro_key').html(dataReturn);
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
        var keyf = document.getElementById("key_filtro").value;
        document.getElementById("rkeyf").value = keyf;
    }
</script>
<?php
require_once '../includes/footer.php';
?>