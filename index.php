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
                    <th>Nome:
                    <th>
                    <th>Sobrenome:
                    <th>
                    <th>E-mail:
                    <th>
                    <th>Idade:
                    <th>
                </tr>
            </thead>

            <tbody>
                <?php
                $sql = "SELECT * FROM  clientes";
                $resultado = mysqli_query($connect, $sql);


                if ($dados = mysqli_num_rows($resultado) > 0) :

                    while ($dados = mysqli_fetch_array($resultado)) :
                ?>
                        <tr>
                            <td><?php echo $dados['nome']; ?>
                            <td>
                            <td><?php echo $dados['sobrenome']; ?>
                            <td>
                            <td><?php echo $dados['email']; ?>
                            <td>
                            <td><?php echo $dados['idade']; ?>
                            <td>
                        </tr>
                    <?php
                    endwhile;
                else :
                    ?>

                    <tr>
                        <td>-</td>
                        <td></td>
                        <td>Nenhum pedido castrado</td>
                        <td></td>
                        <td>-</td>
                        <td>-</td>
                        <td></td>
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