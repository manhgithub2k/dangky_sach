<?php 
function renderCategory() {
    $sql = "SELECT * FROM danhmuc order by id_dm desc";
    $category = pdo_query($sql);
    return $category;
}

?>