<?php
    //classe de conexao
    class Conexao {
        public static $host = "localhost";
        public static $usuario = "root";
        public static $senha = "1234";
        public static $banco = "crudPOO";
        private static $Connect = null;

    //metodo de conexao
    private static function Conectar (){
        try {
            if(self::$Connect == null){ 
                self::$Connect = new PDO('mysql:host=' . self::$host .';dbname='.self::$banco, self::$usuario, self::$senha);
            }
        } catch (Exception $ex) {
            echo 'Mensagem: ' . $ex->getMessage();
            die;
        }
        return self::$Connect;
    }

    public function getConn() {
        return self::Conectar(); 
    }
    } 
?>