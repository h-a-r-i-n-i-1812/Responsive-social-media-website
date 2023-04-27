<!DOCTYPE html>
<?php
include("navigation.php");
include("functions.php");
/*
if(!isset($_SESSION['user_email'])){
header("location:index.php");
}
*/
?>
<html>
<head>
<?php
// $user=$_SESSION['user_email'];
$user="harini@gmail.com";
$get_user="select * from users where user_email='$user' ";
$run_user=mysqli_query($con,$get_user);
$row=mysqli_fetch_array($run_user);
$user_name=$row['user_name'];
?>
<title>
<?php echo "$user_name";?>
</title>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>edit profile</title>
<link rel="stylesheet"
href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.cs
s">
<script
src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></s
cript>
<script
src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js">
</script>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<style>
</style>
<body>
<div class="row">
<div class="col-sm-2">
</div>
<div class="col-sm-8">
<form action="" method="post" enctype="multipart/form-data">
<table class="table table-bordered table=hover">
<tr align="center">
<td colspan="6" class="active"><h2>Edit your profile</h2></td>
</tr>
<tr>
<td style="font-weight:bold;" >change your firstname</td>
<td><input class="form-control" type="text" name="f_name" required value="<?php echo $first_name;?>">
</td>
</tr>
<tr>
<td style="font-weight:bold;" >change your lastname</td>
<td><input class="form-control" type="text" name="l_name" required value="<?php echo $last_name;?>">
</td>
</tr>
<tr>
<td style="font-weight:bold;" >change your username</td>
<td><input class="form-control" type="text" name="u_name" required value="<?php echo $user_name;?>">
</td>
</tr>
<tr>
<td style="font-weight:bold;" >description</td>
<td><input class="form-control" type="text" name="describe_user" required value="<?php echo $describe_user;?>">
</td>
</tr>
<tr>
<td style="font-weight:bold;" > password</td>
<td><input class="form-control" type="password" name="u_pass" id="mypass" required value="<?php echo $user_pass;?>">
<input type="checkbox" onclick="show_password()"><strong>show password</strong>
</td>
</tr>
<tr>
<td style="font-weight:bold;" >Email</td>
<td><input class="form-control" type="email" name="u_email" required value="<?php echo $user_email;?>">
</td>
</tr>
<tr>
<td style="font-weight:bold;" >country</td>
<td>
<select class="form-control" name="u_country" >
<option><?php echo $user_country;?></option>
                             
                                 <option value="China">China</option>
                                 <option value="India">India</option>
                                 <option value="Italy">Italy</option>
                                 <option value="Sweden">Sweden</option>
                                 <option value="Switzerland">Switzerland</option>
                                 <option value="Nepal">Nepal</option>
                                 <option value="Netherlands">Netherlands</option>
                                 <option value="Oman">Oman</option>
                                 <option value="Pakistan">Pakistan</option>
                                 <option value="Peru">Peru</option>
                                 <option value="Philippines">Philippines</option>
                                 <option value="Singapore">Singapore</option>
                                 <option value="Spain">Spain</option>
                                 <option value="Sri Lanka">Sri Lanka</option>
                                 <option value="United Arab Emirates">United Arab Emirates</option>
                                 <option value="United Kingdom">United Kingdom</option>
                                  <option value="United States">United States</option>
                                </select>
</td>
</tr>


<tr>
<td style="font-weight:bold;" >gender</td>
<td>
<select class="form-control" name="u_gender" >
<option><?php echo $user_gender;?></option>
                                 <option >Female</option>
                                 <option >Male</option>
                                 <option >other</option>
           
                                </select>
</td>
</tr>


<tr>
<td style="font-weight:bold;" >Birthday</td>
<td><input class="form-control input-md" type="date" name="u_birthday" required value="<?php echo $user_birthday;?>">
</td>
</tr>
<tr>


<tr align="center">
<td colspan="6"><input type="submit" name="update" style="width:250px" value="Update"></td>
</tr>
</table>
<div class="col-sm-4">
</div>
</div>
</body>
</html>


<?php
if(isset($_POST['update'])){
    $f_name=htmlentities($_POST['f_name']);
    $l_name=htmlentities($_POST['l_name']);
    $u_name=htmlentities($_POST['u_name']);
    $describe_user=htmlentities($_POST['describe_user']);
    $u_pass=htmlentities($_POST['u_pass']);
    $u_email=htmlentities($_POST['u_email']);
    $u_country=htmlentities($_POST['u_country']);
    $u_gender=htmlentities($_POST['u_gender']);
    $u_birthday=htmlentities($_POST['u_birthday']);


    $update="update users set f_name='$f_name' ,l_name='$l_name', user_name='$u_name' ,describe_user='$describe_user', user_pass='$u_pass',
    user_email='$u_email',user_country='$u_country',user_gender='$u_gender',user_birthday='$u_birthday' where user_id='$user_id'";


    $run=mysqli_query($con,$update);
    if($run){
        echo"<script>alert('Your profile updated')</script>";
        echo"<script>window.open('edit_profile.php?u_id=$user_id','_self')</script>";
    }
}
?>
