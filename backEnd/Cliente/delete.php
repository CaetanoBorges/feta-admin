<?php
include("../FERRAMENTAS/AX.php");
include("../FERRAMENTAS/dbWrapper.php");
include("../FERRAMENTAS/Funcoes.php");

$funcoes = new Funcoes;
$db = new dbWrapper($funcoes::conexao());
$DADOS = $_POST;
$usuario = AX::attr($DADOS["user"]);
$categoria = AX::attr($DADOS["categoria"]);



$res = $db->delete("produtocategoria")->where(["usuario=$usuario","nome=$categoria"])->executaQuery();
$res = $db->select()->from("produto")->where(["usuario=$usuario","categoria=$categoria"])->pegaResultados();
foreach($res as $r){
    unlink("../../api/img/".$r["img"]);
}
$res = $db->delete("produto")->where(["usuario=$usuario","categoria=$categoria"])->executaQuery();


if($res){
    header('Location: ../../produtos.php?status=categoria&result=ok&action=apagar');
    exit();
}else{
    header('Location: ../../produtos.php?status=categoria&result=fail&action=apagar');
    exit();
}