<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
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
#signup{
    width:60%;
    border-radius:30px;
}
</style>


<body>
    <div class="row">
        <div class="col-sm-12">
            <div class="well">
                <center><h1 style="color:white;">Chat Whizz</h1></center>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="main-content">
                    <div class="header">
                        <h3 style="text-align=center;"><strong>Join Coding Cafe</strong></h3><hr>
                    </div>
                    <div class="1-part">
                        <form action="" method="post">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                                 <input type="text" class="form-control" placeholder="First Name" name="first_name" required="required">

                            </div><br>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                                 <input type="text" class="form-control" placeholder="Last Name" name="last_name" required="required">
                            </div><br>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                 <input id="password" type="password" class="form-control" placeholder="Password" name="u_pass" required="required">
                            </div><br>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                 <input id="email" type="Email" class="form-control" placeholder="Email ID" name="u_email" required="required">
                            </div><br>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-chevron-down"></i></span>
                                 
                                 <select class="form-control" name="u_country" required="required">
                                 <option disabled>Select Country</option>
                                 <option value="China">China</option>
                                 <option value="India">India</option>
                                 <option value="Italy">Italy</option>
                                 <option value="Sweden">Sweden</option>
                                 <option value="Switzerland">Switzerland</option>
                                 <option value="Nepal">Nepal</option>
                                 <option value="Netherlands">Netherlands</option>
                                 <option value="Oman">Oman</option>
                                 <option value="Pakistan">Pakistan</option>
                                 <option value="Peru">Peru</option>
                                 <option value="Philippines">Philippines</option>
                                 <option value="Singapore">Singapore</option>
                                 <option value="Spain">Spain</option>
                                 <option value="Sri Lanka">Sri Lanka</option>
                                 <option value="United Arab Emirates">United Arab Emirates</option>
                                 <option value="United Kingdom">United Kingdom</option>
                                  <option value="United States">United States</option> 
                                </select>
                            </div><br>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-chevron-down"></i></span>
                                 <select class="form-control input-md" name="u_gender" required="required">
                                 <option disabled>Select Gender</option>
                                 <option value="Male">Male</option>
                                 <option value="Female">Female</option>
                                 <option value="Others">Others</option>
                                 
                                </select>
                            </div><br>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                 <input type="date" class="form-control input-md" placeholder="Date Of Birth" name="u_birthday" required="required">
                            </div><br>
                            <a style="text-decoration:none;float:right;color=#187FA;"data-toggle="tooltip" title="SignIn" href="signin.php">Already have an account?</a>
                            <center><button id="signup" class="btn btn-info btn-lg" name="sign_up">SignUp</button></center>
                            <?php include("insert_user.php");?>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>
</html>