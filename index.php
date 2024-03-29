<?php
include_once 'includes/headerlogin.php';
include_once 'includes/message.php';
include_once 'php_action/db_connect.php';
include_once 'includes/header.php';
?>

<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light"> Pedidos </h3>

        <table class="striped">
            <thead>
                <tr>
                    <th>
                        Cliente:
                    <th>
                    <th>
                        Mesa:
                    <th>
                    <th>
                        Descrição:
                    <th>
                    <th>
                        Atendente:
                    <th>
                    <th>
                        Estado:
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
                            <td>
                                <?php echo $dados['cliente']; ?>
                            <td>
                            <td>
                                <?php echo $dados['mesa']; ?>
                            <td>
                            <td>
                                <?php echo $dados['descricao_pedido']; ?>
                            <td>
                            <td>
                                <?php echo $dados['atendente']; ?>
                            <td>
                            <td>
                                <?php echo $dados['estado']; ?>
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
        <h6>Para adicionar pedido e mais - Efetue <strong>login</strong></h6>
    </div>
</div>

<?php
include_once 'includes/footer.php';
include_once 'includes/footerlogin.php';
?>