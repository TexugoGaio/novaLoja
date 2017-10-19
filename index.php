<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="content-Type" content="text/html; charset=iso-8859-1" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="bootstrap/css/style.css" rel="stylesheet">
        <link href="bootstrap/css/animate.css" rel="stylesheet">
        <style> .botao:hover{animation-name: tada;}  </style>

        <title>PC EXPERIENCE</title>
    </head>

    <body class="container">

        <nav class="navbar navbar-static-top">
            <div class="container-fluid" >
                <div class="navbar-header" >
                    <li><a class="navbar-brand" href="index.php">PCXP</a></li>
                </div>
                <ul class="nav navbar-nav" >
                    <li class=" animated botao "><a href="frmListarProdutos.php">PRODUTOS</a></li>
                    <li><a href="frmListarClientes.php">CLIENTES</a></li>
                    <li><a href="frmListarVendas.php">VENDAS</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right" >
                    <li><a href="logOut.php"><span class="glyphicon glyphicon-log-out" ></span>LOGOUT</a></li>
                </ul>

            </div>
        </nav>

        <div id="barra-lateral">
        <ul class="barra-nav">
            <li class="sidebar-brand">
                <a href="#">
                    PC EXPERIENCE
                </a>
            </li>
            <li>
                <a href="#">PRODUTOS</a>
            </li>
            <li>
                <a href="#">PEDIDOS</a>
            </li>
            <li>
                <a href="#">CLIENTES</a>
            </li>
        </ul>
    </div>



    <div class="row">
        <div class="col-md-12">
            <div class="input-group">
                <input type="text" id="palavra" class="form-control" placeholder="Pesquisar Produto">
                <span class="input-group-btn">
                    <button class="btn btn-defaut" id="buscar" type="button">Buscar</button>
                </span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12" id="dados">
        
        </div>
    </div>
    

    <script src="Jquery/jquery.js"></script>
    <script type="text/javascript">
    
        function buscar(palavra){
            var page = "busca.php";

            $.ajax
                ({
                    type: 'POST',
                    dataType: 'html',
                    url: page,
                    beforeSend: function(){
                        $("#dados").html("Carregando");
                    },
                    data: {palavra: palavra},
                    success: function(msg) {
                        $("#dados").html(msg);
                    }
                });
        }

        $("#buscar").click(function() {
            //alert("Deu certo");
            buscar($("#palavra").val())
        });

        $("#palavra").change(function() {
            //alert("Deu certo");
            buscar($("#palavra").val())
        });
    </script>
    </body>
</html>