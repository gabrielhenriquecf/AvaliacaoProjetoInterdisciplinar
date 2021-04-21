<?php
include_once 'php_action/db_connect.php';
include_once 'includes/header.php';
include_once 'includes/headerlogin.php';

function session_checker()
{
    if (!isset($_SESSION['logadoGerente'])) {
        header('Location: ../sistemadelogin/index.php');
        $_SESSION['mensagem'] = "Bem-vindo ao Sistema";
    }
}
session_checker();


//Select
if (isset($_GET['id'])) {
    $id = mysqli_escape_string($connect, $_GET['id']);

    $sql = "SELECT * FROM pedidos WHERE id = '$id' ";
    $resultado = mysqli_query($connect, $sql);
    $dados = mysqli_fetch_array($resultado);
}
?>

<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light"> Editar Pedido </h3>

        <form action="php_action/update.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
            <div class="input-field col s12">
                <input type="text" name="cliente" id="cliente" value="<?php echo $dados['cliente']; ?>">
                <label for="cliente">Cliente</label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="mesa" id="mesa" value="<?php echo $dados['mesa']; ?>">
                <label for="mesa">Mesa</label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="descricao_pedido" id="descricao_pedido" value="<?php echo $dados['descricao_pedido']; ?>">
                <label for="descricao_pedido">Descrição do pedido</label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="atendente" id="atendente" value="<?php echo $dados['atendente']; ?>">
                <label for="atendente">Atendente</label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="estado" id="estado" value="<?php echo $dados['estado']; ?>">
                <label for="estado">Estado</label>
            </div>

            <button type="submit" name="btn-editar" class="btn green">Atualizar</button>
            <a href="pedidosGerente.php" class="btn">Voltar interface GERENTE</a>
            <a href="php_action/sair.php" class="btn red">SAIR - Lista de Pedidos</a>
        </form>
    </div>
</div>

<?php
include_once 'includes/footer.php';
?>