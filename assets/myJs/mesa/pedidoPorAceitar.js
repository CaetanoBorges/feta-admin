function aceitarPedido(id) {
    var user = dadosUsuario.usuario;
    var quem = dadosUsuario.identificador;
    //console.log(id, 1);
    loader.abrir();
    $.post("backEnd/jsRequests/aceitarPedido.php",{user: user,id: id,quem: quem}).done(function (dados) {
        var obj = JSON.parse(dados);
        var itens = JSON.parse(obj.payload.itens);
        var item = ``;
        if (obj.ok) {
            var totalItem = 0;
            $("#" + id).remove();
            itens.forEach(element => {
                console.log(element.total);
                totalItem += Number(element.total);
                item += `<div class="mb-3">
                <div class="btn btn-light m-1 btn-sm position-relative"  style="width:97.5%;cursor:initial;">${(element.nome)}</div>
                    <div class="container">
                        <div class="row">
                            <p class="col-sm btn btn-light m-1 btn-sm" style="cursor:initial">${(element.preco)}</p>
                            <p class="col-sm btn btn-light m-1 btn-sm" style="cursor:initial">${(element.qtd)}</p>
                            <p class="col-sm btn btn-light m-1 btn-sm" style="cursor:initial">${(element.total)}</p>
                        </div>
                    </div>
                </div>`;
            });
            var pedidoAceite=`<div class="border border-success rounded p-2">   
            <p style="float:right;line-height: 19px">${(itens.length)} Item(s) no pedido <br> Total: <b>${totalItem}</b></p>
            ${item}</div><br>`;
            $("#collapseExample .card-body").append(pedidoAceite);
            var total_mesa = $(".total_mesa").html();
            $(".total_mesa").html((Number(total_mesa)+totalItem));
            
            var qtd_pedidos_aceites = $(".qtd_pedidos_aceites").html();
            $(".qtd_pedidos_aceites").html((Number(qtd_pedidos_aceites)+1));

            var qtd_pedidos_aceitar = $(".qtd_pedidos_aceitar").html();
            $(".qtd_pedidos_aceitar").html((Number(qtd_pedidos_aceitar)-1));

            notificacao.sms("Pedido aceite");
        }
        if (!obj.ok) {
            notificacao.sms("Erro, repita a operação",1);
        }
    }).always(function (a) {
        loader.fechar();
    })
}

function rejeitarPedido(id) {
    var user = dadosUsuario.usuario;
    //console.log(id, 1);
    loader.abrir();
    $.post("backEnd/jsRequests/rejeitarPedido.php",{user: user,id: id}).done(function (dados) {
        //console.log(dados);
        var obj = JSON.parse(dados);
        if (obj.ok) {
            $("#" + id).remove();
            var qtd_pedidos_aceitar = $(".qtd_pedidos_aceitar").html();
            $(".qtd_pedidos_aceitar").html((Number(qtd_pedidos_aceitar)-1));

            notificacao.sms("Pedido rejeitado");
        }
        if (!obj.ok) {
            notificacao.sms("Erro, repita a operação",1);
        }
    }).always(function (a) {
        loader.fechar();
    })
}

function alterarQtdItem(id, itemnum) {
    var user = dadosUsuario.usuario;
    var quantidade = $("#itemqtd"+itemnum).val();
    var preco = $("#itempreco"+itemnum).html();
    var total = (Number(preco)*quantidade);
    $("#itemtotal"+itemnum).html(total);
    
    loader.abrir();
    $.post("backEnd/jsRequests/alterarQtd.php",{user: user,id: id,itemnum: itemnum, qtd: quantidade, total: total}).done(function (dados) {
        
        var obj = JSON.parse(dados);

        $(".totalpedido"+id).html(obj.payload);
        if (obj.ok) {
            notificacao.sms("Quantidade do item alterada");
        }
        if (!obj.ok) {
            notificacao.sms("Erro, repita a operação",1);
        }
    }).always(function (a) {
        loader.fechar();
    })
}

function removerItem(id, itemnum) {
    var user = dadosUsuario.usuario;
    loader.abrir();
    $.post("backEnd/jsRequests/removerItem.php",{user: user,id: id,itemnum: itemnum}).done(function (dados) {
        console.log(dados);
        var obj = JSON.parse(dados);
        if (obj.ok) {
            $("#"+id+"-"+itemnum).remove();
            $(".totalpedido"+id).html(obj.payload);
            notificacao.sms("Quantidade do item alterada");
        }
        if (!obj.ok) {
            notificacao.sms("Erro, repita a operação",1);
        }
    }).always(function (a) {
        loader.fechar();
    })
}