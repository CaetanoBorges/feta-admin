<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';


include("../FERRAMENTAS/Funcoes.php");
include("../Administrador.php");

$erro = false;
$email = "";
if(isset($_POST['email'])){
    $email = $_POST['email'];


    $conexao = Funcoes::conexao();
    $administrador = new Administrador($conexao);

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    if($administrador->verificaEmail($email)){
        
        $seisDigitos = Funcoes::seisDigitos(6);
        $administrador->setCodigo($email, $seisDigitos);
        Funcoes::enviaEmail($mail, $email, "Código de recuperação ".$seisDigitos, "O seu número de verificação é: ".$seisDigitos);
        header('Location: ../../verificar_codigo.php');

    }else{
        header('Location: ../../receber_codigo.php?erro=1');
    }


}
