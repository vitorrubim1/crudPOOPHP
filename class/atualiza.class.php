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
    //incluindo e instanciando a conexão
    require_once '../conexao.php';
    $conn = new Conexao();

    //$idFuncionario->bindValue($_GET['btnAtualiza'], PDO::PARAM_INT);

    ?>

    <div class="container">
        <form action="atualizaFuncionario.php" method="post">
            <?php
            //incluindo a conexao e instanciando a classe
            require_once '../conexao.php';
            $conn = new Conexao();

            //pegando id via get
            $idFuncionario = $_GET['id'];
            //comando de visualização

            $dadosUsuario = "SELECT*FROM funcionario WHERE idFuncionario = '$idFuncionario'";

            $resultado = $conn->getConn()->prepare($dadosUsuario);
            $resultado->execute();

            while ($listar = $resultado->fetch(PDO::FETCH_ASSOC)) {

                $idFuncionario = $listar['idFuncionario'];
                $nomeFuncionario = $listar['nomeFuncionario'];
                $sexo = $listar['sexo'];
                $cpf = $listar['cpf'];
                $observacoes = $listar['observacoes'];

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
                        <option value="F" <?php echo $sexo == "F" ? "selected" : '' ?>>Feminino</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>CPF</label>
                    <input type="number" name="cpf" class="form-control" value="<?php echo $cpf ?>">
                </div>
                <div class="form-group">
                    <label>OBSERVAÇÃO</label>
                    <textarea value="<?php echo $observacoes ?>" class="form-control" name="observacao"></textarea>
                </div>


                <div style="text-align: right">
                    <button type="submit" class="btn btn-dark btn-sm">Atualizar</button>
                </div>



                <!--Fechamento da chave do while-->
            <?php } ?>
        </form>
    </div>



    <!--  JavaScript  Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>