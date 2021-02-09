<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
</head>
<body>
               
    <div data-role="page" id="pageCadastraProduto" class="justify-center">
    <div style="margin: auto;padding: 8px;">
     <h4 align="center"> Cadastro de novas compras </h4>
    
        <form class="ui-filterable">
            <input id="textName" data-type="search" placeholder="Nome do produto">
        </form>
        <ul data-role="listview" data-filter="true" data-filter-reveal="true"
        id="ulCompras" data-input="#textName" data-inset="true">
            
        </ul>
        <form id="formCadastroProduto">
            <input type="text" name="textdescrible" id="textdescrible" placeholder="desc: ex: 1 k , marca">
            <input type="text" name="textAmount" id="textAmount" placeholder="Quantidade">
            <input type="text" name="textPriceBuy" id="textPriceBuy" placeholder="Valor de Compra">
            <input type="text" name="textPrice" id="textPrice" placeholder="Valor">
            <input value="Cadastrar" type="submit" class="ui-shadow ui-btn ui-corner-all " id="btnCadastroProdutos">
         </form>
    </div>
    </div>
    <script>
       
            $("#textName").click(function(){
                document.getElementById('ulCompras').innerHTML = ""
            })
         function buscaProduto (params) {
         var url = "../controller/controller.php";
         var action = "buscaid";
         var id = params;
            $("#ulCompras").attr('data-filter','false');
            document.getElementById('ulCompras').innerHTML = "";

           
         
            $.ajax({
                url:url,
                type:"post",
                data:{id,action},
                success:function(response){
                    
                    $.each(JSON.parse(response), function (k,v) {
                        
                        $("#textdescrible").val(v[2])
                        $("#textName").val(v[1])
                      
                    })

                }})
        }
        $("#searchProduct").keyup(function(e){
            e.preventDefault();
            textName = $("#searchProduct").val();
            var url = "../controller/controller.php";
            var action = "list";
            var liItens = document.getElementById('ulSearchProduct');
            liItens.innerHTML = "";
            if (textName.length < 3){
                return
            }
            $.ajax({
                url:url,
                type:"post",
                data:{textName,action},
                success:function(response){
                    console.log(typeof(response));
                    jsonData = JSON.parse(response)

                    $.each(jsonData,function(k,v){
                        liItens.innerHTML +=      
                       liItens.innerHTML += `<li>
                        <a class="ui-shadow ui-btn ui-corner-all " onclick="buscaProduto(${v[0]})">
                        ${v[1]}, ${v[2]} </a><li>`;
                    })
                }
            })
        })

        $("#textName").keyup(function(e){
            e.preventDefault();
            textName = $("#textName").val();
            var url = "../controller/controller.php";
            var action = "list";
            var liItens = document.getElementById('ulCompras');
            liItens.innerHTML = "";
            if (textName.length < 3){
                return
            }
            $.ajax({
                url:url,
                type:"post",
                data:{textName,action},
                success:function(response){
                    //console.log(response);
                    $.each(JSON.parse(response),function(k,v){
                        //var obj = {nome: v[1],describle:v[2]}
                        var obj = JSON.stringify(v)
                                                 
                       liItens.innerHTML += `<li>
                        <a class="ui-shadow ui-btn ui-corner-all " onclick="buscaProduto(${v[0]})">
                        ${v[1]}, ${v[2]} </a><li>`;
                    })
                }
            })
        })
        $("#textPriceBuy").keyup(function(){
                
            var textPriceBuy = $("#textPriceBuy").val()
            var pricesug = parseFloat(textPriceBuy)*20/100+parseFloat(textPriceBuy);
            $("#textPrice").val(pricesug)
        })
        $("#formCadastroProduto").submit(function(e){
          
            e.preventDefault();
            // var dados= $(this).serialize()

            var textName = $("#textName").val()
            var textdescrible = $("#textdescrible").val()
            var textAmount = $("#textAmount").val()
            var textPriceBuy = $("#textPriceBuy").val()
            var textPrice = $("#textPrice").val()
            
            

            var url = "../controller/controller.php";
            var action = "insertProduct";
            $.ajax({
                url:url,
                type:"post",
                data:{textName,textdescrible,textAmount,textPriceBuy,textPrice,action},
                success:function(response){
                    $("#textName").val("")
                    $("#formCadastroProduto").each(function(){
                        this.reset();
                    })
                    console.log(response)
            }})
        
        
        })
    </script>
</body>
</html>