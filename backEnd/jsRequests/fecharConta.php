<?php
include("../FERRAMENTAS/AX.php");
include("../FERRAMENTAS/dbWrapper.php");
include("../FERRAMENTAS/Funcoes.php");

$funcoes = new Funcoes;
$db = new dbWrapper($funcoes::conexao());
$DADOS = $_POST;
$fecho = date("d-m-Y h:i");
$usuario = $DADOS["user"];
$mesa = $DADOS["mesa"];
$conta = $DADOS["conta"];
$cliente = $DADOS["cliente"];
$valor = $DADOS["valor"];
$desconto = $DADOS["desconto"];
$total = $DADOS["total"];
$quemfechou = $DADOS["quemfechou"];
 

$db->update("mesa")->set(["ocupada='0'","codigo=''"])->where(["numeromesa='$mesa'","usuario='$usuario'"])->executaQuery();
$db->update("mesaocupada")->set(["desocupou='1'"])->where(["mesa='$mesa'","usuario='$usuario'"])->executaQuery();
$db->update("conta")->set(["fechado='1'","fecho='$fecho'","cliente='$cliente'", "valor='$valor'","desconto='$desconto'","total='$total'","quemfechou='$quemfechou'"])->where(["identificador='$conta'","usuario='$usuario'","mesa='$mesa'"])->executaQuery();

echo json_encode(["payload"=>$_POST,"ok"=>true]); 