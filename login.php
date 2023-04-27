<?php
session_start();
include ("connection.php");
if(isset($_POST['login'])){
    $email=htmlentities(mysqli_real_escape_string($con,$_POST['email']));
    $pass=htmlentities(mysqli_real_escape_string($con,$_POST['pass']));
    $select_user="select * from  users where user_email='$email' and user_pass='$pass' and status='verified'";
  
    $query=mysqli_query($con,$select_user);
    $check_user= mysqli_fetch_array($query);

    if($check_user)
    {
        $_SESSION['user_email']=$email;
        echo "<script>window.open('home.php','_self')</script>";
            }
    else{
        echo "<script>alert('Login incorrect')</script>"; 
    }
}
?>