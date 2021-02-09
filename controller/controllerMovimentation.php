<?php
include "../model/classMovimentation.php";
    
    $movimentation = new classMovimentation();

if (isset($_POST['action'])) {
    $act = $_POST['action'];
    session_start();
    switch ($act) {
        case 'populate':
            $movimentation->populate($_SESSION['userid']);
            break;
        
        default:
            # code...
            break;
    }
}

    ?>