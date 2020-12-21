<?php
session_start();
require_once 'db_connect.php';


if (isset($_POST['btn-cadastrar'])) {
    $nome = mysqli_escape_string($connect, $_POST['nome']);
    $sobrenome = mysqli_escape_string($connect, $_POST['sobrenome']);
    $email = mysqli_escape_string($connect, $_POST['email']);
    $idade = mysqli_escape_string($connect, $_POST['idade']);

    //inserção no banco de dados
    $sql = "INSERT INTO clientes (nome, sobrenome, email, idade) VALUES ('$nome', '$sobrenome', '$email', '$idade')";
    
    if(mysqli_query($connect, $sql)){
        $_SESSION['mensagem'] = "Cliente cadastrado com sucesso";
        header('Location: ../index.php');
    }
    else{
        $_SESSION['mensagem'] = "Erro no cadastro";
        header('Location: ../index.php');
    }
}