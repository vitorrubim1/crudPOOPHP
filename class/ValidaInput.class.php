<head>
    <meta charset="utf-8">
</head>
<?php
require_once 'conexao.class.php';
$conn = new Conexao();
class ValidaInput
{

    public $nomeFuncionario;
    public $sexo;
    public $cpf;
    public $setor;
    public $observacoes;

    //CONSTRUCTOR
    public function __construct($nomeFuncionario, $sexo, $cpf, $setor, $observacoes)
    {
        $this->nomeFuncionario = $nomeFuncionario;
        $this->sexo = $sexo;
        $this->cpf = $cpf;
        $this->setor = $setor;
        $this->observacoes = $observacoes;
    }

    //GETTER'S
    public function getNomeFuncionario()
    {
        return $this->nomeFuncionario;
    }

    public function getSexo()
    {
        return $this->sexo;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function getSetor()
    {
        return $this->setor;
    }

    public function getObservacoes()
    {
        return $this->observacoes;
    }

    //VALIDA NOME
    function validaNome()
    {

        if (empty($this->nomeFuncionario)) {
            echo "<script> alert ('O CAMPO NOME DO FUNCIONÁRIO NÃO PODE ESTAR VAZIO.'); location.href='../index.php'</script>";
            return false;
        } else if (is_numeric($this->nomeFuncionario)) {
            echo "<script> alert('O CAMPO NOME DO FUNCIONÁRIO NÃO PODE CONTER NÚMEROS '); location.href='../index.php'</script>";
            return false;
        } else if (strlen($this->nomeFuncionario > 100)) {
            echo "<script> alert('O CAMPO NOME DO FUNCIONÁRIO EXCEDEU O NÚMERO DE CARACTERES '); location.href='../index.php'</script>";
            return false;
        } else {
            return true;
        }
    }

    //VALIDA SEXO
    function validaSexo()
    {
        if (empty($this->sexo)) {
            echo "<script> alert ('O CAMPO SEXO NÃO PODE ESTAR VAZIO'); location.href='../index.php' </script>";
            return false;
        } else if (is_numeric($this->sexo)) {
            echo "<script> alert ('O CAMPO SEXO NÃO PODE CONTER NÚMEROS'); location.href='../index.php' </script>";
            return false;
        } else {
            return true;
        }
    }

    //VALIDA CPF
    function validaCpf()
    {
        if (empty($this->cpf)) {
            echo "<script> alert ('O CAMPO CPF NÃO PODE ESTAR VAZIO'); location.href='../index.php' </script>";
            return false;
        } else if (is_numeric($this->cpf)) {
            if (strlen($this->cpf) > 11) {
                echo "<script> alert ('CPF MUITO GRANDE'); location.href='../index.php' </script>";
                return false;
            } else if (strlen($this->cpf) <= 11) {
                echo "<script> alert ('O CPF PRECISA DE 11 DIGITOS'); location.href='../index.php' </script>";
                return false;
            } else {
                return true;
            }
        }
    }


    

    //VALIDA SETOR
    function validaSetor()
    {
        if (empty($this->setor)) {
            echo "<script> alert ('O CAMPO SETOR NÃO PODE ESTAR VAZIO'); location.href='../index.php' </script>";
            return false;
        } else {
            return true;
        }
    }

    //VALIDA OBSERVAÇÕES
    function validaObservacoes()
    {
        if (empty($this->observacoes)) {
            echo "<script> alert ('O FUNCIONÁRIO PRECISA TER ALGUMA OBSERVAÇÃO!'); location.href='../index.php' </script>";
            return false;
        } else {
            return true;
        }
    }
}
?>