<section>
        <div id="list_book">
            <h2 style="margin-left: 100px;">Danh Sách Yêu Thích</h2>
            <div class="book_grid">
                <?php
                foreach ($_SESSION['love'] as $products) : extract($products);
                // print_r($products);
                    // echo $img_path.$img;
                    $productDetail = "index.php?act=ProductDetail&idsp=" . $id_s;
                     ?>
                    <div class="book_it">
                        <div class="book_it-img">
                            <a href="<?= $productDetail ?>">
                                <!-- <img src="View/Img/<?= $img ?>" alt=""> -->
                                <img src="<?= $img_path.$img ?>" alt="" style="height: 200px; width: 150px;">
                            </a>
                        </div>
                        <div class="book_it-name">
                            <h6 style="font-size: 20px; margin: 20px 0;"><?= $name_s ?></h6>
                        </div>
                        <div class="book_it-price">
                            <p><?= number_format($gia), 'đ' ?></p>
                        </div>
                        <div class="book_it-add">
                            <button class="btn"><a href="index.php?act=addbook&idsach=<?= $id_s ?>">Thêm vào giỏ hàng</a></button>
                            <a href="index.php?act=Favourite&idsach=<?= $id_s ?>">
                            <div class="add_icon" style="display: flex; justify-content: center; align-items: center;">
                                <i class="fa-solid fa-heart" style="color: #ffffff;"></i>
                            </div>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
</section>


