<?php
session_start();
require_once 'db_connect.php';


if (isset($_POST['btn-editar'])) {
    if (!$idade = filter_Input(INPUT_POST, 'idade', FILTER_VALIDATE_INT, array("options" => array("min_range"=>1, "max_range"=>128)))) {
        $_SESSION['mensagem'] = "Erro, campo idade inválido.";
        header('Location: ../index.php');

    } else {
        $nome = mysqli_escape_string($connect, $_POST['nome']);
        $sobrenome = mysqli_escape_string($connect, $_POST['sobrenome']);
        $email = mysqli_escape_string($connect, $_POST['email']);
        $idade = mysqli_escape_string($connect, $_POST['idade']);

        $id = mysqli_escape_string($connect, $_POST['id']);

        //inserção no banco de dados
        $sql = "UPDATE clientes SET nome = '$nome', sobrenome = '$sobrenome', email = '$email', idade = '$idade' WHERE id = '$id' ";
        
        if(mysqli_query($connect, $sql)) {
            $_SESSION['mensagem'] = "Cliente atualizado com sucesso";
            header('Location: ../index.php');
        }
        else {
            $_SESSION['mensagem'] = "Erro ao atualizar";
            header('Location: ../index.php');
        }
    }
}