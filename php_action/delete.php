<?php
session_start();
require_once 'db_connect.php';


if (isset($_POST['btn-deletar'])) {
    $id = mysqli_escape_string($connect, $_POST['id']);

    //inserção no banco de dados
    $sql = "DELETE FROM pedidos WHERE id = '$id' "; //DEPOIS ACRESCENTAR BOTÃO PARA PAGAR DIRETO, MESMA FORMA QUE APAGAR E COM CAIXA DE AVISO

    if (mysqli_query($connect, $sql)) {
        $_SESSION['mensagem'] = "Pedido deletado com sucesso";
        header('Location: ../pedidosCaixa.php');
    } else {
        $_SESSION['mensagem'] = "Erro ao excluir pedido";
        header('Location: ../pedidosCaixa.php');
    }
}
