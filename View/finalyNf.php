<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="../lib/jquery.mobile-1.4.5.min.css" />
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
    <link rel="stylesheet" href="../lib/style.css">
</head>
<body>
        
    <div class="justify-center">
        <div style="margin: auto;padding: 8px;">
        
        <ul data-role="listview" class="liPersonal" data-count-theme="b" data-inset="true" id="showNfOpen">
        <!--     <li><a href="#">Inbox <span class="ui-li-count">12</span></a></li>
            <li><a href="#">Outbox <span class="ui-li-count">0</span></a></li>
            <li><a href="#">Drafts <span class="ui-li-count">4</span></a></li>
            <li><a href="#">Sent <span class="ui-li-count">328</span></a></li>
            <li><a href="#">Trash <span class="ui-li-count">62</span></a></li> -->
        </ul>
        <!-- Caixa de dialog -->
        <div data-role="popup" id="popupFinalyNf" data-overlay-theme="b" data-transition="turn" data-theme="a" data-tolerance="15,15" class="ui-content">
             <form id="formFinalyNf">
                    <div style="padding:10px 20px;">
                        <h3>valor Recebido </h3>
                        <p id="showProduto"></p>
                        <input type="hidden" name="hiddenIdNf" id="hiddenIdNf">
                        <input type="text" name="valorRecebido" id="valorRecebido" value="" placeholder="Valor Recebido R$ xx.xx" data-theme="a">
                        <button type="submit" class="ui-btn ui-corner-all ui-shadow ui-btn-b ui-btn-icon-left ui-icon-check">Concluir</button>
                    </div>
              </form>
        </div>
        <!-- Fim da caixa de dialog -->
        </div>

    </div>
    <script src="../lib/funcNf.js"> </script>

</body>

</html>