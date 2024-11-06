<?php
include("../FERRAMENTAS/AX.php");
include("../FERRAMENTAS/dbWrapper.php");
include("../FERRAMENTAS/Funcoes.php");

$funcoes = new Funcoes;
$db = new dbWrapper($funcoes::conexao());
$DADOS = $_POST;
$quando = date("d-m-Y h:i");
$usuario = $DADOS["user"];
$mesa = $DADOS["mesa"];
$cliente = $DADOS["cliente"];
$string = $funcoes::generateRandomString(3);
$codigo = $string."-".$funcoes::seisDigitos();
 
$db->update("mesa")->set(["ocupada='1'","codigo='$codigo'"])->where(["numeromesa='$mesa'","usuario='$usuario'"])->executaQuery();

$quando = AX::attr(date("d-m-Y h:i"));
$usuario = AX::attr($DADOS["user"]);
$mesa = AX::attr($DADOS["mesa"]);
$cliente = AX::attr($DADOS["cliente"]);
$quemabriu = AX::attr($DADOS["quemabriu"]);
$tempo = AX::attr(time());

$db->insert("mesaocupada",[
    "usuario"=>$usuario,
    "mesa"=>$mesa,
    "nome"=>$cliente,
    "desocupou"=>'0'
])->executaQuery();

$db->insert("conta",[
    "usuario"=>$usuario,
    "mesa"=>$mesa,
    "quemabriu"=>$quemabriu,
    "tempo"=>$tempo,
    "quando"=>$quando,
    "fechado"=>'0'
])->executaQuery();

echo json_encode(["payload"=>"","ok"=>true]);