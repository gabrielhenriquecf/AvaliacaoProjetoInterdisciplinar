<?php
include_once 'php_action/db_connect.php';
include_once 'includes/header.php';



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
                            <td><a href="editar.php?id=<?php echo $dados['id']; ?>" class="btn-floating orange"><i class="material-icons">edit</i></a>
                            <td>

                            <td><a href="#modal<?php echo $dados['id']; ?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</i></a>
                            <td>

                                <!-- Modal Structure -->
                                <div id="modal<?php echo $dados['id']; ?>" class="modal">
                                    <div class="modal-content">
                                        <h4>Atenção!</h4>
                                        <p>Favor, confirmar se deseja excluir esse pedido.</p>
                                    </div>

                                    <div class="modal-footer">
                                        <form action="php_action/delete.php" method="POST">
                                            <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
                                            <button type="submit" name="btn-deletar" class="btn red">Sim, quero excluir.</button>

                                            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
                                        </form>
                                    </div>
                                </div>
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
        <a href="adicionar.php" class="btn">Adicionar pedido</a>
        <a href="index.php" class="btn green">SAIR - Lista de Pedidos</a>
    </div>
</div>

<?php
include_once 'includes/footer.php';
?>