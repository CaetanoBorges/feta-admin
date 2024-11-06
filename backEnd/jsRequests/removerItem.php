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
$itemnum = $DADOS["itemnum"];

$res = $db->select(["itens"])->from("pedido")->where(["identificador='$id'","usuario='$usuario'"])->pegaResultado()["itens"];
$itens = json_decode($res);
$nItens = [];
$totalItem = 0;
foreach($itens as $k => $v){
    $valor = (array) $v;
    if($valor["itemnum"] == $itemnum){
        continue;
    }
    $totalItem += $valor["total"];
    array_push($nItens, $valor);
}

$nItensJson = json_encode($nItens);
$res = $db->update("pedido")->set(["itens='$nItensJson'","total='$totalItem'"])->where(["identificador='$id'","usuario='$usuario'"])->executaQuery();
echo json_encode(["payload"=>$totalItem,"ok"=>true]);