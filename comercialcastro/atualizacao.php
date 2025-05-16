<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Document</title>
</head>
<body>
    <?php
    
        include('conexao.php')
    
    ?>

    <?php
        $sequencia = $_POST['sequencia'];
        $peso = $_POST['peso'];
        $data = $_POST['data'];
        $descricao1 = $_POST['descricao1'];
        $descricao2 = $_POST['descricao2'];
        $veiculo = $_POST['veiculo'];
        $situacao = $_POST['situacao'];
        $sqlUpdate = "UPDATE sequencias SET sequencia='$sequencia', peso='$peso', data='$data', descricao1='$descricao1', descricao2='$descricao2', veiculo='$veiculo', situacao='$situacao'";
        $result = $mysqli->query($sqlUpdate);
    ?>
</body>
</html>