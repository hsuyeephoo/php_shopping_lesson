<?php
include ('../config/user_config.php');

$userName=$_POST['userName'];
$email=$_POST['email'];
$password=$_POST['password'];
$passwordConfirm=$_POST['passwordConfirm'];


if($userName){
    if($email){
        if($password){
            if($passwordConfirm){
                if($password==$passwordConfirm){
                        $user=new User();
                        $user->regUser($userName, $email, $password);
                }else{
                    echo "<li class='alert alert-danger'><span class='glyphicon glyphicon-alert'></span> The password and password again field is required.</li>";

                }
            }else{
                echo "<li class='alert alert-danger'><span class='glyphicon glyphicon-alert'></span> The password again field is required.</li>";

            }
        }else{
            echo "<li class='alert alert-danger'><span class='glyphicon glyphicon-alert'></span> The password field is required.</li>";

        }
    }else{
        echo "<li class='alert alert-danger'><span class='glyphicon glyphicon-alert'></span> The email field is required.</li>";

    }
}else{
    echo "<li class='alert alert-danger'><span class='glyphicon glyphicon-alert'></span> The username field is required.</li>";
}