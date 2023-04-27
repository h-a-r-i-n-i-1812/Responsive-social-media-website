<!DOCTYPE html>
<?php
include("navigation.php");

/*if(!isset($_SESSION['user_email'])){
header("location:index.php");
}*/
?>
<html lang="en">
<head>
    <title>Edit Posts</title>
    <meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>LogIn</title>
<link rel="stylesheet"
href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.cs
s">
<script
src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script
src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js">
</script>
<link rel="stylesheet" type="text/css" href="style.css">
<style>
</style>
</head>

<body>
    <div class="row">
    <div class="col-sm-9">
    <div class="col-sm-10">
        <?php
        if(isset($_GET['post_id'])){
            $get_id=$_GET['post_id'];}
            $get_post="select *from posts where post_id='$get_id'";
            $run_post=mysqli_query($con,$get_post);
            while($row=mysqli_fetch_array($run_post)){
            $post_con=$row['post_content'];}
        
        ?>
        <form action="" method="post" id="f">
        <center><h2>Edit your Post:</h2><br>
        <textarea name="content" class="form-control" cols="100" rows="4"><?php echo $post_con;?></textarea><br>
        <input type="submit" name="update" value="Update Post" class="btn btn-info">
        </center>
        </form>
        <?php
         if(isset($_POST['update'])){
            $content=$_POST['content'];
            $update_post="update posts set post_content='$content' where post_id='$get_id'";
            $run_update=mysqli_query($con,$update_post);
            if($run_update){
                echo"<script>alert('Post Updated!!')</script>";
                echo"<script>window.open('home.php','_self')</script>";
            }
        
        }
        ?>
    </div>
    </div>
    <div class="col-sm-3">

    </div>
    </div>
</body>
</html>