<?php 
function renderProduct() {
    $sql = "SELECT * FROM sach";
    $product = pdo_query($sql);
    return $product;
}

function renderProductCategory($kyw = "", $id_dm = 0)
{
    $sql = "SELECT * FROM sach WHERE 1";
    if ($kyw != "") {
        $sql .= " AND name_s LIKE '%" . $kyw . "%'";
    } else {
        $sql .= " AND id_dm LIKE '%" . $id_dm . "%'";
    }
    $listProduct = pdo_query($sql);
    return $listProduct;
}

function searchProduct($id_dm)
{
    if ($id_dm > 0) {
        $sql = "SELECT * FROM danhmuc WHERE id_dm = " . $id_dm;
        $cate = pdo_query_one($sql);
        extract($cate);
    } else {
        return "";
    }
}

function renderProductDetails($id_s)
{
    $sql = "SELECT * FROM sach WHERE id_s =" . $id_s;
    $productDetails = pdo_query_one($sql);
    return $productDetails;
}
?>