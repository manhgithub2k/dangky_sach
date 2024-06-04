<div class="container">
    <div class="tab" style="margin-bottom: 30px; margin-top: 30px;">
        <button class="tablinks" onclick="openCity(event, 'cart')">Giỏ hàng của bạn</button>
        <button class="tablinks" onclick="openCity(event, 'myBill')">Đơn hàng của bạn</button>
        <button class="tablinks" onclick="openCity(event, 'history')">Lịch sử đặt hàng</button>
    </div>

    <div class="wrapper">
        <div id="cart" class="tabcontent">
            <div class="container_wrapper">
                    <?php
                    $tong = 0;
                     if(isset($_SESSION['cart']) ){ 
                        foreach ($_SESSION['cart'] as $cart) { 
                     if(isset($cart) && $cart){ 

                        extract($cart);
                        $tong += $gia*$soluong;
                        ?>

                        <div class="wrapper_cart">

                            <div class="cart_img">
                                <img src="<?= $img_path.$anhbia ?>" alt="" style="height: 200px; width: 150px;">
                            </div>
                            <div class="cart_name">
                                <h3><?= $tensach ?></h3>
                                <p><?= $gia ?> VND</p>
                            </div>
                            <div class="cart_quantity">
                                <button onclick="decrease()">-</button>
                                <input type="text" id="quantity" value="<?= $soluong ?>" readonly>
                                <button onclick="increase()">+</button>
                            </div>
                            <div class="cart_total-price">
                                <p><?= $gia*$soluong ?> VND</p>
                            </div>
                            <div class="cart_del">
                                <a href="index.php?act=addbook&idsach=<?= $masach ?>&&hd=xoa">Xóa</a>
                            </div>
                        </div>

                        
                    <?php } }

                    
                }?>
                    
                <!-- <div class="wrapper_cart">
                    <div class="cart_img">
                        <img src="./View/Img/BookIT.jpg" alt="">
                    </div>
                    <div class="cart_name">
                        <h3>Tớ học lập trình - làm quen với lập trình</h3>
                        <p>85.000 VND</p>
                    </div>
                    <div class="cart_quantity">
                        <button onclick="decrease()">-</button>
                        <input type="text" id="quantity" value="1" readonly>
                        <button onclick="increase()">+</button>
                    </div>
                    <div class="cart_total-price">
                        <p>170.000 VND</p>
                    </div>
                    <div class="cart_del">
                        <a href="">Xóa</a>
                    </div>
                </div> -->
                <section style="margin-bottom: 50px; text-align: center; color: red; font-size: 30px;">
                            <h3>Tổng : <?= $tong ?> VDN</h3>
                            <button style="height: 40px; width: 160px; background-color: red; border: none; margin-top: 20px;"><a href="index.php?act=dangkysach">Submit</a></button>
                           <p style=""><span style="color: red; font-size: 30px; text-align: center; margin-top: 60px;"><?= isset($thongbao)? $thongbao : ""  ?></span></p> 
                           <p style=""><span style="color: green; font-size: 30px; text-align: center; margin-top: 60px;"><?= isset($_COOKIE['thongbaoTC'])? $_COOKIE['thongbaoTC'] : ""  ?></span></p> 

                </section>
            </div>
        </div>
        
        <div id="myBill" class="tabcontent">
            <?php                                
                foreach ($listDH as $donHang) { 
                    // print_r($donHang);
                     extract($donHang);
            ?>
            
            <div class="container_wrapper">
                <div class="wrapper_cart">
                    <div class="cart_img">
                        <img src="<?= $img_path.$img ?>" alt="" style="height: 250px; width: 170px;">
                    </div>
                    <div class="cart_name">
                        <h3><?= $name_s ?></h3>
                        <p><?= $gia ?> VND</p>
                    </div>
                    <div class="cart_quantity">
                        <input type="text" id="quantity" value="1" readonly>
                    </div>
                    <div class="cart_total-price">
                        <p><?= $tongtien ?> VND</p>
                    </div>
                    <?php if($trangthai == 0){ ?>
                        <div class="cart_status">
                            <p>Đang xử lý</p>
                            <div class="cart_del-icon">
                                <a href="index.php?act=xoadon&&iddon=<?= $id_dk ?>">
                                <i class="fa-solid fa-trash"></i>
                                </a>
                            </div>
                        </div>
                    <?php } else if($trangthai == 1){ ?>
                        <div class="cart_status_warring" style="background: #fdb015;
                            color: #fff;
                            padding: 50px 10px;
                            position: relative;
                            top: -30px;
                            font-size: 14px;">
                            <p>Đã xác nhận</p>
                        </div>
                    <?php } else if($trangthai == 2){ ?>
                        <div class="cart_status_success" style=" background: rgb(19, 161, 0);
                            color: #fff;
                            padding: 50px 10px;
                            position: relative;
                            top: -30px;
                            font-size: 14px;">
                            <p>Đã Hoàn Thành</p>
                        </div> 
                        <?php } ?>   
                </div>

            </div>
            <div class="cart_time" style="margin-bottom: 20px;">
                <p><?= $ngaymua ?></p>
                <h6>Tổng tiên: <?= $tongtien ?> VND</h6>
            </div>
            <?php } ?>

            
            <!-- <div id="bill_comfirm">
                <div class="container_wrapper">
                    <div class="wrapper_cart">
                        <div class="cart_img">
                            <img src="./View/Img/BookIT.jpg" alt="">
                        </div>
                        <div class="cart_name">
                            <h3>Tớ học lập trình - làm quen với lập trình</h3>
                            <p>85.000 VND</p>
                        </div>
                        <div class="cart_quantity">
                            <input type="text" id="quantity" value="1" readonly>
                        </div>
                        <div class="cart_total-price">
                            <p>170.000 VND</p>
                        </div>
                        <div class="cart_status">
                            <p>Đã xác nhận</p>
                        </div>
                    </div>
                    <div class="wrapper_cart">
                        <div class="cart_img">
                            <img src="./View/Img/BookIT.jpg" alt="">
                        </div>
                        <div class="cart_name">
                            <h3>Tớ học lập trình - làm quen với lập trình</h3>
                            <p>85.000 VND</p>
                        </div>
                        <div class="cart_quantity">
                            <input type="text" id="quantity" value="1" readonly>
                        </div>
                        <div class="cart_total-price">
                            <p>170.000 VND</p>
                        </div>
                        <div class="cart_status" style="opacity: 0;">
                            <p>Đang xử lý</p>
                        </div>
                    </div>
                </div>
                <div class="cart_time">
                    <p>(08/11/2023 - 10:32 am)</p>
                    <h6>Tổng tiên: 197.000 VND</h6>
                </div>
            </div> -->
        </div>
        <div id="history" class="tabcontent">
        <?php                                
                foreach ($listLSDH as $donHang) { 
                    // print_r($donHang);
                     extract($donHang);
            ?>
            
            <div class="container_wrapper">
                <div class="wrapper_cart">
                    <div class="cart_img">
                        <img src="<?= $img_path.$img ?>" alt="" style="height: 250px; width: 170px;">
                    </div>
                    <div class="cart_name">
                        <h3><?= $name_s ?></h3>
                        <p><?= $gia ?> VND</p>
                    </div>
                    <div class="cart_quantity">
                        <input type="text" id="quantity" value="1" readonly>
                    </div>
                    <div class="cart_total-price">
                        <p><?= $tongtien ?> VND</p>
                    </div>
                    <?php if($trangthai == 4){ ?>
                        <div class="cart_status">
                            <p>Đang xử lý</p>
                            <div class="cart_del-icon">
                                <a href="index.php?act=xoadon&&iddon=<?= $id_dk ?>">
                                <i class="fa-solid fa-trash"></i>
                                </a>
                            </div>
                        </div>
                    <?php } else if($trangthai == 3){ ?>
                        <div class="cart_status_warring" style="background: #fdb015;
                            color: #fff;
                            padding: 50px 10px;
                            position: relative;
                            top: -30px;
                            font-size: 14px;">
                            <p>Đã Hủy</p>
                        </div>
                    <?php } else if($trangthai == 2){ ?>
                        <div class="cart_status_success" style=" background: rgb(19, 161, 0);
                            color: #fff;
                            padding: 50px 10px;
                            position: relative;
                            top: -30px;
                            font-size: 14px;">
                            <p>Đã Hoàn Thành</p>
                        </div> 
                        <?php } ?>   
                </div>

            </div>
            <div class="cart_time" style="margin-bottom: 20px;">
                <p><?= $ngaymua ?></p>
                <h6>Tổng tiên: <?= $tongtien ?> VND</h6>
            </div>
            <?php } ?>

            <!-- <div id="bill_comfirm">
                <div class="container_wrapper">
                    <div class="wrapper_cart">
                        <div class="cart_img">
                            <img src="./View/Img/BookIT.jpg" alt="">
                        </div>
                        <div class="cart_name">
                            <h3>Tớ học lập trình - làm quen với lập trình</h3>
                            <p>85.000 VND</p>
                        </div>
                        <div class="cart_quantity">
                            <input type="text" id="quantity" value="1" readonly>
                        </div>
                        <div class="cart_total-price">
                            <p>170.000 VND</p>
                        </div>
                        <div class="cart_status">
                            <p style="background-color: green;">Đã xác nhận</p>
                        </div>
                    </div>
                    <div class="wrapper_cart">
                        <div class="cart_img">
                            <img src="./View/Img/BookIT.jpg" alt="">
                        </div>
                        <div class="cart_name">
                            <h3>Tớ học lập trình - làm quen với lập trình</h3>
                            <p>85.000 VND</p>
                        </div>
                        <div class="cart_quantity">
                            <input type="text" id="quantity" value="1" readonly>
                        </div>
                        <div class="cart_total-price">
                            <p>170.000 VND</p>
                        </div>
                        <div class="cart_status" style="opacity: 0;">
                            <p>Đang xử lý</p>
                        </div>
                    </div>
                </div>
                <div class="cart_time">
                    <p>(08/11/2023 - 10:32 am)</p>
                    <h6>Tổng tiên: 197.000 VND</h6>
                </div>
            </div>
            <div id="bill_cancel">
                <div class="container_wrapper">
                    <div class="wrapper_cart">
                        <div class="cart_img">
                            <img src="./View/Img/BookIT.jpg" alt="">
                        </div>
                        <div class="cart_name">
                            <h3>Tớ học lập trình - làm quen với lập trình</h3>
                            <p>85.000 VND</p>
                        </div>
                        <div class="cart_quantity">
                            <input type="text" id="quantity" value="1" readonly>
                        </div>
                        <div class="cart_total-price">
                            <p>170.000 VND</p>
                        </div>
                        <div class="cart_status">
                            <p style="cursor: pointer;">Hủy đơn hàng</p>
                        </div>
                    </div>
                    <div class="wrapper_cart">
                        <div class="cart_img">
                            <img src="./View/Img/BookIT.jpg" alt="">
                        </div>
                        <div class="cart_name">
                            <h3>Tớ học lập trình - làm quen với lập trình</h3>
                            <p>85.000 VND</p>
                        </div>
                        <div class="cart_quantity">
                            <input type="text" id="quantity" value="1" readonly>
                        </div>
                        <div class="cart_total-price">
                            <p>170.000 VND</p>
                        </div>
                        <div class="cart_status" style="opacity: 0;">
                            <p>Đang xử lý</p>
                        </div>
                    </div>
                </div>
                <div class="cart_time">
                    <p>(08/11/2023 - 10:32 am)</p>
                    <h6>Tổng tiên: 197.000 VND</h6>
                </div>
            </div> -->
        </div>
    </div>
</div>