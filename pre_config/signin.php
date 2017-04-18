<?php
include('../config/user_config.php');
$userName=$_POST['userName'];
$password=$_POST['password'];

if($userName){
    if($password){
        $user=new User();
        $user->loginUser($userName, $password);
    }else{
        echo "<li class='alert alert-danger'><span class='glyphicon glyphicon-alert'></span> The password field is required</li>";
    }
}else{
    echo "<li class='alert alert-danger'><span class='glyphicon glyphicon-alert'></span> The username field is required.</li>";
}
