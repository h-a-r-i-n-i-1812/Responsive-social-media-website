<?php

include("navigation.php");
$con=mysqli_connect("localhost","root","Sh181203#","info_db");

if(!isset($_SESSION['user_email']))
{
    header("location:index.php");
}
?>
<html>
    <head>
        <title>view post</title>
        <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<style>
    #own_posts{
        border:5px  solid #e6e6e6;
        padding: 40px 50px;
        width:90%
    }
    #posts_img
    {
        height:300px;
        width:100px;
    }
    </style>
<body>
    <div class="row">
<?php
   // $u_id=0;
if(isset($_GET['u_id'])){
    $u_id=$_GET['u_id'];
    //$u_id=0;
    }
    if($u_id < 0 ||$u_id=="" )
    {
        echo"<script>window.open('home.php','_self')</script>";

    }
    else{
?>
<div class="col-sm-12">
    <?php
   if(isset($_GET['u_id'])){
    global $con;
   $user_id=$_GET['u_id'];

    $select="select * from  users where user_id='$user_id'";
    $run=mysqli_query($con,$select);
    $row=mysqli_fetch_array($run);
    //$name=mysqli_fetch_array($run);
   }
    ?>
      <?php
      if(isset($_GET['u_id'])){
        global $con;
        $user_id=$_GET['u_id'];
        $select="select * from users where user_id='$user_id'";
        $run=mysqli_query($con,$select);
        $row=mysqli_fetch_array($run);
        $id=$row['user_id'];
        $image=$row['user_image'];
        $name=$row['user_name'];
        $f_name=$row['f_name'];
        $l_name=$row['l_name'];
        $describe_user=$row['describe_user'];
        $country=$row['user_country'];
        $gender=$row['user_gender'];
        $register_date=$row['user_reg_date'];
       
        echo"
        <div class='row'>
        <div class='col-sm-10'>
        </div>
        <center>
        <div style='background-color:#e6e6e6;' class='col-sm-3'>
        <h2>information about</h2>
        <img class='img-circle' src='$image' width='150' height='150'><br><br>
        <ul class='list-group'>
        <li class='list-group-item' title='Username'><strong>$f_name $l_name</strong></li>
        <li class='list-group-item' title='User status'><strong style='color:grey;'> $describe_user</strong></li>
        <li class='list-group-item' title='Gender'><strong>$gender</strong></li>
        <li class='list-group-item' title='Country'><strong>$country</strong></li>
        <li class='list-group-item' title='User Registration Date'><strong>   $register_date</strong></li>
        </ul>
                ";

                //$user=$_SESSION['user_email'];
                $user=$row['user_email'];
                $get_user="select * from users where user_email='$user'";
                $run_user=mysqli_query($con,$get_user);
                $row=mysqli_fetch_array($run_user);
                $userown_id=$row['user_id'];
                if($user_id== $userown_id){
                    echo "<a href='edit_profile.php?u_id=$userown_id' class='btn btn-success'/>Edit profile</a><br><br><br>";
                }

                echo "
                </div>
                </center>
                ";

      }
       ?>
       <div class="col-sm-8">
             <center><h1><strong><?php echo "$f_name $l_name"; ?></strong><br>posts</h1></center></div>
        <?php
        global $con;
        if(isset($_GET['u_id'])){
            $u_id=$_GET['u_id'];
        }
        $get_posts="select * from posts where user_id='$u_id'  limit 5";
        $run_posts=mysqli_query($con,$get_posts);
        while($row_posts=mysqli_fetch_array($run_posts))
        {
            $post_id=$row_posts['post_id'];
            $user_id=$row_posts['user_id'];
            $content=$row_posts['post_content'];
            $upload_image=$row_posts['upload_image'];
            $post_date=$row_posts['post_date'];
            $user="select * from users where user_id='$user_id' and posts='yes'";
            $run_user=mysqli_query($con,$user);
            $row_user=mysqli_fetch_array($run_user);
            $user_image=$row['user_image'];
        $user_name=$row['user_name'];
        $f_name=$row['f_name'];
        $l_name=$row['l_name'];
        
        if($content=='No' && strlen($upload_image)>=1)
        {
            echo"
            <div id='own-posts'>
            <div class='row'>
            <div class='col-sm-2'>
            <p><img src='$user_image' class='img-circle' width='100px' height='100px'></p>
            </div>
            <div class='col-sm-6'>
            <h3><a style='text-decoration:none;cursor:pointer;color:#3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
            <h4><small style='color:black;'>updated a post on<strong>$post_date</strong></small></h4>
            </div>
            <div class='col-sm-4'>
            </div>
            </div>
            <div class='row'>
            <div class='col-sm-12'>
            <img id='posts-img' src='uploaded image' style='height:350px'>
            </div>

            </div><br>
            </div><br>
        <a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-success'>View</button></a><br>
        <a href='delete_post.php?post_id=$post_id' style='float:right;'><button class='btn btn-danger'>Delete</button></a>

            </div><br/><br/>
            ";
        }
        elseif (strlen($content)>=1 && strlen($upload_image)) {
            echo"
            
            <div id='posts' class='col-sm-6'>
            <div class='row'>
            <div class='col-sm-2'>
            <p><img src='$user_image' class='img_circle' width='100px' height='100px'></p>
            </div>
            <div class='col-sm-6'>
            <h3><a style='text-decoration:none;cursor:pointer;color:#3897f0' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
            <h4><small style='color:black;'>updated a post on<strong>$post_date</strong></small></h4>
            </div>
            <div class='col-sm-4'>
            </div>
            </div>
            <div class='row'>
            <div class='col-sm- 12'>
            <p>$content</p>
            <img id='posts-img' src='$upload_image'  style='height:350px'>
            </div>
            </div><br>
            <a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>comment</button></a><br>
            </div>
            
            </div><br><br>
        
            ";
        }
        else{
            echo"
            <div id='own_posts'>
            <div class='row'>
       
            <div class='col-sm-2'>
                 <p><img src='$user_image' class='img=circle' width='100px' height='100px'></p>
    
    
            </div>
            <div class='col-sm-6'>
            <h3><a stle='text-decoration:none;cursor:pointer;color:#3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
            <h4 small style='color:black;'>Updated post on<strong>$post_date</strong></small></h4>
            </div>
            <div class='col-sm-4'>
           </div>
            </div>
            <div class='row'>
            <div class='col-sm-6'>
                <h3><p>$content</p></h3>
            </div>
            </div><br>
            <a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-success'>View</button></a><br>
            <a href='functions/delete_post.php?post_id=$post_id' style='float:right;'><button class='btn btn-danger'>Delete</button></a><br>
            </div><br>
        <a href='single.php?post_id='$post_id' style='float:right'>
        <button btn btn-info>comment</button></a></br>
            </div><br><br>
           
            ";
        }
        }

        ?>
</div>
</div>
<?php } ?>
</body>
</html>