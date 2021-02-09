<?php
       include ("../model/classAdm.php");
    
   
if(isset($_POST['action'])){


     $projeto = new ClassAdm();

    switch ($_POST['action']) {
        case 'list':
            $projeto->FuncListNf();
            break;
        
        case 'finalyNf':

            $idnf = $_POST['idnf'];
            $valorRecebido = $_POST['valorRecebido'];
            
            $projeto->FuncFinaly($idnf,$valorRecebido);
            break;
        
        default:
            # code...
            break;
    }

// switch ($_POST['action']) 

}
?>