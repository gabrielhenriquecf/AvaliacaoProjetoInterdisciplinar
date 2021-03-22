<?php
// Conexão com BANCO
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "sistemalogin";

$connectUser = mysqli_connect($servername, $username, $password, $db_name); // o mysqli é procedural, já o pdo só é orientado a objeto,  e nem é msqlquery (obsoleto)
mysqli_set_charset($connectUser, "utf8");

if (mysqli_connect_error())
    echo "Erro de conexão: " . mysqli_connect_error();
