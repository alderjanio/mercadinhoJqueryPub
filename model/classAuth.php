<?php


include ("classConnect.php");
class classAuth extends ClassConnection{

public function userAuth($user,$password)
{
   
   
    $sql = "SELECT * FROM tbluser WHERE user_cpf=? AND user_password = ?";
    $auth = $this->connectDB()->prepare($sql);
    $auth->bindValue(1, $user) ; 
    $auth->bindValue(2, $password) ; 
    $auth->execute();
    if ($auth->rowCount() != null){
        session_start();
        $_SESSION['user']=$user;
        $nameUser = $auth->fetchObject();
        $_SESSION['username'] = $nameUser->user_name;
        $_SESSION['userid'] = $nameUser->user_id;
        
        $this->checkSession();
    }else {
        echo  json_encode(array(["errorFind"]));

    }
}



public function userCadastro($name,$cpf,$pass,$fone)
{
  
    $sql = "INSERT INTO tbluser VALUES (NULL, ?,?,?,?,2,50)";
    $auth = $this->connectDB()->prepare($sql);
    $auth->bindValue(1, $name) ; 
    $auth->bindValue(2, $cpf) ; 
    $auth->bindValue(3, $pass) ; 
    $auth->bindValue(4, $fone) ; 
   if($auth->execute()){
    $this->userAuth($cpf,$pass);
   }else {
     $res = $auth->errorInfo();
     echo json_encode($res);
    //  echo json_encode(array("cod"=>"duplicate"));
   }
}
public function checkSession()
{
    if ($_SESSION['user']) {
       echo json_encode(array(["ok"]));
    }else {
        echo  json_encode(array(["errorLogout"]));
    }
}

}