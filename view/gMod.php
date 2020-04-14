<?php
    session_start();
    $perfil = isset($_SESSION["perfil"]) ? ($_SESSION["perfil"]) : "";
    #Verifica perfil
        if($perfil != "Administrador"){
            header("location: ../index.php");
        }
    require_once '../includes/header.php';
    require_once '../dao/CarroDAO.php';
    $carroDAO = new CarroDAO();
    $montadoras = $carroDAO->listarAllMontadoras();
?>
<div class="container mb-5">
    <h1 class="text text-center">Gerenciar modelos</h1>
    <form action="#" method="post">
    <div class="row">
        <div class="col-sm">
            <label>Escolha a montadora</label>
            <select name="montadora" id="montadora" class="form-control">
                <?php
                foreach ($montadoras as $m) {
                    echo "<option value=\"{$m["idMontadora"]}\">";
                    echo $m["montadora"];
                    echo "</option>";
                }
                ?>
            </select>
            <input type="submit" name="mon" value="Consultar" class="btn btn-primary" style="margin-top: 10px;"/>
        </div>
    </div>
    </form>
    <h3 class="text text-center" style="margin-top: 50px;">Modelos</h3>
    <?php if(isset($_POST['mon'])){?>
    <div id="exibir">
        <?php $modelos = $carroDAO->findModeloByMontadora($_POST["montadora"]); ?>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Modelo</th>
                <th>Editar</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            foreach($modelos as $mods){
                echo "<tr>";
                    echo "<td>".$mods["modelo"]."</td>";
                    echo "<td>"."<a href=\"editModel.php?id={$mods['idModelo']}&m={$mods['modelo']}\" class=\"btn btn-warning\">Editar</a>"."</td>";
                echo "</tr>"; 
            }
            ?>
        </tbody>
    </table>
    </div>
    <?php } else {echo "Escolha uma montadora";}?>
</div>
<?php 
require_once '../includes/footer.php';
?>