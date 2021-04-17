<?php
include_once 'php_action/db_connect.php';
include_once 'includes/header.php';
include_once 'includes/headerlogin.php';

function session_checker()
{
    if (!isset($_SESSION['logadoAtendente']) || !isset($_SESSION['logadoCaixa'])) {
        header('Location: ../sistemadelogin/index.php');
        $_SESSION['mensagem'] = "Bem-vindo ao Sistema";
    }
}

session_checker();

?>

<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light"> Pedidos </h3>

        <table class="striped">
            <thead>
                <tr>
                    <th>Cliente:
                    <th>
                    <th>Mesa:
                    <th>
                    <th>Descrição:
                    <th>
                    <th>Atendente:
                    <th>
                    <th>Estado:
                    <th>
                </tr>
            </thead>

            <tbody>
                <?php
                $sql = "SELECT * FROM  pedidos";
                $resultado = mysqli_query($connect, $sql);


                if ($dados = mysqli_num_rows($resultado) > 0) :

                    while ($dados = mysqli_fetch_array($resultado)) :
                ?>
                        <tr>
                            <td><?php echo $dados['cliente']; ?>
                            <td>
                            <td><?php echo $dados['mesa']; ?>
                            <td>
                            <td><?php echo $dados['descricao_pedido']; ?>
                            <td>
                            <td><?php echo $dados['atendente']; ?>
                            <td>
                            <td><?php echo $dados['estado']; ?>
                            <td>
                        </tr>
                    <?php
                    endwhile;
                else :
                    ?>

                    <tr>
                        <td>-</td>
                        <td></td>
                        <td>Nenhum pedido existente</td>
                        <td></td>
                        <td>-</td>
                        <td></td>
                        <td>-</td>
                        <td></td>
                        <td>-</td>
                    </tr>

                <?php
                endif;
                ?>

            </tbody>
        </table>
        <br>
        <a href="adicionar.php" class="btn green">Adicionar pedido</a>
        <a href="php_action/sair.php" class="btn red">SAIR - Lista de Pedidos</a>
    </div>
</div>

<?php
include_once 'includes/footer.php';
?>