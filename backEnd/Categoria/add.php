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

$res = $db->select()->from("produtocategoria")->where(["nome=$nome"])->pegaResultados();
if(count($res)>0){
    header('Location: ../../add_categoria.php');
    exit();
}

$res = $db->insert("produtocategoria",[
    "usuario"=>$usuario,
    "nome"=>$nome
])->executaQuery();

if($res){
    header('Location: ../../produtos.php?status=categoria&result=ok&action=cadastrar');
    exit();
}else{
    header('Location: ../../add_categoria.php?status=categoria&result=ok&action=cadastrar');
    exit();
}