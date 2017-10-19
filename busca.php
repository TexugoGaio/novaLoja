<?php

    require_once('conexao.php');

    $busca = $_POST['palavra'];
    $var = "%" . $busca . "%";

    $con = open_database();
    select_database();
    $sql = "SELECT * FROM produtos WHERE descricao LIKE '$var' ";

    $rs = mysqli_query($con,$sql) or die(mysqli_error($con));
    close_database($con);
    echo "&nbsp<table class='table table-hover table-bordered'><th>ID</th><th>Descrição</th><th>Valor</th>";
    while($row = mysqli_fetch_assoc($rs)){
        echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['descricao'] . "</td>";
            echo "<td>" . $row['valor'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
?>