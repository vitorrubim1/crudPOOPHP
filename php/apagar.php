<?php

    //incluindo e instanciando a classe de conexão
    require_once '../class/conexao.class.php';
    $conn = new Conexao();

    //pegando o id da index
    $idFuncionario=$_GET['id'];
    
    $query = "DELETE FROM funcionario WHERE idFuncionario = $idFuncionario";

    //preparando a query para execução e executando-a
    $deletar = $conn ->getConn() ->prepare($query);
    $deletar -> execute();

    if($deletar -> rowCount()){
        echo "<script> alert ('FUNCIONÁRIO EXCLUÍDO COM SUCESSO!'); location.href = '../index.php'  </script>";
    }else {
        echo "<script> alert ('Deu ruim aí amigão'); location.href = '../index.php' </script>";
    }

?>