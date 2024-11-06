<?php

include("../FERRAMENTAS/Funcoes.php");

$dados = $_POST;

if(true){

    if(true){
        
        $conexao = Funcoes::conexao();
        $query=$conexao->prepare("INSERT INTO gerente (nome, telefone, email, passe, role, usuario) VALUES (?, ?, ?, ?, ?, ?)");
        $query->bindValue(1,$dados["nome"]);
        $query->bindValue(2,$dados["telefone"]);
        $query->bindValue(3,$dados["email"]);
        $query->bindValue(4,Funcoes::fazHash($dados["passe"]));
        $query->bindValue(5,$dados["funcao"]);
        $query->bindValue(6,$dados["user"]);
        $query->execute();
        
        header('Location: ../../equipa.php');

    }

}
