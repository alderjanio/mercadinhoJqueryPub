<?php
   
if(isset($_POST['action'])){

    include "../model/classProject.php";
    
    $projeto = new classProject();

switch ($_POST['action']) {
    case 'insertProduct':

       
    $textName = $_POST['textName']; 
    $textdescrible  = $_POST['textdescrible'];
    $textAmount  = $_POST['textAmount'];
    $textPrice = $_POST['textPrice'];
    $textPriceBuy = $_POST['textPriceBuy'];
      
    $projeto->addLote($textName,$textdescrible,$textAmount,$textPriceBuy,$textPrice);
        break;

    case 'list':
  
    if (isset($_POST['textName']) ){
    $name = $_POST['textName'];
    
    }else {
        $name = null;    
    }
    $projeto->list($name);
    break;

    case 'del':
    $id = $_POST['id'];
    $projeto->funcdelete($id);
    break;


    case 'buscaid':
    $id = $_POST['id'];
    $projeto->funcbusca($id);
    break;

    case 'compra':
            
    $id = $_POST['id'];
    $projeto->funcCompra($id);
    break;

    case 'finalyBuy':
            
        $projeto->funcFinaly($_SESSION['userid']);
    break;

    case 'chkCar':
    
    $projeto->funcCar($_SESSION['userid']);
    break;

    case 'logout':
    
    $projeto->funcLogout();
    break;

    case 'delItemCar':
    
    $projeto->funcDelItemCar($_POST['id']);
    break;

    case 'listExtrato':
    
    $projeto->funclistExtrato($_SESSION['userid']);
    break;

    case 'addCar':
    $idLote  = $_POST['idLote'];
    $amountUnit = $_POST['amountUnit'];
    $projeto->funcAddCar($idLote,$amountUnit);

    break;
    default:
   
    

        
        break;
}


}

?>