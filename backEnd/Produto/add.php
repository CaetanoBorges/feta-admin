<?php
include("../FERRAMENTAS/AX.php");
include("../FERRAMENTAS/dbWrapper.php");
include("../FERRAMENTAS/Funcoes.php");

$funcoes = new Funcoes;
$db = new dbWrapper($funcoes::conexao());
$DADOS = $_POST;
$usuario = AX::attr($DADOS["user"]);
$categoria = AX::attr($DADOS["categoria"]);
$nome = AX::attr($DADOS["nome"]);
$preco = AX::attr($DADOS["preco"]);
$quando = AX::attr(date("d-m-Y h:i"));

$img = time()."-".$_FILES["imagem"]["name"];

$res = $db->insert("produto",[
    "usuario"=>$usuario,
    "categoria"=>$categoria,
    "nome"=>$nome,
    "preco"=>$preco,
    "quando"=>$quando,
    "img"=>AX::attr($img)
])->executaQuery();

move_uploaded_file($_FILES["imagem"]["tmp_name"], '../../api/img/'.$img);

if($res){
    header('Location: ../../produtos.php?status=produto&result=ok&action=cadastrar');
    exit();
}else{
    header('Location: ../../add_produto.php?status=produto&result=ok&action=cadastrar');
    exit();
}