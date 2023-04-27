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
$user=$_SESSION['user_email'];
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
<title>LogIn</title>
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
<div class="col-sm-12" id="insert_post">
<center>
<form action="home.php?od=<?php echo $user_id;?>" method="post" id="f" enctype="multipart/form-data">
<textarea name="content" class="form-control" id="content" cols="30" rows="4" placeholder="What's in your mind?"></textarea><br>
<label class="btn btn-warning" id="upload_image_button">Select image
<input type="file" name="upload_image" size="30">
</label>
<button id="btn-post" class="btn btn-success" name="sub">POST</button>
</form>
<?php insertPost();
?>
</center>
</div>
</div>
<div class="row">
<div class="col-sm-12">
<center><h2><strong>Explore</strong></h2><br></center>
<?php echo get_posts();?>


</div>

</body>
</html>