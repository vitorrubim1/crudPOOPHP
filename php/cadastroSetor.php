<?php
    //incluido a conexao
    require_once '../conexao.php';

    //conexao
    $conn = new Conexao();

    //query de insercao dos setores
    $query = "INSERT INTO setor (nomeSetor) VALUES (:nomeSetor)";

    $cadastrar = $conn->getConn()->prepare($query);

    //limpando o imput e executando
    $cadastrar ->bindParam(':nomeSetor', $_POST['nomeSetor'], PDO::PARAM_STR);
    $cadastrar->execute();

    //verificação se foi ou não cadastrado
    if($cadastrar->rowCount()){
        echo "<script> alert('Dados inseridos com sucesso'); location.href='../index.php' </script>";
    }else{
        echo "<script> alert('Deu ruim ai grandeeeeee');</script>";
    }
?>