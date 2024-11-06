<?php

include("../FERRAMENTAS/Funcoes.php");
//Load Composer's autoloader

$dados = $_POST;

if(true){

    if(true){
        
        $conexao = Funcoes::conexao();
        $query=$conexao->prepare("UPDATE gerente SET nome=?, telefone=?, email=? WHERE identificador=?");
        $query->bindValue(1,$dados["nome"]);
        $query->bindValue(2,$dados["telefone"]);
        $query->bindValue(3,$dados["email"]);
        $query->bindValue(4,$dados["membro"]);
        $query->execute();
        
        header('Location: ../../equipa.php');

    }

}
