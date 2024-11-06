<?php
#error_reporting(0);
include("../FERRAMENTAS/AX.php");
include("../FERRAMENTAS/dbWrapper.php");
include("../FERRAMENTAS/Funcoes.php");

function verTodas($db, $usuario, $mesa, $pageNum = 1, $pageSize = 5)
{
    $query = $db->conexao()->prepare("SELECT COUNT(*) FROM conta WHERE usuario = ?  AND mesa = ?");
    $query->bindValue(1, $usuario);
    $query->bindValue(2, $mesa);
    $query->execute();
    $re = $query->fetch(\PDO::FETCH_ASSOC);
    
    $paginas = ceil($re["COUNT(*)"] / $pageSize);

    $var = ($pageNum - 1) * $pageSize;

    $query = $db->conexao()->prepare("SELECT * FROM conta WHERE usuario = ?  AND mesa = ? ORDER BY identificador DESC LIMIT $pageSize OFFSET $var");
    $query->bindValue(1, $usuario);
    $query->bindValue(2, $mesa);
    $query->execute();
    $contas = $query->fetchAll(\PDO::FETCH_ASSOC);

    $contasAnteriores = [];
    foreach($contas as $conta){
        $conta = (array) $conta;
        
        
        $query = $db->conexao()->prepare("SELECT * FROM pedido WHERE `usuario` = ? AND `conta` = ?  AND `aceite` = ? ");
        $query->bindValue(1, $usuario);
        $query->bindValue(2, $conta['identificador']);
        $query->bindValue(3, 1);
        $query->execute();
        $pedidos = $query->fetchAll(\PDO::FETCH_ASSOC);
        
        array_push($contasAnteriores,["conta"=>$conta, "pedidos"=>$pedidos]);

    }

    return (['payload' => $contasAnteriores, 'ok' => true, 'paginacao' => ['totalRegistos' => $re["COUNT(*)"], 'paginas' => $paginas, 'atual' => $pageNum]]);
}

$funcoes = new Funcoes;
$db = new dbWrapper($funcoes::conexao());
$DADOS = $_POST;
$usuario = $DADOS["user"];
$mesa = $DADOS["mesa"];
$pagina = $DADOS["pagina"];

//$db->update("pedido")->set(["aceite='1'"])->where(["identificador='$id'","usuario='$usuario'"])->executaQuery();
//$res = $db->select()->from("conta")->where(["usuario='$usuario'", "mesa='$mesa'"])->pegaResultados();

$res = verTodas($funcoes, $usuario, $mesa, $pagina);
echo json_encode($res);
