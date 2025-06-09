<?php
include("../FERRAMENTAS/AX.php");
include("../FERRAMENTAS/dbWrapper.php");
include("../FERRAMENTAS/Funcoes.php");

$funcoes = new Funcoes;
$db = new dbWrapper($funcoes::conexao());
$DADOS = $_POST;
$usuario = AX::attr($DADOS["user"]);
$nome = AX::attr($DADOS["nome"]);
$nome = str_replace(" ","",$nome);
$nome = str_replace(".","",$nome);
$nome = str_replace(",","",$nome);
$categoria = AX::attr($DADOS["categoria"]);
$categoria = str_replace(" ","",$categoria);
$categoria = str_replace(".","",$categoria);
$categoria = str_replace(",","",$categoria);

$res = $db->select()->from("produtocategoria")->where(["nome=$nome"])->pegaResultados();
if(count($res)>0){
    header('Location: ../../produtos.php');
    exit();
}

$res = $db->update("produtocategoria")->set(["nome=$nome"])->where(["usuario=$usuario","nome=$categoria"])->executaQuery();
$res = $db->update("produto")->set(["categoria=$nome"])->where(["usuario=$usuario","categoria=$categoria"])->executaQuery();

if($res){
    header('Location: ../../produtos.php?status=categoria&result=ok&action=alterar');
    exit();
}else{
    header('Location: ../../produtos.php?status=categoria&result=fail&action=alterar');
    exit();
}