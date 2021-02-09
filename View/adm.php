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
    <div class="ui-grid-b ui-responsive">
    <div class="ui-block-a"><a href="cadProdutos.php" class="ui-shadow ui-btn ui-corner-all ui-btn-icon-left ui-icon-plus">Adicionar Produtos</a></div>
    <div class="ui-block-a"><a href="finalyNf.php" class="ui-shadow ui-btn ui-corner-all ui-btn-icon-left ui-icon-check">Finalizar venda</a></div>
</div>
    
    </div><!-- /content -->

    <div data-role="footer">
        <h4>Page Footer</h4>
    </div><!-- /footer -->
</div><!-- /page -->


<script src="../lib/funcAdm.js"></script>

</body>
</html>