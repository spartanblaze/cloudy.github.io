<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['uid']==0)) {
header('location:logout.php');
} else{
?>

<!DOCTYPE html>
<html>
<head>
	<title>Cloud Forecast</title>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<!-- bootstap css -->
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
     integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous"/>
</head>
<body>
<?php
$uid=$_SESSION['uid'];
$ret=mysqli_query($con,"select FullName from tbluser where ID='$uid'");
$row=mysqli_fetch_array($ret);
$name=$row['FullName'];
?>
<nav class="navbar navbar-default" id="nav_bar">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navLinks" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <ul>
      <li><b><strong></strong><a href="forecast.html">Forecast</a></li></b>
      <li><b><strong></strong><a href="pastdata.html">Past Data</a></li></b>
      <li><b><strong><a href="main.py">Future Prediction</a></li></strong></b>
      <li><b><strong><a href="about.html">About</a></li></strong></b>
      <li id="us_nav"><b><strong><a href="logout.php" onclick="return confirm('Are you sure, you want to logout?');"><i class="fas fa-user"></i>   Welcome  <?php echo $name;?></a></li></strong></b>
    </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div class="jumbotron jumbo">
  <div><center><img id="logo" src="images/cloud-logo.png" alt="Logo"><span style=" font-size: 60px">Cloud Forecast</span></center></div>
	<h2>Get Current Weather Information</h2>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3 class="text-center text-primary" style="color:white">Enter City Name:</h3>
			<div id="error"></div>
		</div>
		<div class="row form-group form-inline" id="city">
			<input type="text" name="cityname" id="cityname" class="form-control" placeholder="Enter city name"></input>
			<button id="submitCity" class="btn btn-primary" onclick="getWeather(document.getElementById('cityname').value);">Search City</button>
		</div>
        <div id="weather-data">
		
	    </div>
	</div>
</div>
<!--Jquery-->
<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>

<!--bootstarp javascript-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script type="text/javascript" src="script.js"></script>
</body>
</html>
<?php }  ?>