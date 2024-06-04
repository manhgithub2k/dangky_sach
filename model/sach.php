<?php  
function insert_sanpham($namesp,$price,$soluong,$hinhsp,$mota,$iddm){
    $sql = "INSERT INTO `sach`( `name_s`, `img`, `gia`, `mota`, `soluong`, `id_dm`) VALUES  ('$namesp','$hinhsp',$price,'$mota',$soluong,$iddm)";           
            pdo_execute($sql);
}
function up_sanpham_lx($id,$luotxem){
    $sql = "UPDATE `sanpham` SET `luotxem`='$luotxem' WHERE idsp =$id";           
            pdo_execute($sql);
}

function select_Allsanpham($keyw,$iddm){
    
    $sql = "SELECT * FROM sach s
    Join danhmuc as d ON s.id_dm = d.id_dm
     ";
    if($keyw != " "){
        $sql .=  " AND s.name_s LIKE '%".$keyw."%'";
    }
    if($iddm > 0){
        $sql.=" AND d.id_dm=".$iddm;
    }
    $sql.= " AND s.trangthai_s = 0 order by s.id_s DESC";
    
    
            return pdo_query($sql);
}
function select_10sanpham(){
    $sql = "SELECT * FROM sanpham ";   
    $sql.= " order by luotxem DESC LIMIT 10";
            $dssp  = pdo_query($sql);
            return $dssp;
}

function select_Onesanpham($id){
    $sql = "SELECT * FROM `sach` WHERE id_s =".$id;
    $sanpham =pdo_query_one($sql);
            return $sanpham;
}
function delete_sanpham($id){
    $sql = "DELETE FROM `sach` WHERE id_s = ".$id;
            pdo_execute($sql);
}
function delete_soft_sanpham($id){
    $sqlUpdate = "UPDATE sach SET trangthai_s= 1  WHERE id_s=".$id;
                pdo_execute($sqlUpdate);
}
function update_sach($id,$tens,$img,$gia,$mota,$soluong,$iddm){
    $sqlUpdate = "UPDATE sach SET name_s = '$tens',img = '$img',gia = '$gia',mota = '$mota',soluong = '$soluong',id_dm = '$iddm' WHERE id_s = $id";
                pdo_execute($sqlUpdate);
}



function select_9sanpham_ND($keyw){
    $sql = "SELECT * FROM sanpham as s Join danhmuc as d ON s.iddm = d.id WHERE 1";
    if($keyw!= " "){
        $sql .=  " AND s.namesp LIKE '%".$keyw."%'";
    }
    $sql.= " order by idsp DESC LIMIT 9";
    
    
            $dssp  = pdo_query($sql);
            return $dssp;
}
function select_6sanpham_ND($keyw,$iddm){
    $sql = "SELECT * FROM sanpham as s Join danhmuc as d ON s.iddm = d.id WHERE 1";
    if($keyw!= " "){
        $sql .=  " AND s.namesp LIKE '%".$keyw."%'";
    }
    if($iddm > 0){
        $sql .=  " AND d.id =".$iddm;

    }
    $sql.= " order by idsp DESC LIMIT 6";
    
    
            $dssp  = pdo_query($sql);
            return $dssp;
}
function select_6sanpham($keyw){
    $sql = "SELECT * FROM sanpham WHERE 1"; 
    if($keyw!= ""){
        $sql .= " AND namesp LIKE '%$keyw%'";
    }  
    $sql.= " LIMIT 6";
            $dssp  = pdo_query($sql);
            return $dssp;
}

function select_CungDM($idsp,$iddm){
    // không cách ở AND là oẳng
    // $sql = "SELECT * FROM sanpham WHERE iddm = ".$iddm ."AND idsp <> ".$idsp ;   
    $sql = "SELECT * FROM sanpham WHERE iddm = ".$iddm ." AND idsp <> ".$idsp ;   
            $dssp  = pdo_query($sql);
            return $dssp;
}
function select_theoDM($iddm){
    $sql = "SELECT * FROM sanpham  WHERE iddm = ".$iddm  ;   
            $dssp  = pdo_query($sql);
            return $dssp;
} 







?>