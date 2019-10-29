<?php
    //incluido a conexao
    require_once '../conexao.php';
    
    //conexao
    $conn = new Conexao ();

    //query de insercao do funcionario e limpeza dos input
    $query = "INSERT INTO funcionario (nomeFuncionario, sexo, cpf, observacoes) VALUES (:nomeFuncionario, :sexo, :cpf, :observacoes)";

    //print_r ($query); exit;

    $cadastrar = $conn->getConn()->prepare($query);

    $cadastrar ->bindParam(':nomeFuncionario', $_POST['nomeFuncionario'], PDO::PARAM_STR);
    $cadastrar ->bindParam('sexo', $_POST['sexo'], PDO::PARAM_STR);
    $cadastrar ->bindParam(':cpf', $_POST['cpf'], PDO::PARAM_INT);
    $cadastrar ->bindParam(':observacoes', $_POST['observacoes'], PDO::PARAM_STR);

    $cadastrar->execute();

    if($cadastrar->rowCount()){
        echo "<script> alert('Dados inseridos com sucesso'); location.href='../index.php' </script>";
    }else{
        echo "<script> alert('Deu ruim ai grandeeeeee');</script>";
    }
?>