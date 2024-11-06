<?php


include("../FERRAMENTAS/Funcoes.php");
include("../Administrador.php");

$erro = false;
$email = "";
$codigo = "";
if(isset($_POST['email']) and isset($_POST['codigo'])){

    $email = $_POST['email'];
    $codigo = $_POST['codigo'];

    $conexao = Funcoes::conexao();
    $administrador = new Administrador($conexao);

    if($administrador->verificaCodigo($email,$codigo)){
        
        header('Location: ../../nova_passe.php?email='.$email.'&codigo='.$codigo);

    }else{
        header('Location: ../../verificar_codigo.php?erro=1');
    }


}
