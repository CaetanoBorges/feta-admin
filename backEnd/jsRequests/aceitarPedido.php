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
$id = $DADOS["id"];
 
$db->update("pedido")->set(["aceite='1'","quemaceitou='$quem'"])->where(["identificador='$id'","usuario='$usuario'"])->executaQuery();
$res = $db->select()->from("pedido")->where(["identificador='$id'","usuario='$usuario'"])->pegaResultado();

echo json_encode(["payload"=>$res,"ok"=>true]);