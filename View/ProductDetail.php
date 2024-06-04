<?php extract($productDetail); ?>
<div class="container">
    <section>
        <div id="product_detail">
            <div class="product_detail">
                <div class="product_detail-img">
                    <img src="./View/Img/Product.png" alt="">
                </div>
                <div class="product_detail-desc">
                    <div class="product_detail-title">
                        <h2><?= $name_s ?></h2>
                    </div>
                    <div class="product_detail-price">
                        <p><?= number_format($gia) , 'đ'; ?></p>
                    </div>
                    <div class="product_detail-add">
                        <form action="" method="POST">
                            <input type="submit" value="Thêm vào giỏ hàng">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div id="product_detail-text">
            <h2>Mô tả</h2>
            <div class="product_details-title">
                <h5><?= $name_s ?></h5>
            </div>
            <div class="product_details-desc">
                <p><?= $mota ?></p>
            </div>
        </div>
    </section>
    <section>
        <div class="box_title">BÌNH LUẬN</div>
        <form action="" method="POST">
            <div class="comment-ipnut">
                <input type="hidden">
                <input name="noidung" id="comment-input-type" placeholder="Nhập comment">
                <div class="notification__error">
                </div>
                <input type="submit" class="btn_submit" name="guibinhluan" value="Gửi bình luận">
            </div>
        </form>
        <div class="render__comment" style="overflow-y: scroll; height: 300px;">
            <p style="font-size: 14px; margin-bottom: 0;">Nguyễn Văn Khôi</p>
            <div class="comment">
                <p style="font-size: 15px; margin-bottom: 0; max-width: 1170px; word-wrap: break-word;">Đẹp trai</p>
                <div class="comment_time">
                    <p style="font-size: 12px;">03/11/2023</p>
                </div>
            </div>
        </div>
    </section>
</div>