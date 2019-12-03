<!doctype html>
<html lang="pt-br">

<head>
    <title>ATUALIZANDO SETOR</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
</head>

<body>
        <?php
             require_once '../class/conexao.class.php';

            if(isset($_POST['atualizarSetor'])){
                
                    if(empty ($_POST['nomeSetor']) && empty($_POST['idSet'])){
                        echo "<script>alert ('parametro vazio') </script>";
                    }
                    else {
                        $conn = new Conexao();
                        $query = "UPDATE setor SET nomeSetor = :nomeSetor WHERE idSetores = :idSetor";
                        $resultado = $conn->getConn()->prepare($query);
            
                        $resultado->bindParam(':nomeSetor', $_POST['nomeSetor'], PDO::PARAM_STR);
                        $resultado->bindParam(':idSetor', $_POST['idSet'], PDO::PARAM_INT);
            
                        if ($resultado->execute()) {
                            echo "<script> alert('DADOS ATUALIZADOS COM SUCESSO!');  location.href='atualizaSetor.php'</script>";
                        } else {
                            echo "<script> alert('Deu ruim ao atualizar aí grandeeeeee');</script>";
                        }
                    }
                }
                
            ?>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <h2>ATUALIZANDO OS SETOR</h2>
            <h5>yourTalent</h5>
        </nav>

        <div>
            <?php
            require_once '../class/ValidaInput.class.php';
            
            require_once '../class/conexao.class.php';
            

            $dadosSetores = "SELECT * FROM setor";
            $resultado = $conn->getConn()->prepare($dadosSetores);
            $resultado->execute();
            while ($listarsetor = $resultado->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <form action="#" method="POST">
                    <input type="hidden" name="idSet" value="<?php echo $listarsetor['idSetores'] ?>"/> 
                    <input type="text"  name= "nomeSetor"value="<?php echo $listarsetor['nomeSetor'] ?>"/> 
                    <input type="submit" class="btn btn-dark btn-sm" name="atualizarSetor" value="Atualizar"/>
                    <a class="btn btn-danger btn-sm" id="btnAcao" href="apagarSetor.php?id=<?php echo $listarsetor['idSetores'] ?>" role="button">EXCLUIR</a>
                </form>
                <br>

            <?php
            }    
            ?>
            
        </div>

        </select>


    </div>



</body>

</html>