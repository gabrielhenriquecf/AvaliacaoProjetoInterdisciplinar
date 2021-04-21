<?php
// Conexão
require_once 'php_action/db_connect_login.php';

// Sessão
session_start();

// Botão enviar
if (isset($_POST['btn-entrar'])) {
  //array erros
  $erros = array();
  $login = mysqli_escape_string($connectUser, $_POST['login']);
  $senha = mysqli_escape_string($connectUser, $_POST['senha']);


  if (empty($login) or empty($senha)) {
    $erros[] = "<li> O campo login/senha precisa ser preenchido </li>";
  } else {
    $sql = "SELECT login FROM usuarios WHERE login = '$login'";
    $resultado = mysqli_query($connectUser, $sql);

    if (mysqli_num_rows($resultado) > 0) {
      $senha = md5($senha); //MD5 SENHA
      $sql = "SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha' ";
      $resultado = mysqli_query($connectUser, $sql);

      //login ATENDENTE
      if (mysqli_num_rows($resultado) == 1) {
        $dados = mysqli_fetch_array($resultado);
        $_SESSION['logadoAtendente'] = true;
        $_SESSION['nome_atendente'] = $dados['nome'];
        header('Location: pedidosAtendente.php');
      } else {
        $erros[] = " <li> Usuário e senha não conferem </li> ";
      }
    } else {

      $sql = "SELECT login FROM caixa WHERE login = '$login'";
      $resultado = mysqli_query($connectUser, $sql);

      //login CAIXA
      if (mysqli_num_rows($resultado) > 0) {
        $senha = md5($senha);
        $sql = "SELECT * FROM caixa WHERE login = '$login' AND senha = '$senha' ";
        $resultado = mysqli_query($connectUser, $sql);

        if (mysqli_num_rows($resultado) == 1) {
          $dados = mysqli_fetch_array($resultado);
          $_SESSION['logadoCaixa'] = true;
          $_SESSION['nome_caixa'] = $dados['nome'];
          header('Location: pedidosCaixa.php');
        } else {
          $erros[] = " <li> Usuário e senha não conferem </li> ";
        }
      } else {

        $sql = "SELECT login FROM gerente WHERE login = '$login'";
        $resultado = mysqli_query($connectUser, $sql);

        if (mysqli_num_rows($resultado) > 0) {
          $senha = md5($senha);
          $sql = "SELECT * FROM gerente WHERE login = '$login' AND senha = '$senha' ";
          $resultado = mysqli_query($connectUser, $sql);

          if (mysqli_num_rows($resultado) == 1) {
            $dados = mysqli_fetch_array($resultado);
            $_SESSION['logadoGerente'] = true;
            $_SESSION['nome_gerente'] = $dados['nome'];
            header('Location: pedidosGerente.php');
          } else {
            $erros[] = " <li> Usuário e senha não conferem </li> ";
          }
        } else {
          $erros[] = "<li> Usuário não existe. </li>";
        }
      }
    }
  }
}
