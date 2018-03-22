<?php
session_start();
$error='';
include "connection.php";
if(isset($_POST['submit']))
{
$username = mysqli_real_escape_string($connection,$_POST['username']);
$password = mysqli_real_escape_string($connection,$_POST['password']);
$level = mysqli_real_escape_string($connection,$_POST['level']);
$statusApp = mysqli_real_escape_string($connection,$_POST['statusApp']);
$passcode = md5($password); // Encrypted Password
$sql = "SELECT * FROM organizer WHERE username='$username' and
password='$passcode'";
$query = mysqli_query($connection,$sql);
$row = $query->fetch_array();
$count = $query->num_rows; // if email/password are correct returns must be 1 row
if ($count == 1)
{
$_SESSION['username']=$row['username'];
$_SESSION['level'] = $row['level'];
$_SESSION['icno'] = $row['icno'];
$_SESSION['statusApp'] = $row['statusApp'];
if($row['level'] == "Organizer" && $level=="organizer" && $row['statusApp'] == "1")
{
header("Location: organizer.php");
}
else if ($row['level'] == "Organizer" && $level=="organizer" && $row['statusApp'] == "0")
{
$msg = "<div class='alert alert-danger'>
 <span class='glyphicon glyphicon-info-sign'></span> &nbsp;
your registration do not approve yet!
</div>";
}
else
{
$msg = "<div class='alert alert-danger'>
 <span class='glyphicon glyphicon-info-sign'></span> &nbsp;
Login failed - Incorrect user level!
</div>";
}
}
else
{
$msg = "<div class='alert alert-danger'>
<span class='glyphicon glyphicon-info-sign'></span> &nbsp;
Username or Password is invalid !
</div>";
}
$connection->close();
}
?>
<head>

	
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!-- Favicons -->
    <link rel="icon" href="./assets/img/kit/free/uitm-logo.png">
    <title>Log In</title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link rel="stylesheet" href="./assets/css/material-kit.css?v=2.0.2">
    <!-- Documentation extras -->
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="./assets/assets-for-demo/demo.css" rel="stylesheet" />
    <!-- iframe removal -->
</head>
<body>






<div class="section section-signup page-header" style="background-image: url('assets/img/kit/free/city.jpg');">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 ml-auto mr-auto">
                        <div class="card card-signup">
                            <form class="form" method="post" action="" class="login-form">
                            <?php
							if (isset($msg)) {
							echo $msg;
											}
							?>
                                <div class="card-header card-header-primary text-center">
                                    <h4>Log In Organizer</h4>
                                    <div class="social-line">
                                        <a href="#pablo" class="btn btn-link btn-just-icon">
                                            <i class="fa fa-facebook-square"></i>
                                        </a>
                                        <a href="#pablo" class="btn btn-link btn-just-icon">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                        <a href="#pablo" class="btn btn-link btn-just-icon">
                                            <i class="fa fa-google-plus"></i>
                                        </a>
                                    </div>
                                </div>
                                <p class="text-divider">Or Be Classical</p>
                                <div class="card-body">
                                    <div class="input-group">
                                        <input type="text" name="username" placeholder="Username..." class="form-username
											form-control" id="form-username">
                                    </div>
                                    <div class="input-group">
                                        <input type="password" name="password" placeholder="Password..." class="formpassword
										form-control" id="form-password">
                                    </div>
                                    <div class="input-group">
                                        <select name="level" class="form-control" required>
                                        <option value="">Choose User Level</option>
                                        <option value="organizer">Organizer</option>
                                        <option value="member">Member</option>
                                        </select>
                                    </div>
                                    <!-- If you want to add a checkbox to this form, uncomment this code

              <div class="form-check">
                  <label class="form-check-label">
                      <input class="form-check-input" type="checkbox" value="">
                      Subscribe to newsletter
                      <span class="form-check-sign">
                          <span class="check"></span>
                      </span>
                  </label>
              </div> -->
                                </div>
                                <div class="card-footer justify-content-center">
                                    <button type="submit" name="submit" class="btn">Sign in!</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!--   Core JS Files   -->
    <script src="./assets/js/core/jquery.min.js"></script>
    <script src="./assets/js/core/popper.min.js"></script>
    <script src="./assets/js/bootstrap-material-design.js"></script>
    <!--  Plugin for Date Time Picker and Full Calendar Plugin  -->
    <script src="./assets/js/plugins/moment.min.js"></script>
    <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
    <script src="./assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
    <!--	Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="./assets/js/plugins/nouislider.min.js"></script>
    <!-- Material Kit Core initialisations of plugins and Bootstrap Material Design Library -->
    <script src="./assets/js/material-kit.js?v=2.0.2"></script>
    <!-- Fixed Sidebar Nav - js With initialisations For Demo Purpose, Don't Include it in your project -->
    <script src="./assets/assets-for-demo/js/material-kit-demo.js"></script>
    <script>
        $(document).ready(function() {

            //init DateTimePickers
            materialKit.initFormExtendedDatetimepickers();

            // Sliders Init
            materialKit.initSliders();
        });
    </script>
    </body>