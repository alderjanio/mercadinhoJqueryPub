<?php
session_start();

include ("classConnect.php");
class ClassProject extends ClassConnection{

    public function addLote($textName,$textdescrible,$textAmount,$textPriceBuy,$textPrice)
    {
     
        $sql = "INSERT INTO tbl_lote VALUES (null,?,?,?,?,?,NULL)";
        $add = $this->connectDB()->prepare($sql);
        $add->bindValue(1, $textName) ;
        $add->bindValue(2, $textdescrible);
        $add->bindValue(3, $textPriceBuy);
        $add->bindValue(4, $textPrice);
        $add->bindValue(5, $textAmount);


    
        $add->execute();
  
    echo json_encode('ok');
    }
    public function list($textName)
    {
        if ( $textName!=NULL){
        $sql = 'SELECT * FROM tbl_lote WHERE lote_amount>4 AND (lote_nome LIKE ?) OR (lote_describle LIKE ? ) GROUP BY lote_nome LIMIT 2 ';
        $list = $this->connectDB()->prepare($sql);
        $list->bindValue(1,"%$textName%", PDO::PARAM_STR);
        $list->bindValue(2,"%$textName%", PDO::PARAM_STR);
        }else {
        $sql = 'SELECT * FROM tbl_lote limit 10';
        $list = $this->connectDB()->prepare($sql);
        }
        $list->execute();
        $res = $list->fetchAll();
        echo json_encode($res);
   
    }
    public function funcdelete($id)
    {
      $sql = "DELETE FROM tblprojeto WHERE id=$id";
      $list = $this->connectDB()->prepare($sql);
      $list->execute();
    }

    public function funcbusca($id)
    {
        $sql = "SELECT * FROM tbl_lote WHERE lote_id=$id ";
        $list = $this->connectDB()->prepare($sql);
        $list->execute();
        $res = $list->fetchAll();
        echo json_encode($res);
   
    }
    public function funcAddCar($idLote,$amountUnit)
    {
        echo ($idLote);
        echo ('ok');

        $sqlLote = "SELECT lote_price  FROM tbl_lote WHERE lote_id=$idLote ; UPDATE tbl_lote SET lote_amount=(lote_amount-$amountUnit) WHERE lote_id=$idLote";
        $priceLote = $this->connectDB()->prepare($sqlLote);
        $priceLote->execute();
        $price = $priceLote->fetchObject();


        $sql = "INSERT INTO tbl_compra VALUES (NULL,?,?,?,?,?,1)";
        $add = $this->connectDB()->prepare($sql);
        $add->bindValue(1, 1) ;
        $add->bindValue(2, $_SESSION['userid']);
        $add->bindValue(3, $idLote);
        $add->bindValue(4, $price->lote_price);
        $add->bindValue(5, $amountUnit);

        
    
    
        $add->execute();
  
    echo json_encode($idLote,$price->lote_price);    }
    public function funcCompra($id)
    {
        

        $sqlLote = "SELECT lote_price    FROM tbl_lote WHERE lote_id=$id ; UPDATE tbl_lote SET lote_amount=(lote_amount-1) WHERE lote_id=$id";
        $priceLote = $this->connectDB()->prepare($sqlLote);
        $priceLote->execute();
        $price = $priceLote->fetchObject();


        $sql = "INSERT INTO tbl_compra VALUES (NULL,?,?,?,?,1)";
        $add = $this->connectDB()->prepare($sql);
        $add->bindValue(1, 1) ;
        $add->bindValue(2, $_SESSION['userid']);
        $add->bindValue(3, $id);
        $add->bindValue(4, $price->lote_price);

        
    
    
        $add->execute();
  
    echo json_encode($id,$price->lote_price);
    }

    public function funcFinaly($id)
{
    $sqlSum = "SELECT SUM(compra_price*compra_quantity) AS total FROM `tbl_compra` WHERE id_user=$id AND compra_status=1";
    $execSum = $this->connectDB()->prepare($sqlSum);
    if ($execSum->execute()) {
         $execSum->execute();
         $totalnf = $execSum->fetchColumn();
        
        
        }else {
            echo $execSum->errorInfo();
            return;
        }

    
    
    
        $sql = "INSERT INTO tbl_nf VALUES (NULL, ? ,NULL,1,?)";
        $nf = $this->connectDB()->prepare($sql);
               
        $nf->bindValue(1,$totalnf);
        $nf->bindValue(2,$id);
        $nf->execute();
        
        $sqllastid = "SELECT nf_id FROM tbl_nf ORDER BY nf_id DESC LIMIT 1";
        $getLastId = $this->connectDB()->query($sqllastid);
        if ($getLastId){
            $sqlUpStatusBuy = "UPDATE tbl_compra SET compra_status=2, id_nf=? WHERE compra_status=1 AND id_user=$id ";
            $upStatusBuy = $this->connectDB()->prepare($sqlUpStatusBuy);
            $lastId = $getLastId->fetchObject()->nf_id;
            $upStatusBuy->bindValue(1,$lastId);
            $upStatusBuy->execute();
            echo json_encode($lastId);
        };
        
        
        
        
    
    
    
    // $car = "SELECT * FROM tbl_compra WHERE id_user=$id AND compra_status=1";
    // $finaly = $this->connectDB()->prepare($car);
   
   
    
    
}

    public function funcCar($id)
    {
        $sqlSum = "SELECT SUM(compra_price) AS total FROM `tbl_compra` WHERE id_user=$id AND compra_status=1";
        $sql = "SELECT lote_nome, lote_price,lote_describle,compra_id,compra_quantity FROM tbl_compra JOIN tbl_lote WHERE id_user=$id AND compra_status=1 AND id_lote=lote_id";
        $exec = $this->connectDB()->prepare($sql);
        $execSum = $this->connectDB()->prepare($sqlSum);
        $exec->execute();
        $execSum->execute();
        $obj = (object) array('amount' => $exec->rowCount(),'price'=>$execSum->fetchColumn(),'obj'=>$exec->fetchAll());
  
        echo json_encode($obj);
    }

    public function funcLogout()
    {
        session_destroy();
    }
    
    public function funclistExtrato($id)
    {
        $sql = "SELECT extrato_value FROM tbl_extrato WHERE extrato_id_user=$id limit 1 ";
        $exec = $this->connectDB()->prepare($sql);
        $exec->execute();
        $res = $exec->fetchColumn(0);
        $resObj = (Object) ($res);
        if ($exec->rowCount()!=0){
        echo (json_encode($resObj));
        }else {
            $arrayName = array('scalar' => "0.00" , );
            echo json_encode($arrayName);
        }
    }

    public function funcDelItemCar($id)
    {
        $sql = "UPDATE tbl_lote SET lote_amount=(lote_amount+(SELECT compra_quantity FROM tbl_compra WHERE compra_id=$id)) WHERE lote_id=(SELECT id_lote FROM tbl_compra WHERE compra_id=$id LIMIT 1 );DELETE FROM tbl_compra WHERE compra_id=$id";
        $exec = $this->connectDB()->prepare($sql);
        
        if ($exec->execute()) {
           echo json_encode($id);
        }else {
            echo json_encode ($exec->errorInfo());
        }


    }

    

}
?>