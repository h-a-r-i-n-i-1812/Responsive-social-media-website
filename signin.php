<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogIn</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style>
    body{
    overflow-x: hidden;
}
.main-content{
    width:50%;
    height: 40%;
    margin: 10px auto;
    background-color:#fff;
    border:2px solid #e6e6e6;
    padding: 40px 50px;
}
.header{
    border:0px solid #000;
    margin-botton:5px;
}
.well{
    background-color:#187FAB;
}
#signin{
    width:60%;
    border-radius:30px;
}

.overlap-text{
position:relative;
}

.overlap-text a{
position:absolute;
top:8px;
right:8px;
font-size:18px;
text-decoration: none;
font-family: 'Overpass Mono',monospace;
letter-spacing: -1px;
}
</style>
<body>
<div class="row">
        <div class="col-sm-12">
            <div class="well">
                <center><h1 style="color:white;">Chat Whizz</h1></center>
            </div>
        </div>
</div>
        <div class="row">
            <div class="col-sm-12">
                <div class="main-content">
                    <div class="header">
                        <h3 style="text-align=center;"><strong>Login Coding Cafe</strong></h3><hr>
                    </div>
                    <div class="l-part">
                        <form action="" method="post">
                                 <input type="email" class="form-control input-md" placeholder="Email" name="email" required="required"><br>
                                 <div class="overlap-text">
                                    <input type="password" name="pass" placeholder="Password" class="form-control input-md" required="required"><br>
                                    <a style="text-decoration:none;float:right;color:#187FAB;" data-toggle="tooltip" title="Reset password" href="forgot_password.php">Forgot?</a>
                                 </div>
                            <a style="text-decoration:none;float:right;color=#187FA;"data-toggle="tooltip" title="SignUp" href="signup.php">Create a new Account account?</a><br><br>
                            <center><button id="signin" class="btn btn-info btn-lg" name="login">Log In</button></center>
                            <?php include("login.php");?>
                        </form>
                    </div>
                </div>
        </div>
</div>
</body>
</html>