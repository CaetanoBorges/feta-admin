function addItem(){
    var idItem = Date.now();
    var itemPorAdicionar =$(`<div class="card rounded-3 mb-4 ver-erro" id="L${idItem}">
          <div class="card-body p-4 item-pedido">
            <input value="L${idItem}" type="hidden" class="form-control form-control-sm itemnum" />
            <div class="row d-flex justify-content-between align-items-center">
              <div class="col-md-2 col-lg-2 col-xl-2">
                <select name="" id="categoria-${idItem}" class="form-control categoria">
                    <option value="">Categoria</option>
                </select>
              </div>
              <div class="col-md-2 col-lg-2 col-xl-2">
                <select name="" id="produto-${idItem}" class="form-control produto" disabled>
                    <option value="">Produto</option>
                </select>
              </div>
              <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                <button class="btn btn-link px-1" id="down_qtd_btn-${idItem}" 
                  onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                  <i class="fas fa-minus"></i>
                </button>

                <input  id="input_qtd-${idItem}" min="0" name="quantity" value="1" type="number"
                  class="form-control form-control-sm quantidade" />

                <button class="btn btn-link px-1" id="up_qtd_btn-${idItem}" 
                  onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                  <i class="fas fa-plus"></i>
                </button>
              </div>
              <div class="col-md-2 col-lg-2 col-xl-2 " >
                <h5 class="mb-0" id="label_preco_unitario-${idItem}"></h5>
                <input type="hidden" value="" class="preco" id="input_preco_unitario-${idItem}">
              </div>
              <div class="col-md-2 col-lg-2 col-xl-2">
                <h5 class="mb-0" id="label_preco_total-${idItem}"></h5>
                <input type="hidden" value="" id="input_preco_total-${idItem}" class="total">
              </div>
              <div class="col-md-1 col-lg-1 col-xl-1 text-end" id="apagar-${idItem}">
                <a href="#!" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
              </div>
            </div>
          </div>
        </div>`);
        $("#itensPorAdicionar").append(itemPorAdicionar);
        function calcularPrecoEmRelacaoQuantidade(){
            //console.error(1);
            var qtd = $("#input_qtd-"+idItem).val();
            var preco_unitario = $("#input_preco_unitario-"+idItem).val();
            var total = qtd * preco_unitario;
            $("#input_preco_total-"+idItem).val(total);
            $("#label_preco_total-"+idItem).html(total);
        }
        $("#apagar-"+idItem).click(function(){
            $("#"+idItem).remove();
        })
        $("#input_qtd-"+idItem).change(function(){
            calcularPrecoEmRelacaoQuantidade()
        })
        $("#up_qtd_btn-"+idItem).click(function(){
            calcularPrecoEmRelacaoQuantidade()
        })
        $("#down_qtd_btn-"+idItem).click(function(){
            calcularPrecoEmRelacaoQuantidade()
        })

        var produtos = JSON.parse(localStorage.getItem("produtos"));
        var categorias = JSON.parse(localStorage.getItem("categorias"));
        //console.log(produtos);
        categorias.forEach(element => {
            //console.error(element);
            var el=$('<option value="'+element+'">'+element+'</option>');
            $("#categoria-"+idItem).append(el);
        });

        $("#categoria-"+idItem).change(function(){
            var categoria = $("#categoria-"+idItem).val();
            if(categoria != ""){
              //console.error(produtos[categoria]);
              $("#produto-"+idItem).html('<option value="">Produto</option>');
              produtos[categoria].forEach(element =>{
                var el=$('<option value="'+element.nome+'">'+element.nome+'</option>');
                $("#produto-"+idItem).append(el);
                $("#produto-"+idItem).removeAttr("disabled");
              })
            }
        });

        $("#produto-"+idItem).change(function(){
            $("#L"+idItem).css({border: "none"});
            var categoria = $("#categoria-"+idItem).val();
            var produto = $("#produto-"+idItem).val();
            if(produto != ""){
              produtos[categoria].forEach(element =>{
                if(element.nome == produto){
                  $("#input_qtd-"+idItem).val(1);
                  $("#input_preco_unitario-"+idItem).val(element.preco);
                  $("#input_preco_total-"+idItem).val(element.preco);

                  $("#label_preco_total-"+idItem).html(element.preco);
                  $("#label_preco_unitario-"+idItem).html(element.preco);
                }
              })
              
            }
        })
        $("#apagar-"+idItem).click(function(){
            $("#L"+idItem).remove();
        })

}

function pedido_total(){
  setInterval(function(){
    try { 
      var todos = document.querySelectorAll(".total");
      var valor = 0;
      todos.forEach(element => {
          valor+= Number(element.value);
      });
      //console.error(valor);
      document.querySelector(".pedido-total").innerHTML = valor;
      document.querySelector(".pedido-itens").innerHTML = todos.length+" item(s)";
    }
    catch(err) {
      console.error("ERRO");
    }
  },1000)
}
pedido_total();
