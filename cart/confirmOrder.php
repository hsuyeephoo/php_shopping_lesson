<?php
include ('../config/product_config.php');
$order_name=$_POST['order_name'];
$order_email=$_POST['order_email'];
$order_phone=$_POST['order_phone'];

if($order_name){
    if($order_email){
        if($order_phone){
            $od=new Product();
            $od->Ordered($order_name, $order_email, $order_phone);
        }else{
            echo "<li class='alert alert-danger'><span class='glyphicon glyphicon-alert'></span> The phone field is required.</li>";

        }
    }else{
        echo "<li class='alert alert-danger'><span class='glyphicon glyphicon-alert'></span> The email field is required.</li>";

    }
}else{
    echo "<li class='alert alert-danger'><span class='glyphicon glyphicon-alert'></span> The name field is required.</li>";

}