<?php
// Conexão
require_once 'php_action/db_connect_login.php';

// Sessão
session_start();

// Botão enviar
if (isset($_POST['btn-entrar'])) {
  //array erros
  $erros = array();
  $login = mysqli_escape_string($connect, $_POST['login']);
  $senha = mysqli_escape_string($connect, $_POST['senha']);

  if (empty($login) or empty($senha)) {
    $erros[] = "<li> O campo login/senha precisa ser preenchido </li>";
  } else {
    $sql = "SELECT login FROM usuarios WHERE login = '$login'";
    $resultado = mysqli_query($connect, $sql);

    if (mysqli_num_rows($resultado) > 0) {
      $senha = md5($senha);
      $sql = "SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha' ";
      $resultado = mysqli_query($connect, $sql);

      if (mysqli_num_rows($resultado) == 1) {
        $dados = mysqli_fetch_array($resultado);
        $_SESSION['logado'] = true;
        $_SESSION['id_usuario'] = $dados['id'];
        header('Location: pedidos.php');
      } else {
        $erros[] = " <li> Usuário e senha não conferem </li> ";
      }
    } else {
      $erros[] = "<li> Usuário não existe. </li>";
    }
  }
}

?>
<html>

<head>
  <meta charset="utf-8">
  <title> Sistema de Login</title>


  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>