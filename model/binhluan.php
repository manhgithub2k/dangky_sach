<?php 
function insert_binhluan($idsp,$idtk,$ndbl,$ngay_bl){
 $sql = "INSERT INTO binh_luan (noi_dung, ngay_bl, id_sp, id_tk) VALUES ('$ndbl','$ngay_bl',$idsp,$idtk)";
 pdo_execute($sql);
}

function select_Allbinhluan($idsp){
    $sql = "SELECT * FROM binh_luan b JOIN taikhoan t ON b.id_tk = t.idtk 
    JOIN sanpham s ON b.id_sp = s.idsp WHERE bl_trangthai = 0";
    if($idsp>0){
        $sql .= " AND b.id_sp=$idsp";
    }
    $sql .=" order by id_bl DESC ";
    $allbl=  pdo_query($sql);
    return $allbl;
}
function delete_binhluan($id_bl){
    $sql = "DELETE FROM `binh_luan` WHERE id_bl=$id_bl";
    pdo_execute($sql);
}
function an_binhluan($id_bl){
    $sql = "UPDATE `binh_luan` SET `bl_trangthai`= 1  WHERE id_bl=$id_bl";
    pdo_execute($sql);
}


?>