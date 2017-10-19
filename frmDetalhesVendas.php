<?php

require_once('conexao.php');

$id = trim($_GET['id']);
$venda = trim($_GET['venda']);
$nome = trim($_GET['nome']);
$data = trim($_GET['data']);
$total = trim($_GET['total']);


$con = open_database();
select_database();
$sql = "SELECT produto_venda.prod_id, produto_venda.valor_uni, produto_venda.quantidade, produtos.descricao FROM produto_venda INNER JOIN produtos ON produto_venda.venda_id='$venda' AND produto_venda.prod_id=produtos.id;";
$rs = mysqli_query($con, $sql) or die(mysqli_error($con));
close_database($con);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="bootstrap/css/style.css" rel="stylesheet">
        <title>Detalhes da Venda</title>
    </head>

    <body class="container">
        
        <h1 align="center">Detalhes da Venda: </h1>
        <br>
        ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        <br><br>
        <form action="InserirProdVendas.php" id="frmInsProdVendas" method="post">
            <div class="col-xs-2">
                <div class="form-group">
                    <label for="lblID" >
                        <h2><span class="control-label">Venda: </span><input class="label label-info" name="txtId" value="<?php echo $venda ?>"> <span class="label label-info"><?php echo $venda ?></span> </h2>
                    </label>
                </div>
            </div>
            <div class="col-xs-2">    
                <div class="form-group">
                    <label for="lblCid">
                        <h2><span class="control-label">ID: </span><span class="label label-info"> <?php echo $id ?> </span></h2>
                    </label>
                </div>    
            </div>
            <div class="rol-xs-4">
                <div class="form-group">
                    <label for="lblNome">
                        <h2><span class="control-label ">Nome: </span><span class="label label-info"> <?php echo $nome ?> </span></h2>
                    </label>
                </div>
            </div>

            <div class="col-xs-10">
                <div class="form-group">
                    <label for="lblCPF">
                        <h2><span class="control-label">Data: </span><span class="label label-info"> <?php echo $data ?> </span></h2>
                    </label>
                </div>

                
            </div>

            

            <br><br><br><br>

            <div class="row col-md-12 " >
            <table class=" table table-hover table-bordered table-responsive ">
                <tr>
                    
                    <th>ID</th>
                    <th>Descrição</th>
                    <th>Quantidade</th>
                    <th>Valor</th>
                </tr>
                <?php 
                    $aux = 0;
                    while($row = mysqli_fetch_assoc($rs)){ ?>
                
                    <tr>
                        
                        <td><?php echo $row['prod_id'] ?></td>
                        <td><?php echo $row['descricao'] ?></td>
                        <td><?php echo $row['quantidade']?></td>
                        <td><?php echo $row['valor_uni'] ?></td>
                    </tr>
                <?php
                    $aux++; 
                    } ?>
            </table>
                    <label class="" for="lblCPF">
                        <h2><span class="control-label">Total: </span><span class="label label-info"> <?php echo $total ?> </span></h2>
                    </label>
            </div>

        </form>
        <br><br><br><br>
        <input type="button" name="btnFinalizar" id="btnFinalizar" class="btn-lg btn-success" value="Finalizar" onclick="javascript:location.href='frmListarVendas.php'">
    </body>
</html>