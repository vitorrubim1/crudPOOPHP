<!doctype html>
<html lang="pt-br">

<head>
    <title>ATUALIZANDO DADOS</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
</head>

<body>

    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <h2>ATUALIZANDO OS DADOS</h2>
            <h5>yourTalent</h5>
        </nav>
    </div>

    <?php
    //INCLUINDO E INSTANCIANDO A CONEXÃO E PEGANDO O ID VIA GET
    require_once '../class/conexao.class.php';
    $conn = new Conexao();
    $idFuncionario =  base64_Decode($_GET['id']);


    //INCLUINDO E INSTANCIANDO A CLASSE DE VERIFICAÇÃO DOS INPUTS
    /* require_once '../class/ValidaInput.class.php';
    $validaInput = new ValidaInput;

    //SETANDO OS VALORES PARA A CLASSE
    $validaInput -> setNome($_POST['nomeFuncionario']);
    $validaInput -> setSexo($_POST['sexo']);
    $validaInput -> setCpf($_POST['cpf']);
    $validaInput -> setSetor($_POST['setor']);
    $validaInput -> setObservacoes($_POST['observacoes']); */


    ?>

    <div class="container">
        <form action="" method="post">
            <?php
            //incluindo a conexao e instanciando a classe
            require_once '../class/conexao.class.php';
            require_once '../class/ValidaInput.class.php';
            $conn = new Conexao();

            if(empty($_GET['id'])){
                echo "<script> alert('O ID NÃO É VALIDO!'); location.href='../index.php' </script>";
            }

            if (isset($_POST['editar'])) {

                $valida = new ValidaInput($nomeFuncionario = $_POST['nomeFuncionario'], $sexo = $_POST['sexo'], $cpf = $_POST['cpf'], $setor = $_POST['setor'], $observacoes = $_POST['observacoes']);
                //print_r ($valida); exit;


                if ($valida->validaNome() == true && $valida->validaSexo() == true && $valida->validaCpf() == true && $valida->validaSetor() == true && $valida->validaObservacoes() == true) {
                    $query = "UPDATE funcionario SET nomeFuncionario = :nomeFuncionario, sexo = :sexo, cpf = :cpf, observacoes = :observacoes, idSetores = :idSetores WHERE idFuncionario = :idFuncionario";
                    //echo $query;
                    $resultado = $conn->getConn()->prepare($query);

                    $resultado->bindParam(':nomeFuncionario', $_POST['nomeFuncionario'], PDO::PARAM_STR);
                    $resultado->bindParam(':sexo', $_POST['sexo'], PDO::PARAM_STR);
                    $resultado->bindParam(':cpf', $_POST['cpf'], PDO::PARAM_STR);
                    $resultado->bindParam(':observacoes', $_POST['observacoes'], PDO::PARAM_STR);
                    $resultado->bindParam(':idSetores', $_POST['setor'], PDO::PARAM_STR);
                    $resultado->bindParam(':idFuncionario', $idFuncionario, PDO::PARAM_INT);

                    //print_r($query); exit; 

                    if ($resultado->execute()) {
                        echo "<script> alert('DADOS ATUALIZADOS COM SUCESSO!'); location.href='../index.php' </script>";
                    } else {
                        echo "<script> alert('Deu ruim ao atualizar aí grandeeeeee');</script>";
                    }
                }
            }

            //AQUI TEM QUE TER UM IF PARA VERIFICAR SE As CLASSEs TA RETORNANDO TRUE, E EXECUTAR O CÓDIGO ABAIXO



            //COMANDO DE VISUALIZAÇÃO
            $dadosUsuario = "SELECT*, nomeSetor FROM funcionario JOIN setor 
            ON funcionario.idSetores = setor.idSetores WHERE idFuncionario = :id";
            $resultado = $conn->getConn()->prepare($dadosUsuario);
            $resultado->bindParam(':id', $idFuncionario, PDO::PARAM_INT);
            $resultado->execute();
            $listar = $resultado->fetch(PDO::FETCH_ASSOC);

            //PEGANDO OS VALORES DO BANCO
            $idFuncionario = $listar['idFuncionario'];
            $nomeFuncionario = $listar['nomeFuncionario'];
            $sexo = $listar['sexo'];
            $cpf = $listar['cpf'];
            $observacoes = $listar['observacoes'];
            $setor = $listar['nomeSetor'];

            ?>

            <br>
            <div class="form-group">
                <label>NOME DO FUNCIONÁRIO</label>
                <input type="text" name="nomeFuncionario" class="form-control" value="<?php echo $nomeFuncionario ?>">
            </div>
            <div class="form-group">
                <label>SEXO</label>
                <select class="form-control" name="sexo">
                    <option value="M" <?php echo $sexo == "M" ? "selected" : '' ?>>Masculino</option>
                    <!-- If inline ("gambiarrinha") -->
                    <option value="F" <?php echo $sexo == "F" ? "selected" : '' ?>>Feminino</option>
                </select>
            </div>
            <div class="form-group">
                <label>CPF</label>
                <input type="text" name="cpf" class="form-control" value="<?php echo $cpf ?>">
            </div>

            <div class="form-group">
                <label>OBSERVAÇÃO</label>
                <textarea name="observacoes" class="form-control"><?php echo $observacoes ?></textarea>
            </div>

            <label>SETOR</label>
            <select class="form-control" name="setor">
                <option selected value="<?php echo $listar['idSetores'] ?>"><?php echo $setor ?></option>";
                <?php
                $dadosSetores = "SELECT * FROM setor WHERE NOT idSetores= $listar[idSetores]";
                $resultado = $conn->getConn()->prepare($dadosSetores);
                $resultado->execute();

                while ($listarsetor = $resultado->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value='$listarsetor[idSetores]'>$listarsetor[nomeSetor]</option>";
                }

                ?>
            </select>

            <br>
            <div style="text-align: right">
                <input type="submit" class="btn btn-dark btn-lg" name="editar" value="Atualizar">
            </div>

        </form>
    </div>

    <!--  JavaScript  Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>