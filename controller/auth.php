<?php

include "../model/classAuth.php";

if ((isset($_POST['textName'])) And (isset($_POST['textCpf'])) And (isset($_POST['textFone'])) and (isset($_POST['textPassword']))){
  
    $objUser = new classAuth();
    $name = $_POST['textName'];
    $cpf = $_POST['textCpf'];
    $fone = $_POST['textFone'];
    $pass = md5($_POST['textPassword']);
    $objUser->userCadastro($name,$cpf,$pass,$fone);

}else{

if ((isset($_POST['textUser'])) And (isset($_POST['textPassword']))){

   

    $objUser = new classAuth();
   
    $user = $_POST['textUser'];
    $password = $_POST['textPassword'];
  
   

    $objUser->userAuth($user,$password);


}else{
echo json_encode("Usuário ou senha incorreta");}}

?>