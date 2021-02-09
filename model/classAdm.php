<?php

include ("classConnect.php");

class ClassAdm extends ClassConnection 
{
    public function FuncListNf()
    {
        $sql = "SELECT user_name,nf_id,nf_price,nf_data FROM tbl_nf JOIN tbluser WHERE nf_status=1 AND id_user=user_id ORDER BY nf_data ASC ";
        $exec = $this->connectDB()->prepare($sql);
        $exec->execute();
        $res = $exec->fetchAll(PDO::FETCH_ASSOC);
        
        echo json_encode($res);
    }
//     UPDATE tbl_nf SET nf_status=2 WHERE nf_id=73;
// INSERT INTO tbl_extrato VALUES (NULL,1,2,-(SELECT nf_price FROM tbl_nf WHERE nf_id=73),(SELECT extrato_value FROM tbl_extrato as extrato WHERE extrato_id_user=1 ORDER BY extrato_data ASC LIMIT 1),NULL);

    public function FuncFinaly($id,$valor)
    {
        $sql = "UPDATE tbl_nf SET nf_status=2 WHERE nf_id=$id; INSERT INTO tbl_extrato VALUES (NULL,(SELECT id_user FROM tbl_nf WHERE nf_id=$id),$valor-(SELECT nf_price FROM tbl_nf WHERE nf_id=$id),NULL)";
        $exec = $this->connectDB()->prepare($sql);
        
        if ($exec->execute()) {
            echo json_encode((Object) array("res"=>'ok'));

        }else {
            echo json_encode((Object) array("res"=>'Erro'));
        }

    }
}

?>