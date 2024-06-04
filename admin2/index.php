<?php
ob_start();
session_start();
include_once "../model/pdo.php";
include_once "../global.php";
include_once "../model/danhmuc.php";
include_once "../model/sach.php";
include_once "../model/taikhoan.php";
include_once "../model/giohang.php";
include_once "../model/thongke.php";
// $checkName = "/^[0-99\p{L}\s]+$/u";
// $checkName = "/^([a-zA-Z ]+[0-9]*)+$/";
$checkName = "/^[a-zA-Z\sáàảãạắằẳẵặấầẩẫậéèẻẽẹếềểễệíìỉĩịóòỏõọốồổỗộớờởỡợúùủũụứừửữựýỳỷỹỵđÁÀẢÃẠẮẰẲẴẶẤẦẨẪẬÉÈẺẼẸẾỀỂỄỆÍÌỈĨỊÓÒỎÕỌỐỒỔỖỘỚỜỞỠỢÚÙỦŨỤỨỪỬỮỰÝỲỶỸỴĐ ]+[0-9]*$/";
$AllDM = select_Alldanhmuc();


include "header.php";




if(isset($_GET['act']) && $_GET['act']){
    switch ($_GET['act']) {
        case 'search':
            if(isset($_POST['search']) && $_POST['search']){
                if(isset($_GET['a']) && $_GET['a']){
                    if($_GET['a'] == 'lists'){
                        $listS = select_Allsanpham($_POST['keyw'],0);
                        include "sach/list.php";
                        
                    } 
                    // else if($_GET['a'] == 'listdm'){
                    //     $listDm = select_Alldanhmuc('',$_POST['keyw']);
                    //     include "danhmuc/list.php";

                    // } else{
                    //     echo "<script>alert('Không tìm thấy trang');window.location='index.php';</script>";
                    // }
                }
                
                
            }
            break;
        
        
        case 'adddm':
           if(isset($_POST['submit']) && $_POST['submit']){
            if(preg_match($checkName,$_POST['tendm'])){
                $tenDm = $_POST['tendm'];
                insert_danhmuc($tenDm);
                $thongbaoTC = " Đã Thêm Thành Công";             

                
            }
            else{
                $thongbao = "Tên danh mục sai định dạng";             
            }
           }
           include "danhmuc/add.php";

            break;

        case 'listdm':
            $listDM = select_Alldanhmuc();
            include "danhmuc/list.php";
            break;
        case 'deletedm':
           if(isset($_GET['id']) && $_GET['id']){
            $id = $_GET['id'];
            delete_danhmuc($id);
            $thongbao = "Đã Xóa Thành Công !";
           }
            
           $listDM = select_Alldanhmuc();
            
            include "danhmuc/list.php";
            break;
        case 'editdm':
            if(isset($_GET['id']) && $_GET['id']){
                $id = $_GET['id'];
                $dm = select_Onedanhmuc($id);
                
                extract($dm); 
               if(isset($_POST['submit']) && $_POST['submit']){
                if(preg_match($checkName,$_POST['tendm'])){
                    $tenDm = $_POST['tendm'];
                    update_danhmuc1($id,$tenDm);                  
                    
                    $thongbaoTC = " Đã Sửa Thành Công";
                    // header('location:index.php?act=editdm&id='.$id_dm);
                    header('refresh:2;url=index.php?act=editdm&id='.$id_dm);
                    }
                else{
                        $thongbao = "Tên danh mục sai định dạng";
                    }
                }
                        // var_dump($dm);
             include "danhmuc/edit.php";

             }  

            break;

        case 'adds':
            $error = [];
            if(isset($_POST['submit']) && $_POST['submit']){
                if(isset($_POST['tens']) && $_POST['tens']){
                    if(preg_match($checkName,$_POST['tens'])){
                    $tenS = $_POST['tens'];                       
                    }
                    else{
                        $error['tens'] = "Tên sản phẩm không hợp lệ!";
                    }
                } else{
                    $error['tens'] = "Không được bỏ trống !";
                }

                if(!empty($_FILES['img']['name'])){
                   $img = '../image/'.$_FILES['img']['name'];
                   $img2 = '../View/Img/'.$_FILES['img']['name'];
                   
                   if(move_uploaded_file($_FILES['img']['tmp_name'],$img)){
                   move_uploaded_file($_FILES['img']['tmp_name'],$img2);

                    $imgTC = "Upload ảnh thành công";

                   } else{
                    $error['img'] = "Upload anhr không thành công ";

                   }
                }  else{
                    $error['img'] = "Chọn ảnh cho sản phẩm.";
                } 

                if(isset($_POST['gia']) && $_POST['gia']){
                    if(is_int((int)$_POST['gia'])){
                    $gia = $_POST['gia'];                       
                    }
                    else{
                        $error['gia'] = "Giá sản phẩm không hợp lệ!";
                    }
                } else{
                    $error['gia'] = "Không được bỏ trống !";
                }

                if(isset($_POST['mota']) && $_POST['mota']){
                    $mota = $_POST['mota'];                       
                    
                } else{
                    $error['mota'] = "Không được bỏ trống !";
                }

                if(isset($_POST['soluong']) && $_POST['soluong']){
                    if(is_int((int)$_POST['soluong'])){
                    $soluong = $_POST['soluong'];                       
                    }
                    else{
                        $error['soluong'] = "Số Lượng sản phẩm không hợp lệ!";
                    }
                } else{
                    $error['soluong'] = "Không được bỏ trống !";
                }

                if(isset($_POST['iddm']) && $_POST['iddm']){
                    $iddm = $_POST['iddm'];
                } else{
                    $error['danhmuc'] = "Không được bỏ trống !";

                }
                if(empty($error)){
                    echo "haha";
                    // Cập nhật vào csdl
                    insert_sanpham($tenS,$gia,$soluong,$img,$mota,$iddm);
                    $thongbaoTC ="Đã thêm sách thành công !";
                }
            }
            include_once "sach/add.php";
            break;

        case 'edits':
            if(isset($_GET['id']) && $_GET['id']){
                $id = $_GET['id'];
            $sp = select_Onesanpham($id);
            extract($sp);
                $error = [];
                if(isset($_POST['submit']) && $_POST['submit']){
                    if(isset($_POST['tens']) && $_POST['tens']){
                        if(preg_match($checkName,$_POST['tens'])){
                        $tenS = $_POST['tens'];                       
                        }
                        else{
                            $error['tens'] = "Tên sản phẩm không hợp lệ!";
                        }
                    } else{
                        $error['tens'] = "Không được bỏ trống !";
                    }
    
                    if(isset($_FILES['img']['name'])){
                       $image = '../image/'.$_FILES['img']['name'];
                       
                       if(move_uploaded_file($_FILES['img']['tmp_name'],$image)){
                        $imgTC = "Upload ảnh thành công";
    
                       } else{
                        $error['img'] = "Upload anhr không thành công ";
    
                       }
                    }  else{
                        $image = $img;
                    } 
    
                    if(isset($_POST['gia']) && $_POST['gia']){
                        if(is_int((int)$_POST['gia'])){
                        $gia = $_POST['gia'];                       
                        }
                        else{
                            $error['gia'] = "Giá sản phẩm không hợp lệ!";
                        }
                    } else{
                        $error['gia'] = "Không được bỏ trống !";
                    }
    
                    if(isset($_POST['mota']) && $_POST['mota']){
                        $mota = $_POST['mota'];                       
                        
                    } else{
                        $error['mota'] = "Không được bỏ trống !";
                    }
    
                    if(isset($_POST['soluong']) && $_POST['soluong']){
                        if(is_int((int)$_POST['soluong'])){
                        $soluong = $_POST['soluong'];                       
                        }
                        else{
                            $error['soluong'] = "Số Lượng sản phẩm không hợp lệ!";
                        }
                    } else{
                        $error['soluong'] = "Không được bỏ trống !";
                    }
    
                    if(isset($_POST['iddm']) && $_POST['iddm']){
                        $iddm = $_POST['iddm'];
                    } else{
                        $error['danhmuc'] = "Không được bỏ trống !";
    
                    }
                    if(empty($error)){
                        // Cập nhật vào csdl
                        update_sach($id,$tenS,$image,$gia,$mota,$soluong,$iddm);
                        $thongbaoTC ="Đã sửa sách thành công !";
                    }
    
    
    
    
                }
                }   
                include_once "sach/edit.php";
                break;

       
            case "lists":
            $listS = select_Allsanpham('',0);
            // echo "<pre>";
            // print_r($listS);
            
            include_once "sach/list.php";
            break;

         case "deletes":
                if(isset($_GET['id']) && $_GET['id']){
                  echo  $id = $_GET['id'];
                    $s = select_Onesanpham($id);
                    unlink($s['img']);
                    delete_sanpham($id);                
    
                    
                   echo $thongbao = "Đã Xóa Thành Công !";
                   }
                    
                   header('location:index.php?act=lists');
                break;

        case "listu":
            $listU = select_alluser();
            // echo "<pre>";
            // print_r($listU);

            include_once "user/list.php";

            break; 
        case "editu":
            if(isset($_GET['id']) && $_GET['id']){
                $id = $_GET['id'];
                
               }

            include_once "user/edit.php";
            

            break; 
        case "deleteu":
            if(isset($_GET['id']) && $_GET['id']){
                $id = $_GET['id'];
                delete_user($id);
                $thongbao = "Đã Xóa Thành Công !";
               }

            include_once "user/list.php";
            

            break; 

        case 'quanlydonhang':
            $listDH = select_giohang1($_SESSION['dn']['id_u']);

            include_once "donhang/list.php";

        break;
        case 'xulyxacnhan':
            if (isset($_GET['iddon']) && $_GET['iddon']) {
                $iddon = $_GET['iddon'];
                update_dks($iddon,1);
            }
            header('location:index.php?act=quanlydonhang');
            

        break;
        case 'xulyhoanthanh':
            if (isset($_GET['iddon']) && $_GET['iddon']) {
                $iddon = $_GET['iddon'];
                update_dks($iddon,2);
            }
            header('location:index.php?act=quanlydonhang');
            

        break;

        // 
        default:
        include "home.php";
            break;


    }
} else {
include "home.php";


}




include "footer.php";



ob_flush();

?>
