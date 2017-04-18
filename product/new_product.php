<?php
include ('../config/product_config.php');
$cat_id=$_POST['cat_id'];
$p_name=$_POST['p_name'];
$p_detail=$_POST['p_detail'];
$p_price=$_POST['p_price'];

if(!$cat_id){
    echo "<li class='alert alert-danger'><span class='glyphicon glyphicon-alert'></span> The category field is selected required.</li>";
}else{
if($p_name){
    if($p_detail){
        if($p_price){
            $p=new Product();
            $p->newProduct($cat_id,$p_name, $p_detail, $p_price);

        }else{
            echo "<li class='alert alert-danger'><span class='glyphicon glyphicon-alert'></span> The price field is required.</li>";

        }

    }else{
        echo "<li class='alert alert-danger'><span class='glyphicon glyphicon-alert'></span> The product description field is required.</li>";

    }
}else{
    echo "<li class='alert alert-danger'><span class='glyphicon glyphicon-alert'></span> The product name field is required.</li>";
}
}