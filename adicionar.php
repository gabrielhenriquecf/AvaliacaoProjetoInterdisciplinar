<?php
include_once 'includes/header.php';
/*
session_start();
function session_checker()
{
    if (!isset($_SESSION['logado'])) {
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
                <!--
                <input type="text" name="descricao_pedido" id="descricao_pedido">
                0
                <label for="descricao_pedido">Descrição do pedido</label>
                -->
                <select name="descricao_pedido" id="descricao_pedido">
                    <option value="Brownie">Brownie</option>
                    <option value="Cookie">Cookie</option>
                    <option value="Cafe">Café</option>
                    <option value="Chocolate Quente">Chocolate Quente</option>
                    <option value="Cappucciono">Cappucciono</option>
                    <option value="Waffle">Waffle</option>
                    <option value="Milk Shake">Milk Shake</option>
                    <option value="Petit Gateau">Petit Gateau</option>
                    <option value="Baked Alaska">Baked Alaska</option>
                    <option value="Café na Casquinha">Café na Casquinha</option>
                    <option value="Chá Gelado">Chá Gelado</option>
                </select>
            </div>

            <div class="input-field col s12">
                <input type="text" name="estado" id="estado">
                <label for="estado">Estado</label>
            </div>

            <button type="submit" name="btn-cadastrar" class="btn green">Adicionar</button>
            <a href="sair.php" class="btn red">SAIR - Lista de Pedidos</a>

        </form>
    </div>
</div>

<?php
include_once 'includes/footer.php';
?>