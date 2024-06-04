<?php

function insert_giohang($idsp,$idtk){
    // $sql = "INSERT INTO `giohang`( `idsp`, `idtk`) VALUES ($idsp,$idtk)";           
    $sql = "INSERT INTO `gio_hang`(`id_sp`, `id_tk`)  VALUES ($idsp,$idtk)";           
            pdo_execute($sql);
}

function select_giohang($idtk){
    $sql = "SELECT * 
    FROM dangkysach AS dks 
    JOIN dangkysach_nguoidung AS dks_nd ON dks.id_dk = dks_nd.id_dks 
    JOIN sach AS s ON dks_nd.id_s = s.id_s 
    WHERE dks.id_u = $idtk  AND dks.trangthai in ( 1 , 0)
    GROUP BY dks_nd.id_dks 
    ORDER BY dks_nd.id_dks DESC;";
   
             
            return  pdo_query($sql);
}
function select_giohang1($idtk){
    $sql = "SELECT * 
    FROM dangkysach AS dks 
    JOIN dangkysach_nguoidung AS dks_nd ON dks.id_dk = dks_nd.id_dks 
    JOIN sach AS s ON dks_nd.id_s = s.id_s 
    WHERE dks.id_u = $idtk  
    GROUP BY dks_nd.id_dks 
    ORDER BY dks_nd.id_dks DESC;";
   
             
            return  pdo_query($sql);
}
function select_lichsu_giohang($idtk){
    $sql = "SELECT * 
    FROM dangkysach AS dks 
    JOIN dangkysach_nguoidung AS dks_nd ON dks.id_dk = dks_nd.id_dks 
    JOIN sach AS s ON dks_nd.id_s = s.id_s 
    WHERE dks.id_u = $idtk  AND dks.trangthai in ( 2 , 3)
    GROUP BY dks_nd.id_dks 
    ORDER BY dks_nd.id_dks DESC;";
   
             
            return  pdo_query($sql);
}


function select_dangky($id_u, $ngaymua) {
    $sql = "SELECT * FROM `dangkysach` WHERE id_u = $id_u AND ngaymua =  '$ngaymua' ";
    
    
    return pdo_query_one($sql);
}
function insert_cart($id_u,$tongtien,$ngaymua){
    $sql = " INSERT INTO `dangkysach`( `id_u`,`tongtien`, `ngaymua`) VALUES ($id_u,$tongtien,'$ngaymua') ";           
            pdo_execute($sql);
}
function insert_dks_nd($id_u, $id_dks, $id_s){
    $sql = " INSERT INTO `dangkysach_nguoidung`( `id_u`, `id_dks`,`id_s`) VALUES ($id_u, $id_dks, $id_s) ";           
            pdo_execute($sql);
}
function update_dks($iddon,$trangthai){
    $sql = " UPDATE `dangkysach` SET`trangthai`= $trangthai WHERE id_dk = $iddon ";           
            pdo_execute($sql);
}
function delete_dks($iddon){
    $sql = " UPDATE `dangkysach` SET `trangthai`= 3 WHERE id_dk = $iddon ";           
            pdo_execute($sql);
}
?>