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


    <div class="container">
        <h3> CADASTRO DE SETORES E FUNCIONÁRIOS </h3>

        <!-- FORMULÁRIO SETOR -->
        <form action="php/processaIndex.php" method="post">

            <br><p>INFORME O NOME DO SETOR</p><input class="form-control form-control-sm small" name="setor" type="text" required> <br>
            <input type="submit" class="btn btn-dark btn-lg"> <br>  <hr>

            <!--BOTÃO CADASTRAR FUNCIONÁRIO, AQUI ABRE O MODAL-->
            <input type="button" class="btn btn-dark btn-lg" data-toggle="modal" data-target="#modal" value="Cadastrar Funcionário">
        </form>


        <!--MODAL-->
        <div class="modal fade" id="modal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>CADASTRO DE FUNCIONÁRIO</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!--FORMULÁRIO FUNCIONÁRIO-->
                        <form action="php/processaIndex.php" method="post">
                            
                            <input class="form-control" type="text" placeholder="DIGITE SEU NOME:" name="nomeFuncionario" required autofocus> <br>

                            <select class="form-control" value="sexo">
                                <option name="masculino">Masculino</option>
                                <option name="feminino">Feminino</option>
                            </select> <br>

                            <input class="form-control" type="number" name="cpf" placeholder="Digite seu CPF:" required> <br>

                            <textarea class="form-control" placeholder="DIGITE UMA OBSERVAÇÃO.."></textarea>


                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-lg btn-dark">Cadastrar</button>
                    </div>
                </div>
            </div>
        </div>

        <!--TABELA PARA VISUALIZAÇÃO DOS SETORES E FUNCIONÁRIOS-->
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NOME FUNCIONÁRIO</th>
                    <th scope="col">SEXO</th>
                    <th scope="col">CPF</th>
                    <th scope="col">OBSERVAÇÃO</th>
                    <th scope="col">SETOR</th>
                    <th scope="col">NAO SEI OQ</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>AAAAAAA</td>
                    <td>AAAAAAA</td>
                    <td>AAAAAAA</td>
                    <td>AAAAAAA</td>
                    <td>AAAAAAA</td>
                    <td>AAAAAAA</td>
                </tr>
            </tbody>
        </table>
    </div>



    <!--  JavaScript Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>



