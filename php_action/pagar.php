<?php
session_start();
require_once 'db_connect.php';


if (isset($_POST['btn-pagar'])) {
    $id = mysqli_escape_string($connect, $_POST['id']);

    //inserção no banco de dados




    $sql1 = "INSERT INTO pedidossalvos (cliente, mesa, descricao_pedido, atendente) VALUES ('cliente', 'mesa', 'descricao_pedido', 'atendente')";
    /*   
    INSERT INTO table2
    (column_name1, column_name2, ...)
SELECT column_name1, column_name2, ...
FROM table1;
$datetime = date();
$sql = "INSERT INTO pedidosSALVOS (cliente, mesa, descricao_pedido, atendente, ESTE  date) VALUES ('$cliente', '$mesa', '$descricao_pedido', '$atendente', ESTE  '$datetime')";
*/
    if (mysqli_query($connect, $sql1)) {
        $_SESSION['mensagem'] = "Pedido pago com sucesso";
        header('Location: ../pedidosCaixa.php');
    } else {
        $_SESSION['mensagem'] = "Erro ao excluir pedido";
        header('Location: ../pedidosCaixa.php');
    }
    /*
    $sql2 = "DELETE FROM pedidos WHERE id = '$id' "; //DEPOIS ACRESCENTAR BOTÃO PARA PAGAR DIRETO, MESMA FORMA QUE APAGAR E COM CAIXA DE AVISO

    if (mysqli_query($connect, $sql2)) {
        $_SESSION['mensagem'] = "Pedido pago com sucesso";
        header('Location: ../pedidosCaixa.php');
    } else {
        $_SESSION['mensagem'] = "Erro ao excluir pedido";
        header('Location: ../pedidosCaixa.php');
    }
*/
}
