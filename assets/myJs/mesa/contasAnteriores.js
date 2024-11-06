function abrirConta() {
    var user = dadosUsuario.usuario;
    var quem = dadosUsuario.identificador;
    var mesa = $("#id_mesa").val();
    var cliente = $("#cliente").val();
    
    if (cliente.length < 5) {
        notificacao.sms("Precisa de um nome maior", 1);
        return;
    } else {
        loader.abrir();
        $.post("backEnd/jsRequests/abrirConta.php",{user: user, mesa: mesa, cliente: cliente, quemabriu: quem}).done(function (dados) {
            console.log(dados);
            
            var obj = JSON.parse(dados);
            if (obj.ok) {
                location.reload();
            }
            if (!obj.ok) {
                notificacao.sms("Erro, repita a operação",1);
            }
        }).always(function (a) {
            loader.fechar();
        })
    }
}

function contasAnteriores(pagina = 1) {
    var user = dadosUsuario.usuario;

    //console.log(id, 1);
    var mesa = $("#id_mesa").val();

    
    $.post("backEnd/jsRequests/contasAnteriores.php", { user: user, mesa: mesa, pagina: pagina }).done(function (dados) {
        //console.log(dados);

        var obj = JSON.parse(dados);
        if (obj.ok) {

            var conta = ``;
            var itenss = 0;
            obj.payload.forEach((val, key) => {
                //console.error(val, key);

                var pedido = ``;
                itenss = (val.pedidos).length * 205;
                //console.warn(itenss);
                (val.pedidos).forEach((elemento, k) => {
                    var itens = JSON.parse(elemento.itens);

                    var item = ``;
                    var totalItem = 0;
                    itens.forEach(element => {
                        totalItem += Number(element.total);
                        item += `<div class="mb-3" >
                <div class="btn btn-light m-1 btn-sm position-relative"  style="width:97.5%;cursor:initial;">${(element.nome)}</div>
                    <div class="container">
                        <div class="row">
                            <p class="col-sm btn btn-light m-1 btn-sm" style="cursor:initial" >${(element.preco)}</p>
                            <p class="col-sm btn btn-light m-1 btn-sm" style="cursor:initial" >${(element.qtd)}</p>
                            <p class="col-sm btn btn-light m-1 btn-sm" style="cursor:initial" >${(element.total)}</p>
                        </div>
                    </div>
                </div>`;
                    });
                    pedido += `
                    
                    <div class="border rounded p-2" style="display:inline-block;width:200px;margin:5px;border:1px solid #eaeaea"> 
                    <h4 style="background-color:#eaeaea;font-size:10px;text-align:center;font-weight:light;border-radius:3px 3px 0 0;padding:5px">${(k + 1)}</h4>
                    <p style="line-height: 19px">${(itens.length)} Item(s) no pedido <br> Total: <b><span>${totalItem}</span></b></p>
                    <p style="line-height: 13px;font-size:14px;"><b><span>${elemento.quando}</span></b></p>
                    ${item}</div>`;

                })

                conta += `<br>
                    <div class="border border-secondary rounded p-2">  
                        <div style="font-size:12px;line-height:13px;padding:3px;cursor:pointer;" data-toggle="collapse" data-target="#collapseConta${(val.conta.identificador)}">
                            <div>
                                <p class="m-0" style="line-height:14px;">Cliente: ${(val.conta.cliente)}</p>
                                <p class="m-0" style="float:right;line-height:14px;">Fecho: ${(val.conta.fecho)}</p>
                                <p class="m-0" style="line-height:14px;">Abertura: ${(val.conta.quando)}</p>
                            </div>
                            <div>
                                <p class="m-0" style="float:right;line-height:14px;">${(val.pedidos.length)} pedidos</p>
                                <p class="m-0" style="line-height:14px;">Valor: <i>${(val.conta.valor)}</i></p>
                                <p class="m-0" style="float:right;line-height:14px;">Total: <b>${(val.conta.total)}</b></p>
                                <p class="m-0" style="line-height:14px;">Desconto: ${(val.conta.desconto)}</p>
                            </div>
                        </div> 
                        <div style="width:100%;overflow-x:scroll;"  class="collapse" id="collapseConta${(val.conta.identificador)}">
                            <div style="display:flex;width:fit-content">
                                ${pedido}
                            </div>
                        </div>
                    </div>`;

            })
            //console.warn(obj.payload[0].conta);
        }
        //RENDER
        $("#contas-render").html("");
        $("#paginacao").html("");

        $("#contas-render").append(conta);

        for (var i = 1; i <= obj.paginacao.paginas; i++) {
            const sectionBox = $("#paginacao");
            if (obj.paginacao.atual == i) {
                $(`<li class="page-item" disabled"><a class="page-link border border-danger" href="#" tabindex="-1">${i}</a></li>`).appendTo(sectionBox);
            } else {
                $(`<li class="page-item"><a class="page-link" href="#" onclick="contasAnteriores(${i})">${i}</a></li>`).appendTo(sectionBox)
            }

        }
        if (!obj.ok) {
            notificacao.sms("Erro, repita a operação", 1);
        }
    }).always(function (a) {
        
    })
}

