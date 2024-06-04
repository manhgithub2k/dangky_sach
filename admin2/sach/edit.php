<!-- /.container-fluid -->
<div class="container-fluid ">
    <section class="row mx-0  ">
        <div class="col"></div>

        <button type="button" class="btn btn-secondary col-10" data-container="body" data-toggle="popover" data-placement="top" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
            Thêm Sách
        </button>
        <div class="col"></div>



        </section>
    <section class="row mx-0 mt">

        <div class="col"></div>
        <div class="col-10">
            <form action="?act=edits&id=<?=$id_s?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputEmail1">ID Sách</label>
                    <input type="text" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" disabled placeholder="Tăng tự động" >

                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Tên Sách</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="tens" value="<?= $name_s ?>">
                    <span style="color: red;"><?php echo isset($error['tens']) ? $error['tens'] : ''; ?></span>
                </div>
                
                <div class="form-group">
                    <label for="exampleInputPassword1">Ảnh Sách</label>
                    <img src="<?= $img ?>" alt="" style="height: 100px; padding: 5px;">
                    <input type="file" class="form-control" id="exampleInputPassword1" name="img" accept="*/*" >
                    <!-- <?php echo $_FILES['img']['name'] ?> -->
                    <span style="color: red;"><?php echo isset($error['img']) ? $error['img'] : ''; ?></span>
                    <span style="color: green;"><?php echo isset($imgTC) ? $imgTC : ''; ?></span>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Giá</label>
                    <input type="number" class="form-control" id="exampleInputPassword1" name="gia" value="<?= $gia ?>">
                    <span style="color: red;"><?php echo isset($error['gia']) ? $error['gia'] : ''; ?></span>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Mô Tả</label> <br>
                    <textarea name="mota" id="" cols="112" rows="7" ><?= $mota ?></textarea>
                    
                    <span style="color: red;"><?php echo isset($error['mota']) ? $error['mota'] : ''; ?></span>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Số Lượng</label>
                    <input type="number" class="form-control" id="exampleInputPassword1" name="soluong" value="<?= $soluong ?>">
                    <span style="color: red;"><?php echo isset($error['soluong']) ? $error['soluong'] : ''; ?></span>
                </div>
                
                <div class="form-group">

                    <label for="exampleInputPassword1">Danh Mục</label>
                    <select name="iddm" id="" class="form-control" id="exampleInputPassword1">
                        <option value="" >-- Chọn --</option>
                        <?php foreach ($AllDM as $dm){ 
                            
                        ?>
                        
                        <option value="<?= $dm['id_dm'] ?>" <?=  $dm['id_dm'] == $id_dm ? "selected" : ""  ?>   ><?= $dm['name_dm'] ?></option>
                        <?php }?>
                    </select>
                    <span style="color: red;"><?php echo isset($error['danhmuc']) ? $error['danhmuc'] : ''; ?></span>
                </div>
                
                
                
                <span style="color: green;"><?php echo isset($thongbaoTC) ? $thongbaoTC : ''; ?></span> <br>

                <input type="submit" class="btn btn-primary" value="Submit" name="submit">
            </form>
        </div>
        <div class="col"></div>

    </section>


</div>