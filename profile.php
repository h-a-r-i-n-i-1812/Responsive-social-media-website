

<!DOCTYPE html>
<?php
 include("navigation.php");
 
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">




</head>

<style>
   
    body{
 background-image: url('bg5.png');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
  font-size: medium;
  font-family:Geneva;
  }
    #cover-img{
        height:400px;
        width:1000px;


    }
    #profile-img{
        position:absolute;
        top:160px;
        left:40px;
    }
    #update_profile{
        position:relative;
        top:150px;
        cursor:pointer;
        left:93px;
        border-radius:4px;
        background-color:rgba(0,0,0,0,1);
        tranform:translate(-50%,-50%);




    }
    #button_profile{
        position:absolute;
        top:115%;
        left:50%;
        cursor:pointer;
        tranform:translate(-50%,-50%);
    }
    #own_posts{
        border:5px solid #e6e6e6;
        padding:40px 50px;


    }
    #post_img{
        height:300px;
        width:100%;
    }
    </style>
<body>
<div class="row">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-8">
            <?php
            echo"
            <div>
            <div><img src='$user_cover' id='cover-img' class='img-rounded'   > </div>
             <form action='profile.php?u_id=$user_id' method='post' enctype='multipart/form-data'>
             <ul class='nav pull-left' style='position:absolute;top:10px;left:40px'>




             <li class='dropdown'>
             <button class='dropdown-toggle btn btn-default' data-toggle='dropdown'>Change cover</button>
             <div class='dropdown-menu'>
             <center>
             <p>click<strong>Select cover</strong>and then click<br><strong>update cover</strong></p>
             <label class='btn btn-info'>select cover
             <input type='file' name='u_cover' size='60' />
             </label><br><br>
             <button name='submit' class='btn btn-info'>update cover</button>
             </center>
             </div>
             </li>




             </ul>
             </form>
            </div>
            <div id='profile-img'>
            <img src='profile.png' alt='profile' class='img-circle' width='180px'  height='185px'>
            <form action='profile.php?u_id=$user_id' method='post' enctype='multipart/form-data'>
            <label id='update_profile' style='color:black'>select profile
            <input type='file' name='u_image' size='60' />
            </label><br><br>
            <button id='button_profile' name='update' class='btn btn-info'>update profile</button>
            </form>
            <div><br>
            ";
?>
<?php
if(isset($_POST['submit'])){
    $u_cover=$_FILES['u_cover']['name'];
    $image_tmp=$_FILES['u_cover']['tmp_name'];
    $random_number=rand(1,100);
    if($u_cover=='')
    {
        echo "<script>alert('please select cover image')</script>";
        echo "<script>window.open('profile.php?u_id=$user_id','_self')</script>";
        exit();
    }
    else{
        move_uploaded_file($image_tmp,"$u_cover.$random_number");
        $update="update users set user_cover='$u_cover.$random_number' where user_id='$user_id'";
        $run=mysqli_query($con,$update);
        if($run)
        {
            echo "<script>alert('your cover updated')</script>";
        echo "<script>window.open('profile.php?u_id=$user_id','_self')</script>";
        }
    }
}
if(isset($_POST['update'])){
    $u_cover=$_FILES['u_image']['name'];
    $image_tmp=$_FILES['u_image']['tmp_name'];
    $random_number=rand(1,100);
    if($u_cover=='')
    {
        echo "<script>alert('please select profile image by clicking the profile image')</script>";
        echo "<script>window.open('profile.php?u_id=$user_id','_self')</script>";
        exit();
    }
    else{
        move_uploaded_file($image_tmp,"$u_cover.$random_number");
        $update="update users set user_image='$u_cover.$random_number' where user_id='$user_id'";
        $run=mysqli_query($con,$update);
        if($run)
        {
            echo "<script>alert('Your profile updated')</script>";
        echo "<script>window.open('profile.php?u_id=$user_id','_self')</script>";
        }
    }
}
?>
<div class="col-sm-2">

</div>
</div>




<div class="row">
<div class="col-sm-8">
</div>
<div class="col-sm-3" style="background-color:#e6e6e6;text-align:center;left:0.7%;border-radius: 5px;">
<?php
echo"
<center><h2><strong>About</strong></h2></center>
<center><h4><strong>$first_name $last_name</strong></h4></center>
<p><strong><i style='color:grey;'>$describe_user</i></strong></p><br>
<p><strong>Relationship Status:</strong>$Relationship_status</p><br>
<p><strong>Lives in:</strong>$user_country</p><br>
<p><strong>Member since:</strong>$register_date</p><br>
<p><strong>Gender:</strong>$user_gender</p><br>
<p><strong>Birthday:</strong>$user_birthday</p><br>
";
?>
</div>
<div class="col-sm-9">
<!--display user post-->
<?php
global $con;
$u_id=1;
if(isset($_GET['u_id'])){
    $u_id=$_GET['u_id'];
}


//$get_post="select * from posts where user_id='$u_id' ORDER by 1 DESC LIMIT 5";
$get_post="select * from posts where user_id=1";
$run_post=mysqli_query($con,$get_post);
while($row_post=mysqli_fetch_array($run_post)){
    $post_id=$row_post['post_id'];
    $user_id=$row_post['user_id'];
    $content=$row_post['post_content'];
    $upload_image=$row_post['upload_image'];
    $post_date=$row_post['post_date'];
   
    $user="select * from users where user_id='$user_id'and post='yes'";
    $run_user=mysqli_query($con,$user);
    while($row_user=mysqli_fetch_array($run_user)){
    $user_name =$row_user['user_name'];
    $user_image=$row_user['user_image'];
    }


    if($content=="No" && strlen($upload_image)>=1){
        echo"
        <div id='own_posts'>
        <div class='row'>
        <div class='col-sm-2'>
             <p><img src='$user_image' class='img-circle' width='85px' height='85px'></p>


        </div>
        <div class='col-sm-9'>
        <h3><a stle='text-decoration:none;cursor:pointer;color:#3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
        <h4 small style='color:black;'>Updated post on<strong>$post_date</strong></small></h4>
        </div>
        <div class='col-sm-4'>
       </div>
        </div>
        <div class='row'>
        <div class='col-sm-12'>
        <img id='posts-img' src='$upload_image' style='height:350px;'>
        </div>
        </div><br>
        <a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-success'>View</button></a>
        <a href='delete_post.php?post_id=$post_id' style='float:right;'><button class='btn btn-danger'>Delete</button></a>
        </div><br><br>
        ";
    }
    elseif(strlen($content)>=1 && strlen($upload_image)>=1){
        echo"
        <div id='own_posts'>
        <div class='row'>
        <div class='col-sm-2'>
        <img src='$user_image' class='img-circle' width='85px' height='85px'>


        </div>
        <div class='col-sm-9'>
        <h3><a style='text-decoration:none;cursor:pointer;color:#3897f0' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
        <h4><small style='color:black;'>Updated post on <strong>$post_date</strong></small></h4>
        </div>
        <div class='col-sm-4'>
       </div>
        </div>
        <div class='row'>
        <div class='col-sm-12'>
        <p>$content</p>
        <img id='posts-img' src='$upload_image'  style='height:350px'>
        </div>
        </div>
        <a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-success'>View</button></a>        
        <a href='functions/delete_post.php?post_id=$post_id' style='float:right;'><button class='btn btn-danger'>Delete</button></a><br>
        </div><br><br>
        ";
    }
    else{
        echo"
        <div id='own_posts'>
        <div class='row'>
        <div class='col-sm-2'>
             <p><img src='$user_image' class='img-circle' width='85px' height='85px'></p>


        </div>
        <div class='col-sm-9'>
        <h3><a stle='text-decoration:none;cursor:pointer;color:#3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
        <h4 small style='color:black;'>Updated post on<strong>$post_date</strong></small></h4>
        </div>
        <div class='col-sm-4'>
       </div>
        </div>
        <div class='row'>
        <div class='col-sm-2'>
        </div>
        <div class='col-sm-6'>
            <h3><p>$content</p></h3>
        </div>
        <div class='col-sm-4'>
        </div>
        </div><br><br>
        <a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-success'>View</button></a>
        <a href='edit_post.php?post_id=$post_id' style='float:right;'><button class='btn btn-success'>Edit</button></a>
        <a href='delete_post.php?post_id=$post_id' style='float:right;'><button class='btn btn-danger'>Delete</button></a>
        </div><br><br>
       
        ";


        global $con;
        if(isset($_GET['u_id'])){
            $u_id=$_GET['u_id'];
        }
       
        $get_posts="select user_email from users where user_id='$u_id'";
        $run_user=mysqli_query($con,$get_posts);
        $row=mysqli_fetch_array($run_user);
        $user_email=$row['user_email'];
        $user=$_SESSION['user_email'];
        $get_user="select * from users where user_email='$user'";
        $run_user=mysqli_query($con,$get_user);
        while($row=mysqli_fetch_array($run_user)){
        $user_id=$row['user_id'];
        $u_email=$row['user_email'];}
        if($u_email !=$user_email){
            echo"<script>window.open('profile.php?u_id=$user_id','_self')</script>";
        }
       
    }
   
}


?>
</div>
<div class="col-sm-2">
</div>
</div>
</div>
</body>
</html>

