<?php
include("connection.php");
//include("functions.php");
?>
<style>
nav{
  background-image: url('hbg5.png');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}
</style>
<nav class="navbar navbar-default">
<div class="container-fluid">
<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed"
data-target="#bs-example-navbar-collapse-1" data-toggle="collapse"
aria-expaned="false">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a href="home.php" class="navbar-brand">Coding Cafe</a>
</div>
<div class="collapse navbar-collapse" id="#bs-example-navbar-collapse-1">
<ul class="nav navbar-nav">
<?php
session_start();
$user=$_SESSION['user_email'];
$get_user="select * from users where user_email='$user'";
$run_user=mysqli_query($con,$get_user);
$row=mysqli_fetch_array($run_user);
$user_id=$row['user_id'];
$user_name=$row['user_name'];
$first_name=$row['f_name'];
$last_name=$row['l_name'];
$describe_user=$row['describe_user'];
$Relationship_status=$row['Relationship'];
$user_pass=$row['user_pass'];
$user_email=$row['user_email'];
$user_country=$row['user_country'];
$user_gender=$row['user_gender'];
$user_birthday=$row['user_birthday'];
$user_image=$row['user_image'];
$user_cover=$row['user_cover'];
$recovery_account=$row['recovery'];
$register_date=$row['user_reg_date'];
echo " <img src='chat.png' width='50' height='50' ".$row['user_cover']."' >";
$user_posts="select * from posts where user_id='$user_id'";
$run_posts=mysqli_query($con,$user_posts);
$posts=mysqli_num_rows($run_posts);
?>
<li>
<a href='profile.php'><?php echo"$first_name";?></a>
</li>
<li><a href='home.php'>Home</a></li>
<li><a href='members.php'>Find People</a></li>
<li><a href='messages.php?u_id=new'>Messages</a></li>
<?php
echo "
<li class='dropdown'>
<a href='#' class='dropdown-toggle'
data-toggle='dropdown' role='button' aria-haspopup='true' aria-expaned='false'>
<span> <i class='glyphicon glyphicon-chevron-down'></i></span></a>
<ul class='dropdown-menu'>
<li>
<a href='my_post.php?u_id=$user_id'>My Posts <span class='badge badge-seconday'>$posts</span></a>
</li>
<li>
<a href='edit_profile.php?u_id=$user_id'>Edit Profile</a>
</li>
<li role='seperator' class='divider'></li>
<li>
<a href='logout.php'>Logout</a>
</li>
</ul>
</li>
";
?>
</ul>
<ul class="nav navbar-nav navbar-right">
<li class="dropdown">
<form class="nav navbar-nav navbar-left" method="get" action="results.php">
<div class="form-group">
<input type="text" name="user_query"
placeholder="Search">
</div>
<button type="submit" class="btn btn-info"
name="search">Search</button>
</form>
</li>
</ul>
</div>
</div>
</nav>
