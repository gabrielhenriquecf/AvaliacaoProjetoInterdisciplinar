<?php
session_start();
require_once 'db_connect.php';


if (isset($_POST['btn-pay'])) {
    $id = mysqli_escape_string($connect, $_POST['id']);

    //inserção no banco de dados
    $sql1 = "INSERT INTO pedidossalvos (cliente, mesa, descricao_pedido, atendente) SELECT cliente, mesa, descricao_pedido, atendente FROM pedidos WHERE id = '$id'  ";

    $sql2 = "DELETE FROM pedidos WHERE id = '$id' ";
    if (mysqli_query($connect, $sql1)) {
        if (mysqli_query($connect, $sql2)) {
            $_SESSION['mensagem'] = "Pedido pago com sucesso";
            header('Location: ../pedidosGerente.php');
        } else {
            $_SESSION['mensagem'] = "Erro ao pagar pedido";
            header('Location: ../pedidosGerente.php');
        }
    } else {
        $_SESSION['mensagem'] = "Erro ao pagar pedido";
        header('Location: ../pedidosGerente.php');
    }
}
