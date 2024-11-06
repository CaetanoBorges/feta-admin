<?php
include("../FERRAMENTAS/AX.php");
include("../FERRAMENTAS/dbWrapper.php");
include("../FERRAMENTAS/Funcoes.php");

$funcoes = new Funcoes;
$db = new dbWrapper($funcoes::conexao());
$DADOS = $_POST;
$usuario = AX::attr($DADOS["user"]);
$mesa = AX::attr($DADOS["mesa"]);
$numero = AX::attr($DADOS["numero"]);
$descricao = AX::attr($DADOS["descricao"]);

$verify = $db->select()->from("mesa")->where(["numeromesa=$numero","usuario=$usuario"])->pegaResultados();
if(count($verify)>0){
    header('Location: ../../mesa.php?status=produto&result=ok&action=alterar Dados&'.md5(time()).'='.md5(time()).'&opt='.$_POST["mesa"].'&user='.$_POST["user"].'&'.md5(time()).'='.md5(time()).'&'.md5(time()).'='.md5(time()));
    exit();
}
$res = $db->update("mesa")->set(["numeromesa=$numero","descricao=$descricao"])->where(["numeromesa=$mesa","usuario=$usuario"])->executaQuery();

$db->update("conta")->set(["mesa=$numero"])->where(["mesa=$mesa","usuario=$usuario"])->executaQuery();

if($res){
    header('Location: ../../mesa.php?status=produto&result=ok&action=alterar Dados&'.md5(time()).'='.md5(time()).'&opt='.$_POST["numero"].'&user='.$_POST["user"].'&'.md5(time()).'='.md5(time()).'&'.md5(time()).'='.md5(time()));
    exit();
}else{
    header('Location: ../../mesa.php?status=produto&result=ok&action=alterar Dados&'.md5(time()).'='.md5(time()).'&opt='.$_POST["mesa"].'&user='.$_POST["user"].'&'.md5(time()).'='.md5(time()).'&'.md5(time()).'='.md5(time()));
    exit();
}