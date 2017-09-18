<?php 
    function open_database() {
        $conexao = mysqli_connect("localhost", "root", "");

        if(!$conexao){
            echo "erro ao conectar no servidor.";
        exit;
        }
        return $conexao;
    }

    function close_database($conexao){
        if(!$conexao){
            echo "Erro ao fechar o banco.";
        }
        mysqli_close($conexao);
    }

    function select_database(){
        $conexao = mysqli_connect("localhost", "root", "");
        $banco = mysqli_select_db($conexao, "loja");
        if(!$banco){
            echo "erro ao conectar com o banco.";
            exit;
        }
    }
?>