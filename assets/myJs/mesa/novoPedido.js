function novoPedido() {
    var user = dadosUsuario.usuario;
    var quem = dadosUsuario.identificador;
    var itens = [];
    var passaSemErro = true;
    (document.querySelectorAll(".item-pedido")).forEach(function (params) { 
        var itemnum = (params.querySelector(".itemnum").value);
        var categoria = (params.querySelector(".categoria").value);
        var produto = (params.querySelector(".produto").value);
        var quantidade = (params.querySelector(".quantidade").value);
        var preco = (params.querySelector(".preco").value);
        var total = (params.querySelector(".total").value);

        var item = { "itemnum":itemnum, "nome": produto, "preco": preco, "qtd": quantidade, "total": total};
        itens.push(item);
        if(categoria.length < 2 || produto.length < 2 || quantidade.length < 1 || preco.length < 2 || total.length < 2){
            document.querySelector("#"+itemnum).style.border = "4px ridge red";
            notificacao.sms("Erro no pedido verifique os itens",1);
            passaSemErro = false;
        }else{
            document.querySelector("#"+itemnum).style.border = "none";
        }
    });
    
    
    
    //console.log(id, 1);
    if(!passaSemErro || itens.length <= 0){ return; }
    var pedido_total = $(".pedido-total").html();
    var mesa_conta = $("#id_conta").val();
    console.log(user,itens,pedido_total,mesa_conta);
    loader.abrir();
    $.post("backEnd/jsRequests/pedidoNovo.php",{user: user,total: pedido_total, conta: mesa_conta, itens: JSON.stringify(itens), quem: quem}).done(function (dados) {
        console.log(dados);
        
        var obj = JSON.parse(dados);
        var id = obj.payload.identificador;
        var itens = JSON.parse(obj.payload.itens);
        var item = ``;
        if (obj.ok) {
            var totalItem = 0;
            itens.forEach(element => {
                var itemId = id+"-"+element["itemnum"];
                console.log(element.total);
                totalItem += Number(element.total);
                item += `<div class="mb-3" id="${itemId}">
                <div class="btn btn-light m-1 btn-sm position-relative"  style="width:97.5%;cursor:initial;">${(element.nome)} <img src="assets/svg/trash.svg" class="position-absolute" style="cursor:pointer;width:15px;right: 5px;top: 5px;" onclick="removerItem('${id}','${(element["itemnum"])}')"></div>
                    <div class="container">
                        <div class="row">
                            <p class="col-sm btn btn-light m-1 btn-sm" style="cursor:initial" id="itempreco${(element["itemnum"])}">${(element.preco)}</p>
                            <input type="number" class="col-sm btn btn-light m-1 btn-sm" value="${element.qtd}" placeholder="${element.qtd}" min="1" onchange="alterarQtdItem('${id}','${(element["itemnum"])}')" id="itemqtd${(element["itemnum"])}">
                            <p class="col-sm btn btn-light m-1 btn-sm" style="cursor:initial" id="itemtotal${(element["itemnum"])}">${(element.total)}</p>
                        </div>
                    </div>
                </div>`;
            });
            var pedido=`<div class="border border-secondary rounded p-2" id="${id}">  
            <div class="btn-group m-1" role="group" aria-label="Basic mixed styles example">
                <img src="assets/svg/accept.svg" class="mr-3" style="cursor:pointer;width:35px" onclick="aceitarPedido(${(id)})">
                <img src="assets/svg/reject.svg" style="cursor:pointer;width:35px" onclick="rejeitarPedido(${(id)})">
            </div> 
            
            <p style="float:right;line-height: 19px">${(itens.length)} Item(s) no pedido <br> Total: <b><span class="totalpedido${id}">${totalItem}</span></b></p>
            ${item}</div><br>`;

            $("#pedidos_por_aceitar").append(pedido);
            var qtd_pedidos_aceitar = $(".qtd_pedidos_aceitar").html();
            $(".qtd_pedidos_aceitar").html((Number(qtd_pedidos_aceitar)+1));
            notificacao.sms("Novo Pedido Em Espera");
            $(document).scrollTop(0);
            (document.querySelectorAll(".item-pedido")).forEach(function (params) {
                params.remove();
            });
        }
        if (!obj.ok) {
            notificacao.sms("Erro, repita a operação",1);
        }
    }).always(function (a) {
        loader.fechar();
    })
}

