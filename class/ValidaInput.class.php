<?php
    class ValidaInput {

        public $nomeFuncionario;
        public $sexo;
        public $cpf;
        public $setor;
        public $observacoes;

        //CONSTRUCTOR
        public function __construct($nomeFuncionario, $sexo, $cpf, $setor, $observacoes)
        {
            $this -> nomeFuncionario = $nomeFuncionario;     
            $this -> sexo = $sexo; 
            $this -> cpf = $cpf; 
            $this -> setor = $setor;
            $this -> observacoes = $observacoes;  
        } 
       
        //GETTER'S
        public function getNome(){
            return $this -> nomeFuncionario;
        }

        public function getSexo (){
            return $this -> sexo;
        }

        public function getCpf(){
            return $this -> cpf;
        } 

        public function getSetor(){
            return $this -> setor;
        }

        public function getObservacoes(){
            return $this -> observacoes;
        }

        //VALIDA NOME
        function validaNome () {

            if ($this -> nomeFuncionario = ""){
                echo "<script> alert ('O CAMPO NOME DO FUNCIONÁRIO NÃO PODE ESTAR VAZIO.');</script>";
            }
            else if (is_numeric ($this -> nomeFuncionario)) {
                echo "<script> alert('O CAMPO NOME DO FUNCIONÁRIO NÃO PODE CONTER NÚMEROS ');</script>";
            }
            else if (strlen($this -> nomeFuncionario > 200)) {
                echo "<script> alert('O CAMPO NOME DO FUNCIONÁRIO EXCEDEU O NÚMERO DE CARACTERES ');</script>";    
            }
        }   

        //VALIDA SEXO
        function validaSexo () {
            if ($this -> sexo = ""){
                echo "<scrip> alert ('O CAMPO SEXO NÃO PODE ESTAR VAZIO'); </script>";
            }
            else if (is_numeric($this -> sexo)){
                echo "<scrip> alert ('O CAMPO SEXO NÃO PODE CONTER NÚMEROS'); </script>";
            }
        }

        //VALIDA CPF
        function validaCpf (){
            if ($this -> cpf = ""){
                echo "<scrip> alert ('O CAMPO CPF NÃO PODE ESTAR VAZIO'); </script>";
            }
            else{
                if (is_numeric ($this -> cpf)){
                    if ($this -> cpf > 9){
                        echo "<scrip> alert ('O CPF CONTÉM MAIS NÚMEROS DO QUE O PERMITIDO'); </script>";
                    }
                }
                else {
                    echo "<scrip> alert ('O CAMPO CPF NÃO PODE CONTER LETRAS OU OUTROS CARACTERES'); </script>";
                }
            }
        }

        //VALIDA SETOR
        function validaSetor () {
            if ($this -> setor = ""){
                echo "<scrip> alert ('O CAMPO SETOR NÃO PODE ESTAR VAZIO'); </script>";
            }
            else if (is_numeric($this -> setor)){
                echo "<scrip> alert ('O CAMPO SETOR NÃO PODE CONTER NÚMEROS'); </script>";
            }
        }

        //VALIDA OBSERVAÇÕES
        function validaObservacoes (){
            if ($this -> observacoes = ""){
                echo "<scrip> alert ('O FUNCIONÁRIO PRECISA TER ALGUMA OBSERVAÇÃO!'); </script>";
            }
        }

        //echo "<scrip> alert (''); </script>";
    }
?>