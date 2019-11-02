<?php
    //incluido a conexao
    require_once '../class/conexao.class.php';

    //conexao e query de insercao dos setores
    $conn = new Conexao();
    $query = "INSERT INTO setor (nomeSetor) VALUES (:setor)";
    $cadastrar = $conn->getConn()->prepare($query);

    //limpando o imput e executando
    $cadastrar ->bindParam(':setor', $_POST['setor'], PDO::PARAM_STR);
    $cadastrar->execute();

    //verificação se foi ou não cadastrado
    if($cadastrar->rowCount()){
        echo "<script> alert('DADO INSERIDO COM SUCESSO!'); location.href='../index.php' </script>";
    }else{
        echo "<script> alert('Deu ruim ai grandeeeeee');</script>";
    }
?>