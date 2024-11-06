<?php
header("Access-Control-Allow-Origin: *");

include("Classes/Funcoes.php");
include("Classes/Mesa.php");

$conexao = Funcoes::conexao();

$dados = $_GET;
$Mesa = new Mesa($conexao);

if($Mesa->entrar($dados['mesa'], $dados['restaurante'])){
    $return['payload'] = "Mesa disponivel";
    $return['ok'] = true;

    echo json_encode($return);
    return;
}

$return['payload'] = "Mesa indisponivel";
$return['ok'] = false;
echo json_encode($return);