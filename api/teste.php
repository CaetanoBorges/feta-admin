<?php
#header("Access-Control-Allow-Origin: *");

#include("Classes/Funcoes.php");
#include("Classes/Mesa.php");

#$conexao = Funcoes::conexao();

#$Mesa = new Mesa($conexao);

#var_dump($Mesa->detalhesMesa("001"));

require_once('Ferramentas/PHPImage.php');

$image = new PHPImage('01.png');
$image->batchResize('img/'.time().'.jpg', array(
	array(100, 100, true, true),
));
$image->resize(100, 100, true, true);
unlink('01.png');