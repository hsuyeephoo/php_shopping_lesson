<?php
include ('../config/product_config.php');
$cat_name=$_POST['cat_name'];

if($cat_name){
        $cat=new Product();
        $cat->newCat($cat_name);
}else{
    echo "<li class='alert alert-danger'><span class='glyphicon glyphicon-alert'></span> The category name filed is required.</li>";
}