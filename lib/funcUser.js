$(document).ready(function () {
    var url="../controller/controller.php";
    var action = "listExtrato";
    $.ajax({
        url:url,
        type:"post",
        data:{action},
        success:function (response) {
            console.log(response)
           var {scalar} = JSON.parse(response);
           $("#infSaldo").html("R$: "+scalar)

        }

    })
})

function funcNfMovimentation() {
    var ulMovimentation = document.getElementById('ulMovimentation');
    ulMovimentation.innerHTML = '<li data-role="list-divider">Lista de compras Efetuadas</li>';
    var url="../controller/controllerMovimentation.php";
    var action = "populate";
    $.ajax({
        url:url,
        type:"post",
        data:{action},
        success:function (response) {

            
            $.each(JSON.parse(response),function (k,v) {
                ulMovimentation.innerHTML +=`<li ><a href="#"> ${v[0]} <span class="ui-shadow ui-btn ui-corner-all "> ${v[1]}</span></a></li>`;

            })
            
        }
    })
    
}
funcNfMovimentation();