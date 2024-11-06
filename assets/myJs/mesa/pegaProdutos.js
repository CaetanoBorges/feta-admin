$(document).ready(function(){
    function uniq(a) {
        return Array.from(new Set(a));
    }
    var user = dadosUsuario.usuario;
    $.get("backEnd/jsRequests/produtos.php",{user: user}).done(function(dados){
        //console.log(dados);
        var obj = JSON.parse(dados);
        var categoria = [];
        var produto = {};
        obj.forEach(element => {
            if(categoria[element.categoria] == [element.categoria]){
                
            }else{
                categoria.push(element.categoria)
            }
        });
        categoria = uniq(categoria);
        categoria.forEach(cat => {
            produto[cat] = [];
        });
        obj.forEach(element => {
            produto[element.categoria].push(element);
        });
        //console.info(produto);
        localStorage.setItem("produtos",JSON.stringify(produto));
        localStorage.setItem("categorias",JSON.stringify(categoria));
    })
});