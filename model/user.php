<?php
    function kiemTraDieuKien($maSV, $tenSV, $sdt, $major, $username, $password, &$thongbao)
    {
        if (empty($maSV) || !preg_match('/^PH\d+$/', $maSV)) {
            $thongbao['maSV'] = "Mã sinh viên không hợp lệ!";
        }

        if (empty($tenSV)) {
            $thongbao['tenSV'] = "Vui lòng nhập tên sinh viên!";
        }

        if (empty($sdt) || !preg_match('/^0[2-9]\d{8}$/', $sdt)) {
            $thongbao['sdtSV'] = "Số điện thoại không hợp lệ!";
        }

        if (empty($major)) {
            $thongbao['chuyennganh'] = "Vui lòng nhập chuyên ngành!";
        }

        if (empty($username) || !filter_var($username, FILTER_VALIDATE_EMAIL) || !preg_match('/@fpt\.edu\.vn$/', $username)) {
            $thongbao['user'] = "Email không hợp lệ!";
        }

        if (empty($password) || !preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/', $password)) {
            $thongbao['pass'] = "Mật khẩu không hợp lệ!";
        }

        return array_filter($thongbao) == false;
    }
    function initThongBao() {
        return array(
            'maSV' => '',
            'tenSV' => '',
            'sdtSV' => '',
            'chuyennganh' => '',
            'user' => '',
            'pass' => '',
        );
    }    
    function kiemTra_email($username) {
        $sql = "SELECT * FROM nguoidung WHERE email = '$username'";
        $result = pdo_query_one($sql);

        return $result != false;
    }
    function user_insert($maSV,$tenSV,$sdt,$major,$username,$password){
        $sql = "INSERT INTO `nguoidung`(`ma_sv`, `ten_sv`, `sdt`, `chuyennganh` , `email`, `pass`)
                 VALUES ('$maSV','$tenSV','$sdt','$major','$username','$password');";
        pdo_execute($sql);      
    };
    function login($username,$password){
        $sql = "SELECT * FROM nguoidung WHERE email = '$username' AND pass = '$password'";
        return pdo_query_one($sql);
        
    }
    function logout(){
        if(isset($_SESSION['user'])){
            unset($_SESSION['user']);
        }
    }
?>