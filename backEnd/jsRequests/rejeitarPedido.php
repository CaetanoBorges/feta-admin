<?php
#error_reporting(0);
include("../FERRAMENTAS/AX.php");
include("../FERRAMENTAS/dbWrapper.php");
include("../FERRAMENTAS/Funcoes.php");

$funcoes = new Funcoes;
$db = new dbWrapper($funcoes::conexao());
$DADOS = $_POST;
$usuario = $DADOS["user"];
$id = $DADOS["id"];

$res = $db->update("pedido")->set(["aceite='0'"])->where(["identificador='$id'","usuario='$usuario'"])->executaQuery();

echo json_encode(["payload"=>"","ok"=>true]);