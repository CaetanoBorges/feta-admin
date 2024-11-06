<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';


include("../Funcoes.php");
include("../Administrador.php");
include("../LogPasse.php");

if(isset($_POST['administrador'])){
    $administrador = $_POST['administrador'];


    $conexao = Funcoes::conexao();
    $LogPasse = new LogPasse($conexao);
    
    echo json_encode($LogPasse->get($administrador));


}
