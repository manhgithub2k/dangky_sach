<!-- /.container-fluid -->
<div class="container-fluid ">
<section class="row mx-0  ">
            <div class="col"></div>

            <button type="button" class="btn btn-secondary col-10" data-container="body" data-toggle="popover" data-placement="top" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                Danh Sách Người Dùng
                </button>
            <div class="col"></div>                        
        </section>
        <section class="row mx-0  ">
            <!-- <div class="col"></div> -->

            <span style="color: greenyellow;"><?php  echo isset($thongbao)? $thongbao : "";?></span>

            <!-- <div class="col-0.5"></div>                         -->
        </section>
        <section class="row mx-0 mt">
            
            <!-- <div class="col"></div> -->
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">STT</th>
                        <th scope="col">ID User</th>
                        <th scope="col">Mã Sinh Viên</th>
                        <th scope="col">Họ và Tên </th>
                        <th scope="col">Số Điện Thoại</th>
                        <th scope="col">Email</th>
                        <th scope="col">Vai Trò</th>
                        <th scope="col">Chức Năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $stt = 0;
                            foreach ($listU as $user) {
                            $stt++;
                            extract($user);
                            
                        ?>
                        <tr>
                        <th scope="row"><?= $stt ?></th>
                        <td><?= $id_u ?></td>
                        <td><?= $ma_sv ?></td>
                        <td><?= $ten_sv ?></td>
                        <td><?= $sdt ?></td>
                        <td><?= $email ?></td>
                        <td><?php echo $role == 0 ? 'Admin':( $role == 1 ? 'Người Dùng' : '')  ?></td>

                        <td>
                            <button type="submit" class="btn btn-danger" > <a href="?act=deleteu&id=<?= $id_u?>" onclick="return confirm('Bạn muốn xóa ?' )">Xóa</a></button>
                            <button type="submit" class="btn btn-warning"><a href="?act=editu&id=<?= $id_u?>">Sửa Vai Trò</a></button>
                        </td>
                        
                        </tr> 

                            <?php } ?>
                                                        
                    </tbody>
                </table>
                
            </div>
            <!-- <div class="col"></div> -->

        </section>


    </div>

