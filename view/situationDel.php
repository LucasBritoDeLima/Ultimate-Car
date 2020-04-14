<?php 
    require_once '../includes/header.php';
    require_once '../controller/validaLogin.php';
?>
<?php 
session_start();
?>
    <div class="container mb-5">
        <div class="alert alert-success text" role="alert">
            Usuário Excluido com sucesso
        </div>
        <div class="d-flex justify-content-center">
        <div class="spinner-border text-info" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        </div>
        <?php session_destroy() ?>
        <h6 class="text text-center">Redirecionando para a Página inicial</h6>
<script type='text/JavaScript'>
    setTimeout(function () {
        window.location.href = '../index.php'; 
    }, 2000); 
</script>
    </div>
<?php 
require_once '../includes/footer.php';
?>

