<?php 
    require_once '../includes/header.php';
    require_once '../controller/validaLogin.php';
?>
    <div class="container mb-5">
        <div class="alert alert-success text" role="alert">
            Usuário Editado Com Sucesso!
        </div>
        <div class="d-flex justify-content-center">
        <div class="spinner-border text-info" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        </div>
        <h6 class="text text-center">Redirecionando para a página principal</h6>
<script type='text/JavaScript'>
    setTimeout(function () {
        window.location.href = '../index.php'; 
    }, 2000); 
</script>
    </div>
<?php 
require_once '../includes/footer.php';
?>

