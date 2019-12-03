<?php
    //incluido a conexao
    require_once '../class/conexao.class.php';
    require_once '../class/ValidaInput.class.php';
    //CONEXAO
    $conn = new Conexao ();

    ///
    $valida = new ValidaInput($nomeFuncionario = $_POST['nomeFuncionario'], $sexo = $_POST['sexo'], $cpf = $_POST['cpf'], $setor = $_POST['setor'], $observacoes = $_POST['observacoes']);    
    //print_r ($valida); exit;
   

    if ($valida->validaNome() == true && $valida->validaSexo() == true && $valida->validaCpf() == true && $valida->validaSetor() == true && $valida->validaObservacoes() == true){
    //query de insercao do funcionario e limpeza dos input
    $query = "INSERT INTO funcionario (nomeFuncionario, sexo, cpf, observacoes, idSetores ) VALUES (:nomeFuncionario, :sexo, :cpf, :observacoes, :setor )";

    //print_r ($query); exit;

    $cadastrar = $conn->getConn()->prepare($query);

    $cadastrar ->bindParam(':nomeFuncionario', $_POST['nomeFuncionario'], PDO::PARAM_STR);
    $cadastrar ->bindParam(':sexo', $_POST['sexo'], PDO::PARAM_STR);
    $cadastrar ->bindParam(':cpf', $_POST['cpf'], PDO::PARAM_INT);
    $cadastrar ->bindParam(':observacoes', $_POST['observacoes'], PDO::PARAM_STR);
    $cadastrar ->bindParam(':setor', $_POST['setor'], PDO::PARAM_STR);
    

    $cadastrar->execute();

    if($cadastrar->rowCount()){
        echo "<script> alert('DADOS INSERIDOS COM SUCESSO!'); location.href='../index.php' </script>";
    }else{
        echo "<script> alert('Deu ruim ai grandeeeeee');</script>";
    }
    }
?>