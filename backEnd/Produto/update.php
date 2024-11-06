<?php
include("../FERRAMENTAS/AX.php");
include("../FERRAMENTAS/dbWrapper.php");
include("../FERRAMENTAS/Funcoes.php");

$funcoes = new Funcoes;
$db = new dbWrapper($funcoes::conexao());
$DADOS = $_POST;
$usuario = AX::attr($DADOS["user"]);
$produto = AX::attr($DADOS["produto"]);
$categoria = AX::attr($DADOS["categoria"]);
$nome = AX::attr($DADOS["nome"]);
$preco = AX::attr($DADOS["preco"]);

$res = $db->update("produto")->set(["categoria=$categoria","nome=$nome","preco=$preco"])->where(["identificador=$produto","usuario=$usuario"])->executaQuery();

if($res){
    header('Location: ../../produto.php?status=produto&result=ok&action=alterar Dados&'.md5(time()).'='.md5(time()).'&id='.$_POST["produto"].'&user='.$_POST["user"].'&'.md5(time()).'='.md5(time()).'&'.md5(time()).'='.md5(time()));
    exit();
}else{
    header('Location: ../../produto.php?status=produto&result=ok&action=alterar Dados&'.md5(time()).'='.md5(time()).'&id='.$_POST["produto"].'&user='.$_POST["user"].'&'.md5(time()).'='.md5(time()).'&'.md5(time()).'='.md5(time()));
    exit();
}