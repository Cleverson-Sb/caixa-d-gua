</html><!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Venda</title>
    <?php include("conexao.php"); ?>
    <link rel="stylesheet" href="styleLogistica.css">
</head>
<body style="background-color: #f0f0f0;">
    <main>
       <section id="seccadastro">
            <article>
                <h1> Formulário de cadastro</h1>
                <div id="formCadastro">
                    <form method= "POST" action="cadastro_roteiro_sec.php">
                        <label for="sequencia">Digite a sequencia da venda:</label>
                            <br>
                        <input class="inpcadas" type = "nunber" name = "sequencia">
                            <br>
                        <label for="peso">Digite o valor do peso: </label>
                            <br>
                        <input class="inpcadas" type = "nunber" name = "peso" placeholder="O peso deve ser digitado com ponto" size="30">
                            <br>
                        <label class="inpcadas" for="data">Digite a data: </label>
                            <br>
                        <input class="inpcadas" type="date" name="data" value='<?php echo date("Y-m-d"); ?>'>
                            <br>
                        <label for="obs_comercial">Observação do vendedor: </label>
                            <br>
                        <input class="inpcadas" type="text" name="obs_comercial">
                            <br>
                        <label for="valid_log">Validação da Logistica: </label>
                            <br>
                        <input class="inpcadas" type="text" name="valid_log">
                            <br>
                     <label for="rota">Rotas: </label>
                            <input list="rota" name="rota">
                            <datalist id="rota">
                                <option value="Jeremoabo"/> 
                                <option value="Sítio do Quinto"/> 
                                <option value="Novo Triunfo"/>
                                <option value="Ribeira do Pombal"/>
                                <option value="Banzaê"/>
                                <option value="Cícero Dantas - Caçambinha"/>
                                <option value="Cícero Dantas - Local"/>
                                <option value="Cícero Dantas - Rural"/>
                            </datalist>
                            <br>
                        <input class="inpcadas"; type = "submit">
                    </form>
                </div>
            </article>
        </section>
        <section id="colConsul">
            <article>
                <h1>Formulário de consulta</h1>
                
                <?php
                
                $pesquisa = $_POST['data'];
                
                if (isset($_GET['busca'])) {
                    $pesquisa = $mysqli->real_escape_string($_GET['busca']);
                } else {
                    $pesquisa = date("Y-m-d");
                }
                
                $sql = "SELECT * FROM sequencias";
                if (!empty($pesquisa)) {
                    $sql .= " WHERE data LIKE '$pesquisa'";
                }
                
                $sql_query = $mysqli->query($sql) or die("ERRO ao consultar!" . $mysqli->error);
                
                ?>
                
                <table id="tabelaSenquencias">
                    <tbody>
                        <tr>
                            <th colspan="7"  id="colConsul">
                                <form>
                                    <label for="buscadata">Selecione a data que deseja consultar: </label>
                                    <input type="date" name="busca" id="busca" class="buscaConsul" value="<?php echo $pesquisa; ?>">
                                    <button type="submit" class="buscaConsul">Pesquisar</button>
                                </form>
                            </th>
                        </tr>
                        <tr>
                            <th>Sequencia</th>
                            <th>Peso 
                                <?php
                                $dataant= date("Y-m-d");
                                $query_valorant = "SELECT SUM(peso) AS valorTotalant FROM sequencias WHERE data LIKE '$pesquisa'";
                                
                                $result_valorant = $mysqli->query($query_valorant);
                                
                                if ($result_valorant) {
                                    $row_valorant = $result_valorant->fetch_assoc();
                                    echo "/ " . number_format($row_valorant['valorTotalant'], 2, ",", ".") . " Kg";
                                }?>
                            </th>
                            <th>Data de entrega</th>
                            <th>Observação do Vendedor</th>
                            <th>Validação da Logistica</th>
                            <th>Rota</th>
                        </tr>
                        <?php if ($sql_query->num_rows == 0) { ?>
                            <tr>
                                <td colspan="7">Nenhum resultado encontrado...</td>
                            </tr>
                        <?php } else { ?>
                            <?php while ($dados = $sql_query->fetch_assoc()) { ?>
                                <tr>
                                    <td><?php echo $dados['sequencia']; ?></td>
                                    <td><?php echo "kg " . number_format( $dados['peso'], 2, ",", "."); ?></td>
                                    <td><?php echo $dados['data']; ?></td>
                                    <td><?php echo $dados['obs_comercial']; ?></td>
                                    <td><?php echo $dados['valid_log']; ?></td>
                                    <td><?php echo $dados['rota']; ?></td>
                                </tr>
                            <?php } ?>
                        <?php } ?>
                        <tr>
                            <th colspan="7">
                                <?php
                                $dataant= date("Y-m-d");
                                $query_valorant = "SELECT SUM(peso) AS valorTotalant FROM sequencias WHERE data LIKE '$pesquisa'";
                                
                                $result_valorant = $mysqli->query($query_valorant);
                                
                                if ($result_valorant) {
                                    $row_valorant = $result_valorant->fetch_assoc();
                                    echo "Peso Total da data: KG " . number_format($row_valorant['valorTotalant'], 2, ",", ".");
                                }
                                ?>
                            </th>
                        </tr>
                    </tbody>
                </table>
            </article>
        </section>    
    </main>
</body>