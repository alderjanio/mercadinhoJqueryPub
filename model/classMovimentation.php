<?php 

include ("classConnect.php");
class classMovimentation extends ClassConnection{
public function populate($id)
{
     $sql = "SELECT nf_price, DATE_FORMAT (nf_data, '%d-%m-%Y') FROM tbl_nf WHERE id_user=$id";
     $populate = $this->connectDB()->prepare($sql);
     $populate->execute();
     $res = $populate->fetchAll();

     echo json_encode($res);

}

}


?>