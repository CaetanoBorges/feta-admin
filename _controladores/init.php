<?php
include_once('backEnd/FERRAMENTAS/Funcoes.php');
include_once('backEnd/FERRAMENTAS/AX.php');
include_once('backEnd/FERRAMENTAS/dbWrapper.php');

$conexao = Funcoes::conexao();
$dbWapper = new dbWrapper($conexao);