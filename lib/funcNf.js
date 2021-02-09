FuncPopulate(); 
function funcFinalyNf(nfid){

  
  $("#hiddenIdNf").val(nfid);
  $("#popupFinalyNf").popup("open");
}
$("#formFinalyNf").submit(function(e){
  e.preventDefault();

  var url = "../controller/controllerNf.php";
  var action = "finalyNf"
  var idnf = $("#hiddenIdNf").val();
  var valorRecebido = $("#valorRecebido").val();


  $.ajax({
  url:url,
  type:"post",
  data:{action,idnf,valorRecebido},
  success:function (res) {
     console.log(res)     
  $("#formFinalyNf")[0].reset();
  $("#popupFinalyNf").popup("close");
  
  }

})
})

function FuncPopulate() {
  var url = "../controller/controllerNf.php";
  var action = "list"
  $.ajax({
  url:url,
  type:"post",
  data:{action},
  success:function (res) {
    var obj = JSON.parse(res)
    var showNf = document.getElementById('showNfOpen');
    showNf.innerHTML = "";
    console.log(res)
    $.each(JSON.parse(res),function(k,v){
        

  
      showNf.innerHTML += ` <li ><a class="ui-btn" onclick="funcFinalyNf(${v['nf_id']})">${v['user_name']} <span class="ui-li-count">
    ${v['nf_price']}
    </span></a></li> `;

    })            
      
      
  }
})
}
 