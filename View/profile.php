<?php
session_start();
if ((!$_SESSION['user']) AND (!$_SESSION['username']))
header("Location: ../index.html")


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../lib/jquery.mobile-1.4.5.min.css" />
    <link rel="stylesheet" href="../lib/style.css" />
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
</head>
<body>
<div data-role="page">
<div data-role="header">
<h1 style="text-align: left;"><?php echo $_SESSION['username'] ?></h1>
    <button onclick="funcLogout()" class="ui-btn-right ui-btn ui-btn-b ui-btn-inline ui-mini ui-corner-all ui-btn-icon-right ui-icon-check">Sair</button>
</div>
   

    <div role="main" class="ui-content">
    <div class="ui-grid-b divHeader">
        <div class="ui-block-a">
        Saldo:
        </div>
        <div class="ui-block-b">
            <h4 id="infSaldo"></h4>
        </div>
    </div>
    <!-- <a href="#pageMovimentation" class="ui-btn ui-btn-b ui-btn-inline">Visualizar outras Compras</a>     -->
   

    <div class="ui-grid-a" style="justify-content: center; padding: 0;">
        
         <div class="ui-block-a">   <div class="divHeader"> Nº de itens: <h3 id="spAmount"></h3> </div>  </div>
         <div class="ui-block-b">   <div class="divHeader"> Valor: R$  <h3 id="spSum"></h3> </div >  </div>
        </div>
    <div style="margin: auto;padding: 8px;">
             
            
                <form class="ui-filterable">
                    <input id="searchProduct" data-type="search" placeholder="Qual produto deseja" autocomplete="off" />
                </form>
                <ul data-role="listview" data-filter="true" data-filter-reveal="true"
                id="ulSearchProduct" data-input="#searchProduct" data-inset="true">
                  
                </ul>
                      
            
                
            </div> 
            <button id="btnFinalyBuy">Finalizar Compra</button>
            <ul data-role="listview" id="ulCar" data-count-theme="b" data-inset="true">
                    
                </ul>
                  <!--Dialog para informar quantidade de intens  -->
                            <div data-role="popup" id="popupDialog" data-overlay-theme="b" data-transition="turn" data-theme="a" data-tolerance="15,15" class="ui-content">
                            <form id="formAddCar">
                    <div style="padding:10px 20px;">
                        <h3>Produto selecionado</h3>
                        <p id="showProduto"></p>
                        <input type="hidden" name="hiddenIdLote" id="hiddenIdLote">
                        <input type="text" name="amountUnit" id="amountUnit" value="" placeholder="Informe a quantidade" data-theme="a">
                        <button type="submit" class="ui-btn ui-corner-all ui-shadow ui-btn-b ui-btn-icon-left ui-icon-check">Inserir na Lista</button>
                    </div>
                </form>
                            </div>
                </div>
                <!-- fim do Dialog -->
                          
    </div><!-- /content -->

    <div data-role="footer">
        <h4>Page Footer</h4>
    </div><!-- /footer -->
</div><!-- /page -->
<div data-role="page" id="pageMovimentation">
<div data-role="header">
<h1 style="text-align: left; height: 50px;"><?php echo $_SESSION['username'] ?></h1>
    <button onclick="funcLogout()" class="ui-btn-right ui-btn ui-btn-b ui-btn-inline ui-mini ui-corner-all ui-btn-icon-right ui-icon-check">Sair</button>
</div>
    <div data-role="header" >
        
       
    </div><!-- /header -->

    <div role="main" class="ui-content" >
    <ul data-role="listview" data-inset="true" data-divider-theme="a" id="ulMovimentation">
        
     
    </ul>
           
            
    </div><!-- /content -->

    <div data-role="footer">
        <h4>Mercadinho Online</h4>
    </div><!-- /footer -->
</div><!-- /page -->





<script src="../lib/func.js"></script>
<script src="../lib/funcUser.js"></script>
</body>
</html>