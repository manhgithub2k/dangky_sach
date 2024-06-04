    <div id="header">
        <div class="header">
            <div class="header_contact">
                <p style="margin-top: -3px;"><i class="fa-regular fa-envelope"></i> caodang@fpt.edu.vn</p>
            </div>
            <div class="header_contact">
                <p style="font-size: 14px;"><i class="fa-regular fa-envelope"></i>024 6327 6402 / 0981 725 836
                </p>
            </div>
        </div>
        <div class="header_page">
            <div class="header_logo">
                <a href="index.php">
                    <img src="./View/Img/Header.png" alt="">
                </a>
            </div>
            <div class="header_input">
                <form action="index.php?act=ProductSearch" method="POST">
                    <input type="text" name="kyw" placeholder="Tìm kiếm">
                    <input type="submit" name="search" value="Tìm kiếm">
                </form>
            </div>
            <div class="header_icon">
                <span>
                    <i class="fa-regular fa-bell"></i>
                    <p>Thông báo</p>
                </span>
                <span>
                    <?php 
                    if(!isset($_SESSION['user'])){
                    ?>
                        <a style="color: #000;" href="index.php?act=Login">
                        <i class="fa-regular fa-user"></i>
                        <p>Tài Khoản</p>
                    </a>
                    <?php 
                    } else{
                    ?>
                        <i class="fa-regular fa-user"></i>

                        <ul class="menu">
                            <li><p><?= isset($_SESSION['user']) ? $_SESSION['user'] : '' ?></p>
                            
                                <ul class="sub-menu">
                                <li><a href="index.php?act=logout">Đăng Xuất</a></li>
                                
                                </ul>
                            
                        
                        </li>
                        </ul>
                        
                    <?php 
                    } 
                    ?>


                    
                    
                </span>
                <span>
                    <a style="color: #000;" href="index.php?act=Cart">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <p>Giỏ hàng</p>
                    </a>
                </span>
            </div>
        </div>
    </div>
    </header>
    <div class="container">
        <header>
            <div id="header_mobile">
                <div class="header_mobile">
                    <div class="header_mobile-menu">
                        <div id="myNav" class="overlay">
                            <a style="border: none;" href="javascript:void(0)" class="closebtn" onclick="closeNav()">MENU</a>
                            <div class="overlay-content">
                                <li><a href="index.php">Trang chủ</a></li>
                                <li class="accordion">Danh mục</li>
                                <div class="panel">
                                    <ul>
                                        <?php foreach ($category as $categories) {
                                            extract($categories);
                                            $linkCatagory = "index.php?act=Product&id_dm=" . $id_dm;
                                            echo '<li><a href="' . $linkCatagory . '">' . $name_dm . '</a></li>';
                                        } ?>
                                    </ul>
                                </div>
                                <li><a href="index.php?act=Product">Sản phẩm</a></li>
                                <li><a href="index.php?act=Promotion">Khuyến mãi</a></li>
                                <li><a href="index.php?act=Favourite">Yêu thích</a></li>
                            </div>
                        </div>
                        <span style="font-size: 20px;" onclick="openNav()"><i class="fa-solid fa-bars"></i></span>
                    </div>
                    <div class="header_mobile-logo">
                        <a href="index.php">
                            <img src="./View/Img/Header.png" alt="">
                        </a>
                    </div>
                    <div class="header_mobile-icon">
                        <div id="mySearch" class="overlay">
                            <a style="border: none;" href="javascript:void(0)" class="closebtn" onclick="closeSearch()">SEARCH</a>
                            <div class="overlay-content">
                                <form style="display: block;" action="" method="POST">
                                    <input style="    width: 100%;
                                    padding: 10px;
                                    border-radius: 5px;
                                    border: 1px solid #ccc;
                                    font-size: 13px; margin-top: 10px;" type="text" name="" placeholder="Tìm kiếm">
                                    <input style="    width: 100%;
                                    padding: 10px;
                                    border-radius: 5px;
                                    border: 1px solid #ccc;
                                    font-size: 13px; background: #000;
    color: #fff; margin-top: 10px;" type="submit" value="Tìm kiếm">
                                </form>
                            </div>
                        </div>
                        <span onclick="openSearch()"><i class="fa-solid fa-magnifying-glass"></i></span>
                        <span><a style="color: #000;" href="index.php?act=Login"><i class="fa-regular fa-user"></i></a></span>
                        <span><i class="fa-solid fa-cart-shopping"></i></span>
                    </div>
                </div>
            </div>
        </header>
        <nav>
            <div id="nav">
                <div class="nav">
                    <ul class="nav_menu">
                        <li class="menu_list-item"><a href="index.php">Trang chủ</a></li>
                        <li style="color: #fff; cursor: pointer;" class="menu_list-item">Danh mục
                            <div class="menu_hover">
                                <ul>
                                    <?php foreach ($category as $categories) {
                                        extract($categories);
                                        $linkCatagory = "index.php?act=ProductSearch&id_dm=" . $id_dm;
                                        echo '<li><a href="' . $linkCatagory . '">' . $name_dm . '</a></li>';
                                    } ?>
                                </ul>
                            </div>
                        </li>
                        <li class="menu_list-item"><a href="index.php?act=Product">Sản phẩm</a>
                        </li>
                        <li class="menu_list-item"><a href="index.php?act=Promotion">Khuyến mãi</a></li>
                        <li class="menu_list-item"><a href="index.php?act=Favourite">Yêu thích</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>