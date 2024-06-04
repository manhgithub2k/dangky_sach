<div class="container">
<form action="index.php?act=Register" method="POST">
                <div id="form_register">
                    <h2>Đăng ký</h2>
                    <div class="form">
                        <div class="form_group">
                            <div class="form_label">
                                <label for="">Mã sinh viên</label>
                            </div>
                            <div class="form_input">
                                <input type="text" name="maSV" placeholder="Mã sinh viên">
                                <div class="form_erorrs">
                                    <span><?php echo'<p style="color: red">' .$thongbao['maSV'] . '</p>' ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="form_group">
                            <div class="form_label">
                                <label for="">Họ và tên</label>
                            </div>
                            <div class="form_input">
                                <input type="text" name="tenSV" placeholder="Họ và tên">
                                <div class="form_erorrs">
                                    <span><?php echo'<p style="color: red">'. $thongbao['tenSV']. '</p>'?></span>
                                </div>
                            </div>
                        </div>
                        <div class="form_group">
                            <div class="form_label">
                                <label for="">Số điện thoại</label>
                            </div>
                            <div class="form_input">
                                <input type="text" name="sdtSV" placeholder="Số điện thoại">
                                <div class="form_erorrs">
                                    <span><?php echo '<p style="color: red">'. $thongbao['sdtSV']. '</p>' ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="form_group">
                            <div class="form_label">
                                <label for="">Chuyên ngành</label>
                            </div>
                            <div class="form_input">
                                <input type="text" name="chuyennganh" placeholder="Chuyên ngành học">
                                <div class="form_erorrs">
                                    <span><?php echo '<p style="color: red">'. $thongbao['chuyennganh']. '</p>' ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="form_group">
                            <div class="form_label">
                                <label for="">Email</label>
                            </div>
                            <div class="form_input">
                                <input type="email" name="email" placeholder="Email">
                                <div class="form_erorrs">
                                    <span><?php echo '<p style="color: red">'. $thongbao['email'].'</p>'?></span>
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
                                    <span><?php echo '<p style="color: red">'.$thongbao['pass'].'</p>' ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="form_submit">
                                <input type="submit" name="register" value="Đăng ký">
                        </div>
                    </div>
                </div>
            </form>
</div>