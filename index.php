<?php
ob_start();
session_start();
include "View/Layout/Head.php";
include "model/connect.php";
include "model/Product.php";
include "model/Category.php";
include "model/user.php";
include "model/sach.php";
include "model/giohang.php";
include "global.php";
if(!isset($_SESSION['cart'])){
    $_SESSION['cart']=[];
}
if(!isset($_SESSION['love'])){
    $_SESSION['love']=[];
}
$ngayHienTai =  date('Y-m-d H:i:s');
// $ngayHienTai =  date(' d/m/Y H:i:s');
$category = renderCategory();
include "View/Layout/Header.php";
$product = renderProduct();
if ((isset($_GET['act'])) && $_GET['act'] != "") {
    $act = $_GET['act'];
    switch ($act) {
        case 'ProductSearch':
            if (isset($_POST['kyw']) && ($_POST['kyw'] != "")) {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = "";
            }
            if (isset($_GET['id_dm']) && $_GET['id_dm'] > 0) {
                $id_dm = $_GET['id_dm'];
            } else {
                $id_dm = 0;
            }
            $listProduct = renderProductCategory($kyw, $id_dm);
            $nameCate = searchProduct($id_dm);
            include "View/ProductSearch.php";
            break;
        case 'ProductDetail':
            if (isset($_GET['idsp']) && $_GET['idsp'] > 0) {
                $productDetail = renderProductDetails($_GET['idsp']);
                include "View/ProductDetail.php";
            } else {
                include "View/Home.php";
            }
        break;
            case 'ProductSearch':
                if (isset($_POST['kyw']) && ($_POST['kyw'] != "")) {
                    $kyw = $_POST['kyw'];
                } else {
                    $kyw = "";
                }
                if (isset($_GET['id_dm']) && $_GET['id_dm'] > 0) {
                    $id_dm = $_GET['id_dm'];
                } else {
                    $id_dm = 0;
                }
                $listProduct = renderProductCategory($kyw, $id_dm);
                $nameCate = searchProduct($id_dm);
                include "View/ProductSearch.php";
                break;
            case 'ProductDetail':
                if (isset($_GET['idsp']) && $_GET['idsp'] > 0) {
                    $productDetail = renderProductDetails($_GET['idsp']);
                    include "View/ProductDetail.php";
                } else {
                    include "View/Home.php";
                }
                break;
            case "Register":
                $thongbao = initThongBao();
                if(isset($_POST["register"])) {
                    $maSV = $_POST["maSV"];
                    $tenSV = $_POST["tenSV"];
                    $sdt = $_POST["sdtSV"];
                    $major = $_POST["chuyennganh"];
                    $email = $_POST["email"];
                    $password = $_POST["pass"];
    
                    // Kiểm tra điều kiện và gán thông báo lỗi
                    if (kiemTraDieuKien($maSV, $tenSV, $sdt, $major, $email, $password, $thongbao)) {
                        if(!kiemTra_email($email)){
                        user_insert($maSV, $tenSV, $sdt, $major, $email, $password);
    
                        $_SESSION['email'] = $email;
    
                        $_SESSION['thanhcong_tb'] = "Bạn đã đăng kí tài khoản thành công";
                        $_SESSION['thanhcong'] = true;
    
                        header("Location: index.php?act=Login");
                        exit();
                        }else{
                            $thongbao['email'] = "Email đã được sử dụng!!!";
                        }
                    }
                }
                include "View/Account/Register.php";
                break;
            case 'Login':
                if (isset($_SESSION['thanhcong_tb']) && isset($_SESSION['thanhcong']) && $_SESSION['thanhcong']) {
                    
                    $thanhcong= $_SESSION['thanhcong_tb'];
        
                    unset($_SESSION['thanhcong_tb']);
                    unset($_SESSION['thanhcong']);
                } 
                if(isset($_POST['login'])){
                    $username = $_POST['user'];
                    $password = $_POST['pass'];
                    $dangnhap = login($username, $password);
                    $_SESSION['dn'] = $dangnhap;
                    if(is_array($dangnhap)){
                        // print_r($dangnhap);
                        $parts = explode(" ", $dangnhap['ten_sv']);
                        $ten_SV = $parts[count($parts) - 1];
                       
                        $_SESSION['user'] = $ten_SV;
                        $_SESSION['email'] = $dangnhap['email'];
                        if($dangnhap['role'] == '1'){
                            header('location: admin.php');
                            exit();
                        }elseif($dangnhap['role'] == '0'){
                            header('location: index.php');
                            exit();
                        }
                    }else{
                        $taikhoansai = "Tên đăng nhập hoặc mật khẩu không tồn tại hãy nhập lại...";
                    }
                    
                    
                }
                include "View/Account/Login.php";
                break;
            case "logout":
                logout();
                unset($_SESSION['dn']);
                header('location:index.php');
                break;
        case "Product":
            include "View/Product.php";
            break;
        case "Cart":
            $listDH = select_giohang($_SESSION['dn']['id_u']);
            $listLSDH = select_lichsu_giohang($_SESSION['dn']['id_u']);
            include "View/Cart/Cart.php";
            break;
        case "addbook":
            if(isset($_GET['idsach']) && $_GET['idsach']){
                $idSach = $_GET['idsach'];
                // unset($_SESSION['cart']);
                if(isset($_SESSION['cart'][$idSach])){
                    $_SESSION['cart'][$idSach]['soluong'] += 1;
                    header('location:index.php');
                    setcookie('thongbaoAdd','Thêm Thành Công !',time()+2);  
                } else {
                    $_SESSION['cart'][$idSach]=[
                        'masach'=>$idSach,
                        'tensach' => select_Onesanpham($idSach)['name_s'],
                        'gia' => select_Onesanpham($idSach)['gia'],
                        'soluong'=>1,
                        'anhbia'=>select_Onesanpham($idSach)['img']

                    ];
                    // print_r($_SESSION['cart']);
                    header('location:index.php');
                    setcookie('thongbaoAdd','Thêm Thành Công !',time()+2);    
                }

                if(isset($_GET['hd'])&&$_GET['hd']){
                    if($_GET['hd']== 'xoa'){
                        unset($_SESSION['cart'][$idSach]);
                        header('location:index.php?act=Cart');
                        setcookie('thongbao','Xóa Thành Công !',time()+2);
                    }
                }

            }
            // print_r($_SESSION['cart']);
            // header('location:index.php?act=Cart');
            // setcookie('thongbaoTC','Đăng Ký Thành Công !',time()+2);
            // header('location:index.php');

            // include "View/Cart/Cart.php";
            break;

        case 'xoadon':
            if(isset($_GET['iddon']) && $_GET['iddon']){
                update_dks($_GET['iddon'],3);
            }
            header('location:index.php?act=Cart');

        break;

        case 'dangkysach':
        
                if(isset($_SESSION['dn'])&& $_SESSION['dn']){
                    // print_r($_SESSION['dn']);
                    if(isset($_SESSION['cart']) ){ 
                        $tong = 0;
                        foreach ($_SESSION['cart'] as $cart) { 
                    if(isset($cart) && $cart){ 

                        extract($cart);
                        
                        $tong += $gia*$soluong;

                    }}
                    insert_cart($_SESSION['dn']['id_u'],$tong,$ngayHienTai);
                    // if(insert_cart($_SESSION['dn']['id_u'],$tong,$ngayHienTai)){
                        $hi = select_dangky($_SESSION['dn']['id_u'],$ngayHienTai);
                        // print_r($hi);
                        if(is_array($hi)){
                            foreach ($_SESSION['cart'] as $cart) { 
        
                                extract($cart); 
                                
                                insert_dks_nd($_SESSION['dn']['id_u'], $hi['id_dk'], $cart['masach']);
                                unset($_SESSION['cart']);
                            }
                            header('location:index.php?act=Cart');
                            setcookie('thongbaoTC','Đăng Ký Thành Công !',time()+2);

                        }
                    
                    // }
                    
                    } else {
                        $thongbao = "Hãy đăng nhập để đăng ký sách ";
                    include "View/Cart/Cart.php";

                    }
                }      
        break;

        case 'Favourite':

            if(isset($_GET['idsach']) && $_GET['idsach']){
                $idSach = $_GET['idsach'];
                // unset($_SESSION['cart']);
                if(isset($_SESSION['love'][$idSach])){
                    unset($_SESSION['love'][$idSach]);
                    header('location:index.php');
                    setcookie('thongbaoAdd','Xóa Khỏi Yêu Thích Thành Công !',time()+2);  
                } else {
                    $_SESSION['love'][$idSach]=[
                        'id_s'=>$idSach,
                        'name_s' => select_Onesanpham($idSach)['name_s'],
                        'gia' => select_Onesanpham($idSach)['gia'],
                        'soluong'=>1,
                        'img'=>select_Onesanpham($idSach)['img']

                    ];
                    // header('location:index.php');
                    setcookie('thongbaoAdd','Thêm Vào Yêu Thích Thành Công !',time()+2);    
                }
                echo "haha";

                // if(isset($_GET['hd'])&&$_GET['hd']){
                //     if($_GET['hd']== 'xoa'){
                //         unset($_SESSION['love'][$idSach]);
                //         header('location:index.php?act=love');
                //         setcookie('thongbao','Xóa Thành Công !',time()+2);
                //     }
                // }

            }
            include_once 'View/Favourite/favourite.php';
        break;

        
        default:
        break;
    }
} else {
    include "View/Home.php";
}


include "View/Layout/Footer.php";

ob_flush();