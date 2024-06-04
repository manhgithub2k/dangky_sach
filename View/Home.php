<div class="container">
    <section>
        <div class="slideshow-container">

            <div class="mySlides fade">
                <img src="./View/Img/Banner01.png" style="width:100%">
            </div>

            <div class="mySlides fade">
                <img src="./View/Img/Banner02.png" style="width:100%">
            </div>

            <div class="mySlides fade">
                <img src="./View/Img/Banner03.png" style="width:100%">
            </div>
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
        <br>
    </section>

    <section>
        <div id="list_book">
            <h2>Công nghệ thông tin</h2>
            <div class="book_grid">
                <?php
                foreach ($product as $products) : extract($products);
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
</div>

<?php if(isset($_COOKIE['thongbaoAdd'])){ ?>


<script>
alert ('<?= $_COOKIE['thongbaoAdd'] ?>');
</script>

<?php }?>
