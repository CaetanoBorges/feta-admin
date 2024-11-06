<?php
include("../FERRAMENTAS/AX.php");
include("../FERRAMENTAS/dbWrapper.php");
include("../FERRAMENTAS/Funcoes.php");

$funcoes = new Funcoes;
$db = new dbWrapper($funcoes::conexao());
$DADOS = $_POST;
$usuario = AX::attr($DADOS["user"]);
$produto = AX::attr($DADOS["produto"]);

$img = time()."-".$_FILES["imagem"]["name"];

$produtoIMG= $db->select(["img"])->from("produto")->where(["identificador=$produto","usuario=$usuario"])->pegaResultado()["img"];
$res = $db->update("produto")->set(["img='$img'"])->where(["identificador=$produto","usuario=$usuario"])->executaQuery();

move_uploaded_file($_FILES["imagem"]["tmp_name"], '../../api/img/'.$img);
unlink("../../api/img/".$produtoIMG);

if($res){
    header('Location: ../../produto.php?status=produto&result=ok&action=alterar Imagem&'.md5(time()).'='.md5(time()).'&id='.$_POST["produto"].'&user='.$_POST["user"].'&'.md5(time()).'='.md5(time()).'&'.md5(time()).'='.md5(time()));
    exit();
}else{
    header('Location: ../../produto.php?status=produto&result=ok&action=alterar Imagem&'.md5(time()).'='.md5(time()).'&id='.$_POST["produto"].'&user='.$_POST["user"].'&'.md5(time()).'='.md5(time()).'&'.md5(time()).'='.md5(time()));
    exit();
}