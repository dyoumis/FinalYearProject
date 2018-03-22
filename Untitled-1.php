<?php
session_start();

require_once 'connection.php';
if(isset($_POST['btn-signup'])) {
	$icno=mysqli_real_escape_string($connection,$_POST['icno']);
	$username=mysqli_real_escape_string($connection,$_POST['username']);
	$first=mysqli_real_escape_string($connection,$_POST['first']);
	$last=mysqli_real_escape_string($connection,$_POST['last']);
	$password=mysqli_real_escape_string($connection,$_POST['password']);
	$password=md5($password);
	$level=mysqli_real_escape_string($connection,$_POST['level']);
	$status=mysqli_real_escape_string($connection,$_POST['status']);
	$studentID=mysqli_real_escape_string($connection,$_POST['studentID']);
	
	
	$check_icno = $connection->query ("SELECT icno FROM user WHERE icno='$icno'");
	$countic = $check_icno->num_rows;
	$check_username = $connection->query("SELECT username FROM user WHERE username='$username'");
	$countun = $check_username->num_rows;
	if (($countic==0) && ($countun==0)){
		$query = "INSERT INTO user(username,password,first,last,level,icno,status,studentID) VALUES
('$username','$password','$first', '$last', '$level','$icno','$status','$studentID')";
if ($connection->query($query)) {
$msg = "<div class='alert alert-success'>
<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Successfully
registered!
</div>";
} else {
$msg = "<div class='alert alert-danger'>
<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Error while
registering !
</div>";
}
} else {
$msg = "<div class='alert alert-danger'>
<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Sorry..
Username or IC Number already exist!
</div>";
}
$connection->close();
}		
?>
<!doctype html>
<html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Sign Up Member</title>
<link rel="stylesheet"
href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="assets/css/form-elements.css">
<link rel="stylesheet" href="assets/css/style.css">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
<!-- Top content -->
 <div class="top-content">
 <div class="inner-bg">
 <div class="container">
 <div class="row">
 <div class="col-sm-6 col-sm-offset-3 form-box">
 <div class="form-top">
 <div class="form-top-left">
 <h3>FULA E-Car Park</h3>
 <h3>Car Parking Registration System</h3>
<h4>Sign-Up</h4>
 </div>
<div class="form-top-right">
 <i class="fa fa-key"></i>
 
 </div>
 </div>
<div class="form-bottom">

<form role="form" class="login-form" method="post" id="register-form">
<?php
if (isset($msg)) {
echo $msg;
}
?>
<div class="form-group">
<input type="text" class="form-control" placeholder="IC Number - without dash -"
name="icno" required />
</div>

<div class="form-group">
<input type="text" class="form-control" placeholder="First Name" name="first"
required />
</div>

<div class="form-group">
<input type="text" class="form-control" placeholder="Last Name" name="last"
required />
</div>

<div class="form-group">
<input type="text" class="form-control" placeholder="Username" name="username"
required />
</div>

<div class="form-group">
<input type="password" class="form-control" placeholder="Password" name="password"
required />
</div>

<div class="form-group">
<select name="level" class="form-control">
<option value="">Choose User Level</option>
<option value="2">Organizer</option>
<option value="3" selected>Member</option>
</select>
</div>

<div class="form-group">
<input id="myCheck" type="hidden" value="No" name="status">
I'm UiTM Perlis's student: <input name="status" type="checkbox" id="myCheckHidden" onclick="myFunction()" value="student">
</div>

<input id="textHidden" type="text" value="" style="display:none"  placeholder="your student id" name="studentID">

<script>	
function myFunction() {
  // Get the checkbox
  var checkBox = document.getElementById("myCheckHidden");
  // Get the output text
  var text = document.getElementById("textHidden");

  // If the checkbox is checked, display the output text
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
    text.style.display = "none";
  }
}
</script>
<div class="form-group">
<button type="submit" class="btn btn-default" name="btn-signup">
<span class="glyphicon glyphicon-log-in"></span> &nbsp; Create Account
</button>
<hr />
<a href="login.php" class="btn btn-default">Log In Here</a>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>

<!-- Javascript -->
<script src="assets/js/jquery-1.11.1.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.backstretch.min.js"></script>
<script src="assets/js/scripts.js"></script>

<!--[if lt IE 10]>
 <script src="asset/js/placeholder.js"></script>
<![endif]-->
</body>
</html><?php
session_start();

require_once 'connection.php';
if(isset($_POST['btn-signup'])) {
	$icno=mysqli_real_escape_string($connection,$_POST['icno']);
	$username=mysqli_real_escape_string($connection,$_POST['username']);
	$first=mysqli_real_escape_string($connection,$_POST['first']);
	$last=mysqli_real_escape_string($connection,$_POST['last']);
	$password=mysqli_real_escape_string($connection,$_POST['password']);
	$password=md5($password);
	$level=mysqli_real_escape_string($connection,$_POST['level']);
	$status=mysqli_real_escape_string($connection,$_POST['status']);
	$studentID=mysqli_real_escape_string($connection,$_POST['studentID']);
	
	
	$check_icno = $connection->query ("SELECT icno FROM user WHERE icno='$icno'");
	$countic = $check_icno->num_rows;
	$check_username = $connection->query("SELECT username FROM user WHERE username='$username'");
	$countun = $check_username->num_rows;
	if (($countic==0) && ($countun==0)){
		$query = "INSERT INTO user(username,password,first,last,level,icno,status,studentID) VALUES
('$username','$password','$first', '$last', '$level','$icno','$status','$studentID')";
if ($connection->query($query)) {
$msg = "<div class='alert alert-success'>
<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Successfully
registered!
</div>";
} else {
$msg = "<div class='alert alert-danger'>
<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Error while
registering !
</div>";
}
} else {
$msg = "<div class='alert alert-danger'>
<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Sorry..
Username or IC Number already exist!
</div>";
}
$connection->close();
}		
?>
<!doctype html>
<html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Sign Up Member</title>
<link rel="stylesheet"
href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="assets/css/form-elements.css">
<link rel="stylesheet" href="assets/css/style.css">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
<!-- Top content -->
 <div class="top-content">
 <div class="inner-bg">
 <div class="container">
 <div class="row">
 <div class="col-sm-6 col-sm-offset-3 form-box">
 <div class="form-top">
 <div class="form-top-left">
 <h3>FULA E-Car Park</h3>
 <h3>Car Parking Registration System</h3>
<h4>Sign-Up</h4>
 </div>
<div class="form-top-right">
 <i class="fa fa-key"></i>
 
 </div>
 </div>
<div class="form-bottom">

<form role="form" class="login-form" method="post" id="register-form">
<?php
if (isset($msg)) {
echo $msg;
}
?>
<div class="form-group">
<input type="text" class="form-control" placeholder="IC Number - without dash -"
name="icno" required />
</div>

<div class="form-group">
<input type="text" class="form-control" placeholder="First Name" name="first"
required />
</div>

<div class="form-group">
<input type="text" class="form-control" placeholder="Last Name" name="last"
required />
</div>

<div class="form-group">
<input type="text" class="form-control" placeholder="Username" name="username"
required />
</div>

<div class="form-group">
<input type="password" class="form-control" placeholder="Password" name="password"
required />
</div>

<div class="form-group">
<select name="level" class="form-control">
<option value="">Choose User Level</option>
<option value="2">Organizer</option>
<option value="3" selected>Member</option>
</select>
</div>

<div class="form-group">
<input id="myCheck" type="hidden" value="No" name="status">
I'm UiTM Perlis's student: <input name="status" type="checkbox" id="myCheckHidden" onclick="myFunction()" value="student">
</div>

<input id="textHidden" type="text" value="" style="display:none"  placeholder="your student id" name="studentID">

<script>	
function myFunction() {
  // Get the checkbox
  var checkBox = document.getElementById("myCheckHidden");
  // Get the output text
  var text = document.getElementById("textHidden");

  // If the checkbox is checked, display the output text
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
    text.style.display = "none";
  }
}
</script>
<div class="form-group">
<button type="submit" class="btn btn-default" name="btn-signup">
<span class="glyphicon glyphicon-log-in"></span> &nbsp; Create Account
</button>
<hr />
<a href="login.php" class="btn btn-default">Log In Here</a>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>

<!-- Javascript -->
<script src="assets/js/jquery-1.11.1.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.backstretch.min.js"></script>
<script src="assets/js/scripts.js"></script>

<!--[if lt IE 10]>
 <script src="asset/js/placeholder.js"></script>
<![endif]-->
</body>
</html>