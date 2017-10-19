<?php 
    require_once('conexao.php');

    $qtd = trim($_GET['qtd']);
    $prod = trim($_GET['prod']);
    $venda = trim($_GET['venda']);
    $valor = trim($_GET['valor']);
    $total = $qtd * $valor;

    


    if(!empty($qtd) && !empty($prod) && !empty($venda) &&!empty($valor)){
        
        $con = open_database();
        $sqlinserir = "INSERT INTO produto_venda (venda_id, prod_id, valor_uni, quantidade) VALUES ('$venda' , '$prod' , '$valor' , '$qtd');";
        $sqlupdatevenda = "UPDATE vendas SET valor=valor+'$total' WHERE venda_id='$venda'";
        $sqlupdateprod = "UPDATE produtos SET quantidade=quantidade-'$qtd' WHERE id='$prod'"; 
        $ins = mysqli_query($con , $sqlinserir) or die(mysqli_error($con));
        $updvenda = mysqli_query($con , $sqlupdatevenda) or die(mysqli_error($con));
        $updprod = mysqli_query($con, $sqlupdateprod) or die(mysqli_error($con));   
    }
    else{
        echo "ERRO";
    }

    header("location: frmInserirProd_Vendas.php?id=$venda")
?>