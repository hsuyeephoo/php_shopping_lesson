<?php

class User{
    public function __construct()
    {
        session_start();
        try{
            $this->db=new PDO('mysql:host=localhost;dbname=bookings', 'root', 'root');
        }catch (PDOException $e){
            $e->errorInfo();
        }
    }
    public function loginUser($userName, $password){
        $pre_result=$this->db->query("SELECT userName, password from users where userName='$userName'");
        $result=$pre_result->fetch(PDO::FETCH_ASSOC);
        $dbUser=$result['userName'];
        $dbPassword=$result['password'];
        $h_password=md5($password);
        if($userName==$dbUser){
            if($h_password==$dbPassword){
                $_SESSION['login']=true;
                $_SESSION['userName']=$userName;
                echo "<li class='alert alert-success'><span class='glyphicon glyphicon-ok-circle'></span> Authorized Success.</li>";

            }else{
                echo "<li class='alert alert-danger'><span class='glyphicon glyphicon-alert'></span> The selected password is invalid.</li>";

            }
        }else{
            echo "<li class='alert alert-danger'><span class='glyphicon glyphicon-alert'></span> The username was not found.</li>";
        }

    }
    public function regUser($userName, $email, $password){
        $pre_result=$this->db->query("SELECT userName from users where userName='$userName'");
        $row=$pre_result->fetch(PDO::FETCH_ASSOC);
        $dbUser=$row['userName'];
        if($dbUser!=$userName){
            $pre_mail=$this->db->query("SELECT email from users where email='$email'");
            $row_mail=$pre_mail->fetch(PDO::FETCH_ASSOC);
            $dbEmail=$row_mail['email'];
            if($dbEmail!=$email){
                $h_password=md5($password);
                $sql="INSERT INTO users (userName, email, password, created_at)values('$userName', '$email', '$h_password', now())";
                $result=$this->db->query($sql);
                if($result){
                    echo "<li class='alert alert-success'><span class='glyphicon glyphicon-ok-circle'></span> Your account have been successfully created.</li>";

                }

            }else{
                echo "<li class='alert alert-danger'><span class='glyphicon glyphicon-alert'></span>The selected email is already in use.</li>";

            }

        }else{
            echo "<li class='alert alert-danger'><span class='glyphicon glyphicon-alert'></span>The selected username is already in use.</li>";

        }





    }
}