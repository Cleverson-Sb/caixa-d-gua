<?php
$hostname = "localhost";
$usuario = "root";
$senha = "";
$bancodedados = "come7693_aplicacao";

$mysqli = new mysqli($hostname, $usuario, $senha, $bancodedados);
    if ($mysqli->connect_errno) {
        echo "falha ao conectar: (" . $mysqli->connect_errno. ") " . $mysqli->connect_error;
    }  
?>