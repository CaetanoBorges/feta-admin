<?php

include("../FERRAMENTAS/Funcoes.php");
include("../Administrador.php");

$erro = false;
$email = "";
$codigo = "";
if(isset($_POST['email']) and isset($_POST['codigo']) and isset($_POST['passe'])){

    $email = $_POST['email'];
    $codigo = $_POST['codigo'];

    $passe = $_POST['passe'];

    $conexao = Funcoes::conexao(); 
    $administrador = new Administrador($conexao);

    if($administrador->verificaCodigo($email, $codigo)){
        
        $hashPasse = Funcoes::fazHash($passe);

        $administrador->alterarPasse($email, $hashPasse);
        $administrador->setCodigo($email, "");

        $metadata = $administrador->getByEmail($email);
        
        session_start();
        $_SESSION['REST-admin'] = true;
        $_SESSION['metadata'] = $metadata;
        header('Location: ../../index.php');

    }else{
        header('Location: ../../verificar_codigo.php?erro=1');
    }


}
