<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--<meta http-equiv="refresh" content="0; http://localhost/comercialcastro/roteiro.php">-->
    <?php

    include('conexao.php')

?>

<?php

$sequencia = $_POST['sequencia'];
$peso = $_POST['peso'];
$data = $_POST['data'];
$obs_comercial = $_POST['obs_comercial'];
$valid_log = $_POST['valid_log'];
$rota = $_POST['rota'];
    
$sql = "INSERT INTO sequencias (id,sequencia,peso,data,obs_comercial,valid_log,rota) VALUES (NULL,'$sequencia', '$peso', '$data', '$obs_comercial', '$valid_log', '$rota')";
    
    mysqli_query($mysqli, $sql);
?>
</head>
<body>
</body>
</html>