<?php
error_reporting(0);
include("../FERRAMENTAS/AX.php");
include("../FERRAMENTAS/dbWrapper.php");
include("../FERRAMENTAS/Funcoes.php");

$funcoes = new Funcoes;
$db = new dbWrapper($funcoes::conexao());
$DADOS = $_GET;
$usuario = AX::attr($DADOS["user"]);

$res = $db->select()->from("mesa")->where(["ocupada='1'","usuario=$usuario"])->pegaResultados();
$result = [];
foreach($res as $k=>$v){
    $res = [];
    $mesa = $v["numeromesa"];
    $conta = $db->select(["identificador"])->from("conta")->where(["mesa='$mesa'","usuario=$usuario","fecho IS NULL"])->pegaResultado()["identificador"];
    $pedidos = $db->select(["COUNT(*)"])->from("pedido")->where(["conta='$conta'","usuario=$usuario","aceite IS NULL"])->pegaResultado()["COUNT(*)"];
    if($pedidos < 1){
        continue;
    }
    $result[$mesa] = $pedidos;
}

echo json_encode($result);