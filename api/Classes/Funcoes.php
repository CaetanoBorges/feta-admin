<?php
class Funcoes{
    public static $conexao = null;

    static function conexao()
    {

        if (isset(self::$conexao)) {
            return self::$conexao;
        }

        self::$conexao = new \PDO("mysql:host=localhost;dbname=fetafacil", "root", "");
        return self::$conexao;
    }
    static function generateRandomString($length = 10) {
        return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    }
     static function seisDigitos()
    {
        return mt_rand(100000, 999999);
    }
}