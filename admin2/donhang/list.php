<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
$currentTime = new DateTime();
$vietnamTime = $currentTime->format('Y-m-d H:i:s');
?>

<!-- /.container-fluid -->

<div class="container-fluid ">
    <section class="row mx-0  " style="margin-bottom: 20px;">
        <div class="col"></div>

        <button type="button" class="btn btn-secondary col-10" data-container="body" data-toggle="popover"
            data-placement="top" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
            Danh Sách Đơn Hàng
        </button>
        <div class="col"></div>
    </section>
    <section class="row mx-0  ">
        <!-- <div class="col"></div> -->

        <span style="color: greenyellow;">
            <?php echo isset($thongbao) ? $thongbao : ""; ?>
        </span>

        <!-- <div class="col-0.5"></div>                         -->
    </section>
    <section class="row mx-0 mt">

        <!-- <div class="col"></div> -->
        <div class="col-12 fs-6">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col fs-6">STT</th>
                        <th scope="col">ID Đơn Hàng</th>
                        <th scope="col">Mã Sinh Viên</th>
                        <th scope="col">Họ và Tên</th>
                        <th scope="col">Tên Sách</th>
                        <th scope="col">Tổng Tiền </th>
                        <th scope="col">Ngày Đặt</th>                       
                        <th scope="col">Trạng Thái</th>
                        <th scope="col">Chức Năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $stt = 0;
                    foreach($listDH as $donHang) {
                        // print_r($donHang);
                        $stt++;
                        extract($donHang);
                        // $listPhong = select_Allphong_trong($donHang['3']);
                        // echo "<pre>";
                        //         print_r($donHang);
                    
                        ?>
                        <form action="" method="POST">
                            <tr>
                                <th scope="row">
                                    <?= $stt ?>
                                </th>
                                <td>
                                    <?= $id_dks ?>
                                </td>
                                <td>
                                    <?= isset($id_u) ? select_oneuser($id_u)['ma_sv'] : '1' ?>
                                </td>

                                <td>
                                <?= isset($id_u) ? select_oneuser($id_u)['ten_sv'] : '1' ?>

                                </td>
                                <td>
                                    <?= $name_s ?>
                                </td>
                                <td>
                                    <?= $tongtien ?>
                                </td>
                                <td>
                                    <?= $ngaymua ?>
                                </td>
                                
                                

                                <td>
                                    <?php
                                    if($trangthai == 2){
                                       echo "Đã Hoàn Thành";
                                    } else if($trangthai == 0){
                                            echo 'Đang Xử Lý';
                                    } else if($trangthai == 1 ){
                                            echo 'Đã Xác Nhận';
                                    }
                                     else if($trangthai == 3 ){
                                            echo 'Đã Hủy';
                                    }
                                    
                                    
                                    // ($trang_thai_don == 2 ?
                                    //     'Đã Hoàn Thành' : ($ngay_checkin < $vietnamTime ? ($trang_thai_don == 0 ? 'Khách chưa nhận Phòng' : ($trang_thai_don == 1 ? 'Đã Nhận Phòng' : '')) : 'Đợi Check In')); 
                                    ?>
                                </td>

                                <td>
                                    <?php
                                    if($trangthai == 0) { ?>
                                        <!-- <input type="submit" class="btn btn-warning" value="Đã Xác Nhận" name="submit"> -->
                                        <button type="submit" class="btn btn-warning"><a href="?act=xulyxacnhan&iddon=<?= $id_dks ?>">Đã Xác Nhận</a></button>

                                    <?php } else if($trangthai == 1) { ?>
                                        <!-- <input type="submit" class="btn btn-success" value="Đã Hoàn Thành" name="submit"> -->
                                        <button type="submit" class="btn btn-success"><a href="?act=xulyhoanthanh&iddon=<?= $id_dks ?>">Đã Hoàn Thành</a></button>

                                            <!-- <button type="submit" class="btn btn-warning"><a
                                                    href="?act=checkout&iddon=<?= $id_don ?>&idphong= <?= $id_phong ?>">Check
                                                    out</a></button> -->
                                                   
                                   
                                        
                                    <?php } ?>
                                    <!-- <?php 
                                                    // echo $id_don."</br>";
                                                    // echo $id_phong;
                                                    ?> -->

                                </td>

                            </tr>
                        </form>

                    <?php } ?>

                </tbody>
            </table>

        </div>
        <!-- <div class="col"></div> -->

    </section>


</div>