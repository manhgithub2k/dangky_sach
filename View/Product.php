<div class="container">
    <section>
        <div id="filter">
            <div class="filter">
                <p>
                    <i class="fa-solid fa-filter"></i>
                </p>
                <div class="filter_list">
                    <ul>
                        <li class="filter_item"><a href="">Phổ biến </a></li>
                        <li class="filter_item"><a href="">Bán chạy </a></li>
                        <li class="filter_item"><a href="">Gía từ cao dến thấp </a></li>
                        <li class="filter_item"><a href="">Gía từ thập đến cao </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div id="list_book">
            <div class="book_grid">
            <?php
                foreach ($product as $products) : extract($products);
                    $productDetail = "index.php?act=ProductDetail&idsp=" . $id_s; ?>
                    <div class="book_it">
                        <div class="book_it-img">
                            <a href="<?= $productDetail ?>">
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
                            <button class="btn"><a href="">Thêm vào giỏ hàng</a></button>
                            <div class="add_icon" style="display: flex; justify-content: center; align-items: center;">
                                <i class="fa-solid fa-heart" style="color: #ffffff;"></i>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</div>