<?php 

    require_once('conexao.php');
    $con = open_database();
    select_database();
    $sql = "SELECT vendas.venda_id, vendas.cli_id, clientes.nome, vendas.data, vendas.valor FROM vendas INNER JOIN clientes ON vendas.cli_id=clientes.id ORDER BY venda_id DESC;";
    $rs = mysqli_query($con,$sql);
    close_database($con);

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="bootstrap/css/style.css" rel="stylesheet">
        <title>Manter Vendas</title>
    </head>
    <body class="container">

        <h1>Manter Vendas</h1>
        <br><br>

        <input type="button" id="btnNovo" class="btn btn-primary" value="Novo" onclick="javaascript:location.href='frmInserirVendas.php'">
        <input type="button" id="btnVoltar" class="btn btn-warning" value="Voltar" onclick="javascript:location.href='index.php'"> 
        <input type="button" id="btnLogout" class="btn btn-danger" value="Logout" onclick="javascript:location.href='logout.php'" >

        <br><br>

        <div class="row col-md-12">
            <table class="table table-hover table-bordered" >

                <tr>
                    <th>#</th>
                    <th>ID Cliente</th>
                    <th>Nome</th>
                    <th>Data</th>
                    <th>Valor</th>
                    <th>Detalhes</th>
                </tr>

                <?php $aux = 0;
                while($row = mysqli_fetch_assoc($rs)) { ?>
                
                <tr>
                    <td><?php echo $venda[$aux]=$row['venda_id'] ?></td>
                    <td><?php echo $row['cli_id'] ?></td>
                    <td><?php echo $row['nome'] ?></td>
                    <td><?php echo $data[$aux] = (new DateTime($row['data']))->format("d/m/y"); ?></td>
                    <td><?php echo $row['valor'] ?></td>
                    <td>
                        <button type="button" class="btn btn-warning" onclick="javascript: location.href='frmDetalhesVendas.php?data=<?php echo $data[$aux]?>&nome=<?php echo $row['nome']?>&venda=<?php echo $row['venda_id']?>&total=<?php echo $row['valor']?>&id=<?php echo $row['cli_id']?>'">
                            <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                        </button>
                    </td>
                </tr>
                
                <?php 
                    $aux++;
                    } ?>    

            </table>
        </div>
    
    </body>
</html>