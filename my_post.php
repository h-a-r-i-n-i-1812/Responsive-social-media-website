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
<title>
My posts
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
<div class="col-sm-12">
<center> <h2>Your latest posts</h2></center>
<?php user_posts(); ?>
</div>
</div>
</body>
</html>
