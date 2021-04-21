<?php
session_start();
require_once 'db_connect.php';

if (isset($_POST['btn-editar'])) {
    if (!$estado = filter_Input(INPUT_POST, 'estado', FILTER_VALIDATE_INT, array("options" => array("min_range" => 0, "max_range" => 9)))) {
        $_SESSION['mensagem'] = "Erro, campo estado inválido.";
        header('Location: ../pedidosGerente.php');
    } else {
        $cliente = mysqli_escape_string($connect, $_POST['cliente']);
        $mesa = mysqli_escape_string($connect, $_POST['mesa']);
        $descricao_pedido = mysqli_escape_string($connect, $_POST['descricao_pedido']);

        $atendente = mysqli_escape_string($connect, $_POST['atendente']);
        if ($atendente == "0")
            $atendente = "caixa";
        if ($atendente == "1")
            $atendente = "Gabriel";
        if ($atendente == "2")
            $atendente = "Bárbara";

        $id = mysqli_escape_string($connect, $_POST['id']);

        //inserção no banco de dados
        $sql = "UPDATE pedidos SET cliente = '$cliente', mesa = '$mesa', descricao_pedido = '$descricao_pedido', atendente = '$atendente', estado = '$estado' WHERE id = '$id' ";

        //$datahora = date('Y-m-d H:i:s');

        if (mysqli_query($connect, $sql)) {
            $_SESSION['mensagem'] = "Pedido atualizado com sucesso"; //funciona se em seguida SAIR - deslogar

            header('Location: ../pedidosGerente.php');
        } else {
            $_SESSION['mensagem'] = "Erro ao atualizar"; //funciona se em seguida SAIR - deslogar
            header('Location: ../pedidosGerente.php');
        }
    }
}
