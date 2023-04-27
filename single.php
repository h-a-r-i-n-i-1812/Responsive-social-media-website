<?php
include("navigation.php");
include("functions.php");
$user_email="harini@gmail.com";
/*if(!isset($_SESSION['user_email']))
{
    header("loacation:index.php");
}*/
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
<body>
    <div class="row">
        <div class="col-sm-12">
            <center> <h2>comments</h2><br></center>
            <?php single_post(); ?>
</div>
</div>
</body>
</html>

