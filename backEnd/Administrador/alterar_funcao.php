<?php

include("../FERRAMENTAS/Funcoes.php");

$dados = $_POST;

if(true){

    if(true){
        
        $conexao = Funcoes::conexao();
        $query=$conexao->prepare("UPDATE gerente SET role=? WHERE identificador=?");
        $query->bindValue(1,$dados["funcao"]);
        $query->bindValue(2,$dados["membro"]);
        $query->execute();
        
        header('Location: ../../equipa.php');

    }

}
