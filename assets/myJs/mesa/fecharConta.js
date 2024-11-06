function pagarConta() {
    var total_pago = $("#total-pago").val();
    var total_mesa = $(".total_mesa").html();

    if(Number(total_pago) < Number(total_mesa)){ 
        notificacao.sms("O valor entregue não condiz com a conta",1);
        return; 
    }else{
        $("#fecharContaConta").html(total_mesa);
        $("#fecharContaTotal").html(total_mesa);
        $('#fecharConta').modal();
        $("#fecharContaDesconto").change(function(){
            var desconto = Number($("#fecharContaDesconto").val());
            var conta = Number($("#fecharContaConta").html());
            var total_mesa = conta - desconto;
            if(total_mesa < 1){  
                $("#fecharContaTotal").html(($("#fecharContaConta").html()));
                $("#fecharContaDesconto").val(0)
            }else{
                $("#fecharContaTotal").html(total_mesa);
            }
            

        })
    } 
}

function fecharConta() {

    var user = dadosUsuario.usuario;
    var quemfechou = dadosUsuario.identificador;

    //console.log(id, 1);
    var mesa = $("#id_mesa").val();
    var conta = $("#id_conta").val();
    var cliente = $("#nome_cliente").val();
    var valor = Number($("#fecharContaConta").html());
    var desconto = Number($("#fecharContaDesconto").val());
    var total = $("#fecharContaTotal").html();
    loader.abrir();
    $.post("backEnd/jsRequests/fecharConta.php",{user: user,mesa: mesa, conta: conta, cliente:cliente, valor: valor, desconto: desconto, total: total,quemfechou: quemfechou}).done(function (dados) {
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

