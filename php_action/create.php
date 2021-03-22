<?php
session_start();
require_once 'db_connect.php';



if (isset($_POST['btn-cadastrar'])) {
    if (!$estado = filter_Input(INPUT_POST, 'estado', FILTER_VALIDATE_INT, array("options" => array("min_range" => 0, "max_range" => 9)))) {
        $_SESSION['mensagem'] = "Erro, campo estado inválido.";
        header('Location: ../index.php');
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

        $estado = mysqli_escape_string($connect, $_POST['estado']);

        //inserção no banco de dados

        $sql = "INSERT INTO pedidos (cliente, mesa, descricao_pedido, atendente, estado) VALUES ('$cliente', '$mesa', '$descricao_pedido', '$atendente', '$estado')";

        if (mysqli_query($connect, $sql)) {
            $_SESSION['mensagem'] = "Pedido cadastrado com sucesso";
            header('Location: ../index.php');
        } else {
            $_SESSION['mensagem'] = "Erro no cadastro";
            header('Location: ../index.php');
        }
    }
}
