<?php 

    require_once('conexao.php');

    $id = trim($_REQUEST['id']);

    if(!empty($id)){

        $con = open_database();
        select_database();
    
        $sqlprod = "SELECT * FROM produtos";
        $sqlvenda = "SELECT * FROM vendas WHERE venda_id=" . $id;
        $rsprod = mysqli_query($con, $sqlprod) or die(mysqli_error($con));
        $rsvenda = mysqli_query($con, $sqlvenda) or die(mysqli_error($con));
        $rowvenda = mysqli_fetch_assoc($rsvenda);
        $cli = $rowvenda['cli_id'];
        $data =$rowvenda['data'];
               
        $sqlcli = "SELECT * FROM clientes WHERE id=" . $cli;
        $rscliente = mysqli_query($con,$sqlcli) or die(mysqli_error($con));
        $rowcliente = mysqli_fetch_assoc($rscliente);
        $nome = $rowcliente['nome'];
        $cpf = $rowcliente['cpf'];
        $cidade = $rowcliente['cidade'];
        $estado = $rowcliente['estado'];

        close_database($con);
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="bootstrap/css/style.css" rel="stylesheet">
        <title>Adicionar produtos na Venda</title>
    </head>

    <body class="container">
        
        <h1 align="center">Adicionar Produtos: </h1>
        <br>
        ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        <br><br>
        <form action="InserirProdVendas.php" id="frmInsProdVendas" method="post">
            <div class="col-xs-6">
                <div class="form-group">
                    <label for="lblID" >
                        <h2><span class="control-label">ID: </span><input class="label label-info" name="txtId" value="<?php echo $cli ?>"> <span class="label label-info"><?php echo $cli ?></span> </h2>
                    </label>
                </div>

                <div class="form-group">
                    <label for="lblNome">
                        <h2><span class="control-label ">Nome: </span><span class="label label-info"> <?php echo $nome ?> </span></h2>
                    </label>
                </div>
            </div>

            <div class="col-xs-4">
                <div class="form-group">
                    <label for="lblCPF">
                        <h2><span class="control-label">CPF: </span><span class="label label-info"> <?php echo $cpf ?> </span></h2>
                    </label>
                </div>

                <div class="form-group">
                    <label for="lblCid">
                        <h2><span class="control-label">Cidade: </span><span class="label label-info"> <?php echo $cidade ?> </span></h2>
                    </label>
                </div>
            </div>

            <div class="col-xs-2">
                <div class="form-group">
                    <label for="lblEst">
                        <h2><span class="control-label ">Estado: </span><span class="label label-info"> <?php echo $estado ?> </span></h2>
                    </label>
                </div>

                <div class="form-group">
                    <label for="lblVenda">
                        <h2><span class="control-label ">Venda: </span><input class="label label-info" name="txtVenda" value="<?php echo $id ?>"> <span class="label label-info"> <?php echo $id ?> </span></h2>
                    </label>
                </div>
            </div>

            <br><br><br><br>

            <div class="row col-md-12 " >
            <table class=" table table-hover table-bordered table-responsive ">
                <tr>
                    <th>ID</th>
                    <th>Descrição</th>
                    <th>Unidade</th>
                    <th>Estoque</th>
                    <th>Valor</th>
                    <th>Quantidade</th>
                    <th>Adicionar</th>
                </tr>
                <?php 
                    $aux = 0;
                    while($row = mysqli_fetch_assoc($rsprod)){ ?>
                
                    <tr>
                        <td> <input type="hidden" class="label label-info" name="txtProd" value="<?php echo $row['id'] ?>"> <?php echo $row['id'] ?></td>
                        <td><?php echo $row['descricao'] ?></td>
                        <td><?php echo $row['unidade'] ?></td>
                        <td><?php echo $row['quantidade'] ?></td>
                        <td><input type="hidden" class="label label-info" name="txtValor" value="<?php echo $row['valor'] ?>"><?php echo $row['valor'] ?></td>
                        <td>
                            <input type="text" class="form-control" id="txtQtd<?php echo $aux ?>"  name="txtQtd<?php echo $aux ?>" onblur="setQtd(<?php echo $aux ?>);">

                              
                            
                        </td>
                        <td>
                            <button type="button" class="btn-lg btn-primary" onclick="javascript: location.href='InserirProdVendas.php?venda=' + <?php echo $id ?> +                                                                                                                                                                                                                                                                             
                                                                                                                                      '&prod=' + <?php echo $row['id'] ?> + 
                                                                                                                                      '&valor=' + <?php echo $row['valor'] ?> +
                                                                                                                                      '&qtd=' + getQtd();">
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true" ></span>
                            </button>
                            <!-- <button type="submit" class="btn-lg btn-primary" 
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true" ></span>
                            </button> -->
                             
                        </td>
                    </tr>
                <?php
                    $aux++; 
                    } ?>
            </table>
            </div>
        
            <br><br>
            
            <input type="button" name="btnFinalizar" id="btnFinalizar" class="btn-lg btn-success" value="Finalizar" onclick="javascript:location.href='frmListarVendas.php'">            

                   

        </form>
        
                      

        
        <script type="text/javascript">

            var qtd=0;
            function setQtd(aux){
                var x = "txtQtd";
                x+=aux;
                
                this.qtd = document.getElementById(x).value;
                
            }
            function getQtd(){
                return this.qtd;
            }

        
        </script>            
        
    </body>
</html>