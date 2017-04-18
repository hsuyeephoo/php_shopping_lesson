<?php
include ('../config/product_config.php');
$delId=$_POST['delProduct'];
if($delId){
        foreach ($delId as $key=>$id){
            $p=new Product();
            $p->delProduct($id);
        }
}else{
    header("location: /dashboard");
}