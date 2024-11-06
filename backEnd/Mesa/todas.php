<?php
include("../FERRAMENTAS/AX.php");
include("../FERRAMENTAS/dbWrapper.php");
include("../FERRAMENTAS/Funcoes.php");

$funcoes = new Funcoes;
$db = new dbWrapper($funcoes::conexao());
$DADOS = $_POST;
$usuario = AX::attr($DADOS["user"]);
$numero = AX::attr($DADOS["numero"]);
$descricao = AX::attr($DADOS["descricao"]);
$vip = AX::attr($DADOS["vip"]);

$res = $db->select()->from("mesa")->where(["numeromesa=$numero"])->pegaResultados();
if(count($res)>0){
    header('Location: ../../add_mesa.php');
    exit();
}

$res = $db->insert("mesa",[
    "usuario"=>$usuario,
    "numeromesa"=>$numero,
    "descricao"=>$descricao,
    "vip"=>$vip
])->executaQuery();

if($res){
    header('Location: ../../mesas.php?status=mesa&result=ok&action=cadastrar');
    exit();
}else{
    header('Location: ../../add_mesa.php?status=mesa&result=ok&action=cadastrar');
    exit();
}