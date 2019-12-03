<?php

//incluindo a conexao e instanciando a classe
require_once '../class/conexao.class.php';
require_once '../class/ValidaInput.class.php';
$conn = new Conexao();

if (isset($_POST['editar'])) {

    $valida = new ValidaInput($nomeFuncionario = $_POST['nomeFuncionario'], $sexo = $_POST['sexo'], $cpf = $_POST['cpf'], $setor = $_POST['setor'], $observacoes = $_POST['observacoes']);
    //print_r ($valida); exit;


    if ($valida->validaNome() == true && $valida->validaSexo() == true && $valida->validaCpf() == true && $valida->validaSetor() == true && $valida->validaObservacoes() == true) {
        $query = "UPDATE funcionario SET nomeFuncionario = :nomeFuncionario, sexo = :sexo, cpf = :cpf, observacoes = :observacoes, idSetores = :idSetores WHERE idFuncionario = $idFuncionario";
        //echo $query;
        $resultado = $conn->getConn()->prepare($query);

        $resultado->bindParam(':nomeFuncionario', $_POST['nomeFuncionario'], PDO::PARAM_STR);
        $resultado->bindParam(':sexo', $_POST['sexo'], PDO::PARAM_STR);
        $resultado->bindParam(':cpf', $_POST['cpf'], PDO::PARAM_STR);
        $resultado->bindParam(':observacoes', $_POST['observacoes'], PDO::PARAM_STR);
        $resultado->bindParam(':idSetores', $_POST['setor'], PDO::PARAM_STR);

        //print_r($query); exit; 

        if ($resultado->execute()) {
            echo "<script> alert('DADOS ATUALIZADOS COM SUCESSO!'); location.href='../index.php' </script>";
        } else {
            echo "<script> alert('Deu ruim ao atualizar aí grandeeeeee');</script>";
        }
    }
}
