<!doctype html>
<html lang="en">

<head>
    <title>Crud</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <?php require_once 'conexao.php';?>

    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <h2>CADASTRO DE SETOR E FUNCIONÁRIO</h2>
            <h5>yourTalent</h5>
        </nav>

        <!-- FORMULÁRIO SETOR -->
        <form action="class/cadastroSetor.class.php" method="post">
            <br>
            <p>INFORME O NOME DO SETOR</p><input class="form-control form-control-sm small" name="setor" type="text" required> <br>
            <input type="submit" required class="btn btn-dark btn-lg required btnPersonalizado"> <br>
            <hr>

            <!--BOTÃO CADASTRAR FUNCIONÁRIO, AQUI ABRE O MODAL-->
            <input type="button" class="btn btn-dark btn-lg btnPersonalizado" data-toggle="modal" data-target="#modal" value="Cadastrar Funcionário">
        </form>


        <!--MODAL-->
        <div class="modal fade" id="modal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>CADASTRO DE FUNCIONÁRIO</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!--FORMULÁRIO FUNCIONÁRIO-->
                        <form action="class/cadastroFuncionario.class.php" method="post">

                            <input class="form-control" type="text" placeholder="DIGITE O NOME DO FUNCIONÁRIO:" name="nomeFuncionario" required autofocus> <br>

                            <select class="form-control" name="sexo">
                                <option value="M">Masculino</option>
                                <option value="F">Feminino</option>
                            </select> <br>

                            <label>Informe o Setor</label>
                            <select class="form-control" name="setor" required>
                                <?php
                                //chamando a conexao
                                require_once 'conexao.php';
                                $conn = new Conexao();

                                //query de visualizao e limpagem de informações
                                $query = "SELECT * FROM setor";
                                $resultado = $conn->getConn()->prepare($query);
                                $resultado->execute();

                                while ($listar = $resultado->fetch(PDO::FETCH_ASSOC)) {


                                    $idSetor = $listar['idSetores'];
                                    $nomeSetor = $listar['nomeSetor'];

                                    ?>

                                    <option value="<?php echo $idSetor  ?>"> <?php echo $nomeSetor  ?> </option>

                                <?php } ?>
                            </select> <br>

                            <input class="form-control" type="number" name="cpf" placeholder="Digite o CPF:" required> <br>

                            <textarea class="form-control" name="observacoes" placeholder="ESCREVA UMA OBSERVAÇÃO SOBRE ELE.."></textarea>

                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-lg btn-dark">Cadastrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!--TABELA PARA VISUALIZAÇÃO DOS SETORES E FUNCIONÁRIOS-->
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NOME FUNCIONÁRIO</th>
                    <th scope="col">SEXO</th>
                    <th scope="col">CPF</th>
                    <th scope="col">OBSERVAÇÃO</th>
                    <th scope="col">SETOR</th>
                    <th scope="col">AÇÃO</th>
                </tr>
            </thead>

            <!-- 'R' do cRud -->

            <?php
            //incluindo a conexao e instanciando a classe
            require_once 'conexao.php';
            $conn = new Conexao();
            //comando de visualização
            $dadosUsuario = "SELECT*FROM funcionario";

            $resultado = $conn->getConn()->prepare($dadosUsuario);
            $resultado->execute();


            while ($listar = $resultado->fetch(PDO::FETCH_ASSOC)) {

                $idFuncionario = $listar['idFuncionario'];
                $nomeFuncionario = $listar['nomeFuncionario'];
                $sexo = $listar['sexo'];
                $cpf = $listar['cpf'];
                $observacoes = $listar['observacoes'];

                

            ?>

                <tr>
                    <th scope="row"> <?php echo "$idFuncionario"  ?> </th>
                    <td> <?php echo "$nomeFuncionario"  ?> </td>
                    <td> <?php echo "$sexo"  ?> </td>
                    <td> <?php echo "$cpf" ?> </td>
                    <td> <?php echo "$observacoes"  ?> </td>
                    <td> <?php echo ""?></td>  <!-- SELECT funcionario.idSetores, setor.nomeSetor	FROM funcionario, setorWHERE funcionario.idSetores = setor.idSetores;-->
                    <td> <?php echo ""?> </td>

                    <td> 
                        <a class="btn btn-dark btn-sm" name="btnAtualiza" id="btnAcao" href="class/atualiza.class.php?id=<?php echo $idFuncionario ?>" role="button">ATUALIZAR</a> <br> <br>
                        <a class="btn btn-danger btn-sm" id="btnAcao" href="class/apagar.class.php?id=<?php echo $idFuncionario ?>" role="button">EXCLUIR</a> 
                    </td>
                </tr>

                <!-- Fechamento da chave do while, para envolver todos os funcionario-->
            <?php }  ?>
                
        </table>
    </div>



    <!--  JavaScript Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>