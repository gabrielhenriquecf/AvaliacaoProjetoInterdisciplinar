<h2 class="light">Acessar</h2>
<?php
if (!empty($erros)) {
    foreach ($erros as $erro) {
        echo $erro;
    }
}
?>

<div>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        Usuário: <input type="text" name="login"> <br>
        Senha: <input type="password" name="senha"> <br>
        <button type="submit" name="btn-entrar"> Entrar</button>
    </form>
</div>

</body>

</html>