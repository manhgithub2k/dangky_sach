<?php 
function thongke_sp_dm(){
    //  không dược count(*) vì có group by 
    $sql = "SELECT dm.id, dm.name, COUNT(*) AS soluong, MIN(sp.price) AS gia_min, MAX(sp.price) AS gia_max, AVG(sp.price) AS gia_avg
    FROM danhmuc dm
    JOIN sanpham sp ON dm.id = sp.iddm
    GROUP BY dm.id, dm.name
    ORDER BY soluong DESC;";
    return pdo_query($sql);
}




?>