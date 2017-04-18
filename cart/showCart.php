<?php
session_start();
$cart=$_SESSION['cart'];
    $totalCart=0;
foreach ($cart as $key=>$val){
    $totalCart +=$val;
}
echo "($totalCart) items in our Cart";