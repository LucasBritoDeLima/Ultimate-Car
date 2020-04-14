<?php
    session_start();
    require_once '../includes/header.php'; 
    require_once '../dao/CarroDAO.php';
    $perfil = isset($_SESSION["perfil"])? ($_SESSION["perfil"]) : "";
    //Verifica o perfil do usuário
    $carroDAO = new CarroDAO();
    $montadoras = $carroDAO->listarAllMontadoras();
?>
<div class="container mb-5">
    <h1 class="text text-center">Gerenciar Montadoras</h1>
    <table class="table table-hover">
        <thead>
            <th scope="col">Montadora</th>
            <th scope="col">Editar</th>
            <th scope="col">Atualizar</th>
        </thead>
        <tbody>
            <?php foreach ($montadoras as $m) {
                echo "<tr>";
                echo "<td>".$m["montadora"]."</td>";
                echo "<td>"."<a href='editM.php?id={$m["idMontadora"]}' class='btn btn-warning'>Editar</a>"."</td>";
                echo "<td>"."<a href='../controller/delM.php?id={$m["idMontadora"]}' class='btn btn-danger'>Deletar</a>"."</td>";
                echo "</tr>";
            }?>
        </tbody>
    </table>
</div>
<?php 
require_once '../includes/footer.php';
?>