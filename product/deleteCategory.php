<?php
include ('../config/product_config.php');
$catId=$_POST['delCat'];
if($catId){
    foreach ($catId as $key=>$id){
        $cat=new Product();
        $cat->deleteCategory($id);
    }
}else{
    header("location: /categories");
}