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
<title>Find People</title>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>LogIn</title>
<link rel="stylesheet"
href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js">
</script>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<style>
</style>
<body>
<div class="row">
    <div class="col-sm-12">
        <center>
            <h2>Find People</h2>
        </center><br><br>
        <div class="row">
        <div class="col-sm-4">        

        </div>
        <div class="col-sm-4">
            
         <form action="" class="search_form" method="get">
            <input type="text" placeholder="Search Friend" name="search_user">
            <button class="btn btn_info" type="submit" name="search_user_btn">Search</button>

         </form>
        </div>
        <div class="col-sm-4"></div>
    
        </div>
    </div><br><br>
    <?php
    search_user();
    ?>
</div>
</body>
</html>