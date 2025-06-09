<?php

$qtdClientes = $dbWapper->select(['COUNT(*)'])->from('cliente')->pegaResultado()['COUNT(*)'];
$qtdNormais = $dbWapper->select(['COUNT(*)'])->from('cliente')->WHERE(["tipo = '0'"])->pegaResultado()['COUNT(*)'];
$qtdEmpresas = $dbWapper->select(['COUNT(*)'])->from('cliente')->WHERE(["tipo = '1'"])->pegaResultado()['COUNT(*)'];
$qtdAgentes = $dbWapper->select(["nome","foto_bi","provincia"])->from('cliente')->WHERE(["tipo = '2'"])->orderBy('RAND()')->limit(5)->pegaResultados();

var_dump($qtdAgentes);    