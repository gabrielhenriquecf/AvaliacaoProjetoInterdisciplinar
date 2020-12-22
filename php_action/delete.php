<?php
session_start();
require_once 'db_connect.php';


if (isset($_POST['btn-deletar'])) {
    $id = mysqli_escape_string($connect, $_POST['id']);

    //inserção no banco de dados
    $sql = "DELETE FROM clientes WHERE id = '$id' ";
    
    if(mysqli_query($connect, $sql)) {
        $_SESSION['mensagem'] = "Cliente deletado com sucesso";
        header('Location: ../index.php');
    }
    else {
        $_SESSION['mensagem'] = "Erro ao excluir";
        header('Location: ../index.php');
    }
}