<div class="container">
<section>
    <form action="" method="POST">
        <div id="form_register">
            <h2>Đăng nhập</h2>
            <div class="form">
                <?php if (isset($thanhcong)): ?>
                    <h2 style="color: green;"><?php echo $thanhcong; ?></h2>
                <?php endif; ?>
                <?php if (isset($taikhoansai)): ?>
                    <h4 style="color: red;"><?php echo $taikhoansai; ?></h4><br>
                <?php endif; ?>
                <div class="form_group">
                    <div class="form_label">
                        <label for="">Email</label>
                    </div>
                    <div class="form_input">
                        <input type="email" value="<?php echo isset($_SESSION['email'])?$_SESSION['email']:'' ?>" name="user" placeholder="Email">
                        <div class="form_erorrs">
                            <span></span>
                        </div>
                    </div>
                </div>
                <div class="form_group">
                    <div class="form_label">
                        <label for="">Mật khẩu</label>
                    </div>
                    <div class="form_input">
                        <input type="password" name="pass" placeholder="Mật khẩu">
                        <div class="form_erorrs">
                            <span></span>
                        </div>
                    </div>
                </div>
                <div class="register">
                    <a style="color:  #000;" href="index.php?act=Register">Bạn chưa có tài khoản?</a>
                </div>
                <div class="form_submit">
                    <input type="submit" name="login" value="Đăng nhập">
                </div>
            </div>
        </div>
    </form>
</section>
</div>