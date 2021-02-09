<?php

include ("classConnect.php");

class ClassAdm extends ClassConnection 
{
    public function FuncListNf()
    {
        $sql = "SELECT * FROM tbl_nf WHERE nf_status=1";
        $exec = $this->connectDB()->prepare($sql);
        $exec->execute();
        $res = $exec->fetchAll(PDO::FETCH_ASSOC);
        
        echo json_encode($res);
    }
//     UPDATE tbl_nf SET nf_status=2 WHERE nf_id=73;
// INSERT INTO tbl_extrato VALUES (NULL,1,2,-(SELECT nf_price FROM tbl_nf WHERE nf_id=73),(SELECT extrato_value FROM tbl_extrato as extrato WHERE extrato_id_user=1 ORDER BY extrato_data ASC LIMIT 1),NULL);

    public function FuncFinaly($id,$troco)
    {
        $sql = "UPDATE tbl_nf SET nf_status=2 WHERE nf_id=$id; INSERT INTO tbl_extrato VALUES (NULL,(SELECT id_user FROM tbl_nf WHERE nf_id=$id),$troco,NULL),";

    }
}

// $obj = new ClassAdm();
// $obj->FuncListNf();

?>