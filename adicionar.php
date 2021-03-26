<?php
include_once 'includes/header.php';
/*
session_start();
function session_checker()
{
    if (!isset($_SESSION['login'])) {
        header('Location: ../index.php');
        exit();
    }
}
session_checker();
*/

?>

<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light"> Novo Pedido </h3>

        <form action="php_action/create.php" method="POST">
            <div class="input-field col s12">
                <input type="text" name="cliente" id="cliente">
                <label for="cliente">Cliente</label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="mesa" id="mesa">
                <label for="mesa">Mesa</label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="atendente" id="atendente">
                <label for="atendente">Atendente</label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="descricao_pedido" id="descricao_pedido">
                <label for="descricao_pedido">Descrição do pedido</label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="estado" id="estado">
                <label for="estado">Estado</label>
            </div>

            <button type="submit" name="btn-cadastrar" class="btn">Cadastrar</button>
            <a href="index.php" class="btn green">Lista de Pedidos</a>

        </form>
    </div>
</div>

<?php
include_once 'includes/footer.php';
?>