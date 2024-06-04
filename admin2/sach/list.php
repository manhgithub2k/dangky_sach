<!-- /.container-fluid -->
<div class="container-fluid ">
        <section class="row mx-0  ">
            <div class="col"></div>

            <button type="button" class="btn btn-secondary col-10" data-container="body" data-toggle="popover" data-placement="top" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                Danh Sách Danh Mục
                </button>
            <div class="col"></div>                        
        </section>
        <section class="row mx-0  ">
            <div class="col"></div>

            <span style="color: greenyellow;"><?php  echo isset($thongbao)? $thongbao : "";?></span>

            <div class="col"></div>                        
        </section>
        <section class="row mx-0 mt">
            
            <div class="col"></div>
            <div class="col-10">
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">STT</th>
                        <th scope="col">ID Sách</th>
                        <th scope="col">Tên Sách</th>
                        <th scope="col">Ảnh Bìa</th>
                        <th scope="col">Mô Tả</th>
                        <th scope="col">Số Lượng </th>
                        <th scope="col">Danh Mục </th>
                        <th scope="col">ACT</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $stt = 0;
                            foreach ($listS as $sach) {
                            $stt++;
                            extract($sach);
                            
                        ?>
                        <tr>
                        <th scope="row"><?= $stt ?></th>
                        <td><?= $id_s ?></td>
                        <td><?= $name_s ?></td>
                        <td><img src="<?= $img ?>" alt="" style="height: 100px;"></td>
                        <td><?= $mota ?></td>
                        <td><?= $soluong == null ? 0 : $soluong ?></td>
                        <td><?= $name_dm ?></td>

                        <td>
                            <button type="submit" class="btn btn-danger" > <a href="?act=deletes&id=<?= $id_s?>" onclick="return confirm('Bạn muốn xóa ?' )">Xóa</a></button>
                            <button type="submit" class="btn btn-warning"><a href="?act=edits&id=<?= $id_s?>">Sửa</a></button>
                        </td>
                        
                        </tr> 

                            <?php } ?>
                                                        
                    </tbody>
                </table>
                
            </div>
            <div class="col"></div>

        </section>


    </div>