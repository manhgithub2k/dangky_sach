<?php
function insert_dangky($email,$tentk,$mk){
 $sql = "INSERT INTO `taikhoan`( `email`, `tentaikhoan`, `matkhau`) VALUES ('$email','$tentk','$mk')";
 pdo_execute($sql);
}
function update_taikhoan($idtk,$tentk,$email,$vaitro){
 $sql = "UPDATE `taikhoan` SET `email`='$email',`tentaikhoan`='$tentk',`tk_vaitro`='$vaitro' WHERE idtk =$idtk ";
 pdo_execute($sql);
}
function select_taikhoan($email,$pass){
    
    $sql = "SELECT `id_u`, `ma_sv`, `ten_sv`, `sdt`, `email`, `pass`, `role`, `trangthai` FROM `nguoidung` WHERE email = '$email' AND pass = '$pass'";
   $tk = pdo_query_one($sql);
   if($tk){
    $_SESSION['user'] = $email;
    $_SESSION['idtk'] = $tk['idtk'];
   }
   
   else{
    $thongbao= "Tên tài khoản hoặc mật khẩu không chính xác!";
   }
   return $tk; 

}
function select_Emailtaikhoan($email){
    
    $sql = "SELECT idtk, email, tentaikhoan, matkhau ,tk_vaitro FROM taikhoan WHERE email ='$email' ";
   $tk = pdo_query_one($sql);
   
   return $tk; 

}
function select_alluser(){
    $sql = "SELECT `id_u`, `ma_sv`, `ten_sv`, `sdt`, `email`, `pass`, `role`, `trangthai` FROM `nguoidung` ";
    return pdo_query($sql);
}
function select_oneuser($idtk){
    $sql = "SELECT * FROM `nguoidung` WHERE id_u =$idtk";
    return pdo_query_one($sql);
}
function delete_user($idtk){
    $sql = "DELETE FROM `nguoidung` WHERE id_u =$idtk";
    return pdo_execute($sql);
}

function update_pass($idtk,$passnew){
    $sql = "UPDATE `taikhoan` SET `matkhau`='$passnew' WHERE idtk=$idtk";
     pdo_execute($sql);
}
