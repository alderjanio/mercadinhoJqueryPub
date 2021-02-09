// TRATAMENTO DE CLICK DO BOTÃO 

function chkCar() {
    var url = "../controller/controller.php";
    var action = "chkCar";
    $.ajax({
        url:url,
        type:"post",
        data:{action},
        success:function(response){
            
            var {amount, price, obj} = JSON.parse(response);
            var somaTotal = 0.00;
            var quantity = 0
            
            
           var ulCar =  document.getElementById('ulCar')
           ulCar.innerHTML = '';
            $.each(obj,function (k,v) {
                    var total = parseFloat(v[4])*parseFloat(v[1]);
                    var desc = v[2];
                    var describle = desc.substr(0,20);
                   describle = describle+"...";
                     ulCar.innerHTML += `<li ><a onclick="funcDel(${v[3]})" style="height:40px" class="ui-shadow ui-btn ui-corner-all "> ${v[0]}, ${describle} 
                     <span class="ui-li-count">${v[4]} X ${v[1]} ||<br> Total: ${total.toFixed(2)} </span> 
                      </a></li>`  
                     somaTotal = parseFloat(somaTotal) + parseFloat(total);
                     quantity = parseInt(quantity) + parseInt(v[4]);
                     console.log(quantity)      
            })
            var decSoma = somaTotal.toFixed(2);
            $("#spSum").html(decSoma);
            $("#spAmount").html(parseInt(quantity));


        }
    })
}
chkCar();
function funcDel(params) {
    var url = "../controller/controller.php";
    var action = "delItemCar";
    var id = params;
    $.ajax({
        url:url,
        type:"post",
        data:{action,id},
        success:function(response){
           console.log(response)
            chkCar();
        }})
}

$("#btnFinalyBuy").on('click',function () {
    var url = "../controller/controller.php";
    var action = "finalyBuy";
    $.ajax({
        url:url,
        type:"post",
        data:{action},
        success:function(response){
            console.log(response) 
            console.log(typeof(response))
            chkCar();
        }
    })
})
var liItens = document.getElementById('ulSearchProduct');
$("#searchProduct").keyup(function(e){
    e.preventDefault();
    textName = $("#searchProduct").val();
    var url = "../controller/controller.php";
    var action = "list";
    
    liItens.innerHTML = "";
    if (textName.length < 3){
        return
    }
    $.ajax({
        url:url,
        type:"post",
        data:{textName,action},
        success:function(response){
           
            jsonData = JSON.parse(response)

            $.each(jsonData,function(k,v){
                $("#showProduto").html(v[1]+","+v[2]+"<br><span> Valor Unitário:"+v[4]+"</span><p><h4>Em estoque:"+v[5]+"</h4></p>");

               liItens.innerHTML += `<li>
                <a class="ui-shadow ui-btn ui-corner-all " onclick="funcAddCar(${v[0]})">
                ${v[1]}, ${v[2]} <span class="ui-li-count"> R$ ${v[4]}</span> </a><li>`;
            })
        }
    })
})
    function funcLogout(){
    var url = "../controller/controller.php";
    var action = "logout";
    $.ajax({
        url:url,
        type:"post",
        data:{action},
        success:function(response){
            window.location.href = "../index.html"
        }

})}
// Busca de produtos atraves de id passado como parametros

function funcAddCar(id) {
    console.log(id)
    $("#hiddenIdLote").val(id);
    $("#popupDialog").popup("open");
}
$("#formAddCar").submit(function (e) {
    e.preventDefault();
    idLote = $("#hiddenIdLote").val();
    amountUnit = $("#amountUnit").val();
    var url = "../controller/controller.php";
    var action = "addCar";
    $.ajax({
        url:url,
        type:"post",
        data:{idLote,amountUnit,action},
        success:function(response){
            $("#searchProduct").val("")
            $("#popupDialog").popup("close");
            liItens.innerHTML = "";

            chkCar();
      

        }})
})



// Eliminar a função  buscar produto quando FuncAddCar estiver funcionando 
// function buscaProduto (params) {
//     var url = "../controller/controller.php";
//     var action = "compra";
//     var id = params;
  
//     console.log(params)

//     $("#popupDialog").popup("open");

//        $("#ulCompras").attr('data-filter','false');
//        document.getElementById('ulSearchProduct').innerHTML = "";

      
    
//        $.ajax({
//            url:url,
//            type:"post",
//            data:{id,action},
//            success:function(response){
         
//                chkCar();
         

//            }})
//    }