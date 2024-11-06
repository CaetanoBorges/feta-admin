<?php
#error_reporting(0);
include("../FERRAMENTAS/AX.php");
include("../FERRAMENTAS/dbWrapper.php");
include("../FERRAMENTAS/Funcoes.php");

$funcoes = new Funcoes;
$db = new dbWrapper($funcoes::conexao());
$DADOS = $_POST;

$usuario = $DADOS["user"];
$quem = $DADOS["quem"];
$total = $DADOS["total"];
$itens = $DADOS["itens"];
$conta = $DADOS["conta"];
$quando = date("d-m-Y h:i");
 
$db->insert("pedido",[
    "usuario" => AX::attr($usuario),
    "quem" => AX::attr($quem),
    "itens" => AX::attr($itens),
    "total" => AX::attr($total),
    "quando" => AX::attr($quando),
    "conta"=> AX::attr($conta)
])->executaQuery();

$res = $db->select()->from("pedido")->where(["itens='$itens'"])->pegaResultado();

echo json_encode(["payload"=>$res,"ok"=>true]);