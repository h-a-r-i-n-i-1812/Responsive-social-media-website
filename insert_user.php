<?php
include("connection.php");
if(isset($_POST['sign_up'])){
    $first_name=htmlentities(mysqli_real_escape_string($con,$_POST['first_name']));
    $last_name=htmlentities(mysqli_real_escape_string($con,$_POST['last_name']));
    $pass=htmlentities(mysqli_real_escape_string($con,$_POST['u_pass']));
    $email=htmlentities(mysqli_real_escape_string($con,$_POST['u_email']));
    $country=htmlentities(mysqli_real_escape_string($con,$_POST['u_country']));
    $gender=htmlentities(mysqli_real_escape_string($con,$_POST['u_gender']));
    $birthday=htmlentities(mysqli_real_escape_string($con,$_POST['u_birthday']));
    $status="verified";
    $posts="no";
    $newgid=sprintf('%05d',rand(0,999999));
    $username =strtolower($first_name."_" . $last_name."_" .$newgid);
    $check_username_query="select user_name from users where user_email='$email'";
    $run_username=mysqli_query($con,  $check_username_query);
    if(strlen($pass) <9)
    {
        echo "<script>alert('Password should be atleast 9 characters!')</script>";
        exit();
    }
    $check_email="select * from users where user_email='$email'";
    $run_email=mysqli_query($con,$check_email);
    
    $check=mysqli_num_rows($run_email);
    if($check == 1)
    {
        echo "<script>alert('Email already exist, Please try using another email')</script>";
        echo "<script>window.open('signup.php','_self')</script>";
        exit();
    }
    $rand = rand(1,3); //Random number between 1 and 3
    if($rand == 1)
    {
        $profile_pic = "default.png";
    }
    else if($rand == 2)
    {
        $profile_pic = "default.png";
    }
    else if($rand == 3)
    {
        $profile_pic = "default.png";
    }
    $insert="insert into users (f_name,l_name,user_name,describe_user,Relationship,user_pass,user_email,user_country,user_gender,user_birthday
    ,user_image,user_cover,user_reg_date,status,posts,recovery) values('$first_name','$last_name','$username','Hello','...','$pass','$email','$country','$gender','$birthday',
    '$profile_pic','  ',NOW(),'$status','$posts','Life is Beautiful')";

      $query=mysqli_query($con,$insert);
    if($query)
    {
        echo "<script>alert('welcome $first_name')</script>";
        echo "<script>window.open('signup.php','_self')</script>";
    }
    else
    {
        echo "<script>alert('Incorrect Details')</script>";
    }
  $i++;
}
?>
