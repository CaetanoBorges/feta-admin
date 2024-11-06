<?php
include("../FERRAMENTAS/AX.php");
include("../FERRAMENTAS/dbWrapper.php");
include("../FERRAMENTAS/Funcoes.php");

$funcoes = new Funcoes;
$db = new dbWrapper($funcoes::conexao());
$DADOS = $_POST;
$usuario = AX::attr($DADOS["user"]);
$reclamacao = AX::attr($DADOS["reclamacao"]);


$res = $db->update("reclamacao")->set(["estado='1'"])->where(["usuario=$usuario","identificador=$reclamacao"])->executaQuery();
header('Location: ../../reclamacoes.php?status=reclamacao&result=ok&action=visto');
    exit();