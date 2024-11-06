<?php

use Minishlink\WebPush\VAPID;
use Minishlink\WebPush\WebPush;
use Minishlink\WebPush\Subscription;

include("../FERRAMENTAS/Funcoes.php");

require '../vendor/autoload.php';

if(isset($_POST['usuario']) and !empty($_POST['usuario'])){
     
    $vapid = (array) json_decode(file_get_contents("vapid.json"));

    $webPush = new WebPush([
        "VAPID" => [
            "subject" => $vapid['subject'],
            "publicKey" => $vapid['publicKey'],
            "privateKey" => $vapid['privateKey']
        ]
    ]);

    $query = Funcoes::conexao() -> prepare("SELECT * FROM push WHERE usuario = ?");
    $query->bindValue(1,$_POST['usuario']);
    $query->execute();
    $resPush = $query->fetchAll(\PDO::FETCH_ASSOC);

    $notificados = 0;
    foreach($resPush as $k => $v){
        
        $subscription = Subscription::create([
            "endpoint" => $v['endpoint'],
            "contentEncoding" => "aesgcm",
            "authToken" => $v['authtoken'],
            "keys" => [
                "auth" => $v['authtoken'],
                "p256dh" => $v['p256dh']
            ]
        ]);
        $result = $webPush -> sendOneNotification(
            $subscription,
            json_encode([
                "title" => $_POST['titulo'],
                "body" => $_POST['mensagem'],
                "data" => "1",
                "actions" => [
                    
                ]
            ])
        );

        if ($result -> isSuccess()) {
            $notificados += 1;
        }
        else {
            $conexao = Funcoes::conexao();
            $query = $conexao -> prepare("DELETE FROM push WHERE usuario = ? AND id = ?");
            $query->bindValue(1,$v['id']);
            $query->execute();
        }
    }
    
    $quando = date("d-m-Y h:i:s");
    $conexao = Funcoes::conexao();
    $query = $conexao -> prepare("INSERT INTO notificacoes (usuario, notificacao, quando, subscritores) VALUES (?, ?, ?, ?)");
    $query->bindValue(1,$_POST['usuario']);
    $query->bindValue(2,$_POST['mensagem']);
    $query->bindValue(3,$quando);
    $query->bindValue(4,$notificados);
    $query->execute();

    echo json_encode(["payload"=>["notificados"=>$notificados,"mensagem"=>$_POST['mensagem'],"quando"=>$quando],"ok"=>true]);

}