<?php
#error_reporting(1);


include("../FERRAMENTAS/Funcoes.php");
include("../Administrador.php");
if(isset($_POST['email']) and isset($_POST['passe'])){


    $email = $_POST['email'];

    $passe = Funcoes::fazHash($_POST['passe']);
    
    $conexao = Funcoes::conexao(); 
    $administrador = new Administrador($conexao);

    $res = $administrador->login($email, $passe);
    
    if($res){
        
        $metadata = $administrador->getByEmail($email);
        
        session_start();
        $_SESSION['REST-admin'] = true;
        $_SESSION['metadata'] = $metadata;
        header('Location: ../../index.php');

    }else{
        header('Location: ../../index.php?erro=1');
    }


}
