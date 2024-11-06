<?php
class AX{
    static function formataAbributo($valor)
    {
        if (is_string($valor) && !empty($valor)) {
            return "'" . addslashes($valor) . "'";
        } else if (is_bool($valor)) {
            return $valor ? 'TRUE' : 'FALSE';
        } else if ($valor !== '') {
            return $valor;
        } else {
            return "NULL";
        }
    }
    static function formataTabela($valor)
    {
        if (is_string($valor) && !empty($valor)) {
            return addslashes($valor);
        } else if (is_bool($valor)) {
            return $valor ? 'TRUE' : 'FALSE';
        } else if ($valor !== '') {
            return $valor;
        } else {
            return "NULL";
        }
    }
    static function attr($valor){
        if (is_scalar($valor)) {
            return self::formataAbributo($valor);
        }
    }
    static function tb($valor){
        if (is_scalar($valor)) {
            return self::formataTabela($valor);
        }
    }
}