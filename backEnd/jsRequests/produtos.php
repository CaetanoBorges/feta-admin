<?php
#error_reporting(0);
include("../FERRAMENTAS/AX.php");
include("../FERRAMENTAS/dbWrapper.php");
include("../FERRAMENTAS/Funcoes.php");

$funcoes = new Funcoes;
$db = new dbWrapper($funcoes::conexao());
$DADOS = $_GET;
$usuario = $DADOS["user"];
$res = $db->select()->from("produto")->where(["usuario='$usuario'"])->pegaResultados();
echo json_encode($res);