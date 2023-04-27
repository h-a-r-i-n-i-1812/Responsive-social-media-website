<?php
$con=mysqli_connect("localhost","root","Sh181203#","info_db");
if(isset($_GET['post_id'])){
    $post_id=$_GET['post_id'];
}
$delete_post="delete from posts where post_id='$post_id'";
$run_delete=mysqli_query($con,$delete_post);
if($run_delete){
    echo"<script>alert('Post Deleted!!')</script>";
    echo"<script>windows.open('./home.php','_self')</script>";
    header("location:home.php");
}