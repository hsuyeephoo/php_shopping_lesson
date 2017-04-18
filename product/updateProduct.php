<?php
include ('../config/product_config.php');

$p_id=$_POST['p_id'];
$p_cover_name=$_FILES['p_cover']['name'];
$p_cover_tmp=$_FILES['p_cover']['tmp_name'];
$p_price=$_POST['p_price'];


if($p_id) {
    $p = new Product();
    $p->productUpdate($p_id, $p_cover_name, $p_cover_tmp, $p_price);
}else{
    header("location: /dashboard");
}