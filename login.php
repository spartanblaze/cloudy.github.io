<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['login']))
{
 $emailcon=$_POST['emailcont'];
$password=md5($_POST['password']);
$query=mysqli_query($con,"select ID from tbluser where  (Email='$emailcon' || MobileNumber='$emailcon') && Password='$password' ");
$ret=mysqli_fetch_array($query);
if($ret>0){
$_SESSION['uid']=$ret['ID'];
echo "<script type='text/javascript'> document.location ='welcome.php'; </script>";
  }else{
 echo "<script>alert('Invalid Details');</script>";
 }}
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login form</title>
    <link rel="stylesheet" href="signup.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
     integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous"/>
    
</head>
<body>
    <div class="container">
    <div class="forms-container">
    <div class="signin-signup">
    <form action="" method="post" class="sign-in-form">
        <h2 class="title">Log in</h2>
        
<div class="input-field">
<i class="fas fa-user"></i>
<input type="text" required="true" name="emailcont" placeholder="Registered email or Mobile no" /> 
</div>

<div class="input-field">
    <i class="fas fa-lock"></i>
    <input type="password" required="true" name="password" placeholder="Password" /> 
    </div>
<input type="submit" name="login" class="btn solid" value="login"/>
<span>Don't have an account? <a style="color:#5bc0de;" href="index.php">Register Here</a></span>
    </form>

</div>
</div>


    <div class="panels-container">
        <div class="panel left-panel">
            <div class="content">
                <h3>Cloud Forecast</h3>
                <p>
                One Stop, for you to find Current Weather as well as Future Predictions. Providing Accurate Predictions and Past Weather Dataset which is used for Data Analytics.
                </p>
            
            </div>
            <img src="/log.svg" alt="" class="image" />
        </div>

        <div class="panel right-panel">
            <div class="content">
                <h3>one of us</h3>
                <p>

                </p>
                <button class="btn transparent" id="sign-in-button" style="color:#5bc0de;">Log in</button>
            </div>
            <img src="undraw_Login_re_4vu2.png" alt="" class="image" />
        </div>
    </div>
</div>
    
    
</body>
</html>