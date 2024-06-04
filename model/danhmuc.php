<?php  
function insert_danhmuc($danhmuc){
    $sql = "INSERT INTO `danhmuc`( `name_dm`) VALUES ('$danhmuc')";           
            pdo_execute($sql);
}

function select_Alldanhmuc(){
    $sql = "SELECT `id_dm`, `name_dm` FROM `danhmuc` order by id_dm desc";
            $dsLoai  = pdo_query($sql);
            return $dsLoai;
            
}
function select_Alldanhmuc_sl(){
    $sql = "SELECT *,sum(s.id_s) 'sl_sach' FROM `danhmuc` d LEFT JOIN `sach` s ON d.id_dm = s.id_dm group by s.id_s order by d.id_dm DESC";
            $dsLoai  = pdo_query($sql);
            return $dsLoai;
            
}
function select_Onedanhmuc($id){
    $sql = "SELECT `id_dm`, `name_dm` FROM `danhmuc` WHERE  id_dm =".$id;
    $danhmuc =pdo_query_one($sql);
            return $danhmuc;
}
function delete_danhmuc($id){
    $sql = "DELETE  FROM danhmuc WHERE id_dm = ".$id;
            pdo_execute($sql);
}
function update_danhmuc($id,$idnew,$name){
    $sqlUpdate = "UPDATE `danhmuc` SET `id_dm`= $idnew,`name_dm`='$name' WHERE id_dm=".$id;
                pdo_execute($sqlUpdate);
}
function update_danhmuc1($id,$name){
    $sqlUpdate = "UPDATE `danhmuc` SET `name_dm`='$name' WHERE id_dm=".$id;
                pdo_execute($sqlUpdate);
}



?>