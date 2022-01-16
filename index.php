<?php 
include('includes/dbconnection.php');
if(isset($_POST['submit']))
  {
    $fname=$_POST['fname'];
    $contno=$_POST['contactno'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $ret=mysqli_query($con, "select Email from tbluser where Email='$email' || MobileNumber='$contno'");
    $result=mysqli_fetch_array($ret);
    if($result>0){
echo "<script>alert('This email or Contact Number already associated with another account');</script>";
    }
    else{
    $query=mysqli_query($con, "insert into tbluser(FullName, MobileNumber, Email,  Password) value('$fname', '$contno', '$email', '$password' )");
    if ($query) {
    echo "<script>alert('You have successfully registered');</script>";
    echo "<script>window.location.href ='login.php'</script>";
  }
  else
    {
      echo "<script>alert('Something Went Wrong. Please try again');</script>";
       echo "<script>window.location.href ='signup.php'</script>";
    }
}
}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up form</title>
    <link rel="stylesheet" href="signup.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
     integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous"/>
    
</head>
<body>
    <div class="container">
    <div class="forms-container">
    <div class="signin-signup">
    <form action="" method="post" class="sign-in-form">
        <h2 class="title">Sign up</h2>
        
<div class="input-field">
<i class="fas fa-user"></i>
<input type="text" name="fname" placeholder="Username" required="true" /> 
</div>

<div class="input-field">
    <i class="fas fa-phone"></i>
    <input type="text" name="contactno" placeholder="Phone Number" required="true"/> 
    </div>    

<div class="input-field">
    <i class="fas fa-envelope"></i>
    <input type="email" name="email" placeholder="Email" required="true" /> 
    </div>

    
<div class="input-field">
    <i class="fas fa-lock"></i>
    <input type="password" name="password"placeholder="Password" required="true" /> 
    </div>
    
<input type="submit" class="btn solid" name="submit" value="Register"/>

<span>Already have an account? <a style="color:#5bc0de;" href="login.php">Login Here</a></span>

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
                <button class="btn transparent" id="sign-in-button">Sign up</button>
            </div>
            <img src="undraw_Login_re_4vu2.png" alt="" class="image" />
        </div>
    </div>
</div>
    
    
</body>
</html>