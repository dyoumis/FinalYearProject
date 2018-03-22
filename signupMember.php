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

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!-- Favicons -->
    <link rel="icon" href="../assets/img/kit/free/uitm-logo.png">
    <title>
        Signup Member
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../assets/css/material-kit.css?v=2.0.2">
</head>

<body class="signup-page ">
    <nav class="navbar  navbar-transparent    navbar-absolute  navbar-expand-lg " color-on-scroll="100" id="sectionsNav">
        <div class="container">
            <div class="navbar-translate">
                <a class="navbar-brand" href="../index.html">Material Kit </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    <span class="navbar-toggler-icon"></span>
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="dropdown nav-item">
                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                            <i class="material-icons">apps</i> Components
                        </a>
                        <div class="dropdown-menu dropdown-with-icons">
                            <a href="../index.html" class="dropdown-item">
                                <i class="material-icons">layers</i> All Components
                            </a>
                            <a href="http://demos.creative-tim.com/material-kit/docs/2.0/getting-started/introduction.html" class="dropdown-item">
                                <i class="material-icons">content_paste</i> Documentation
                            </a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0)" onclick="scrollToDownload()">
                            <i class="material-icons">cloud_download</i> Download
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://twitter.com/CreativeTim" target="_blank" data-original-title="Follow us on Twitter">
                            <i class="fa fa-twitter"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://www.facebook.com/CreativeTim" target="_blank" data-original-title="Like us on Facebook">
                            <i class="fa fa-facebook-square"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://www.instagram.com/CreativeTimOfficial" target="_blank" data-original-title="Follow us on Instagram">
                            <i class="fa fa-instagram"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="page-header header-filter" filter-color="purple" style="background-image: url(&apos;../assets/img/kit/free/bg7.jpg&apos;); background-size: cover; background-position: top center;">
        <div class="container">
            <div class="row">
                <div class="col-md-10 ml-auto mr-auto">
                    <div class="card card-signup">
                        <h2 class="card-title text-center">Register</h2>
                        <div class="card-body">
                            <div class="row">
                                
                                <div class="col-md-5 mr-auto">
                                    <div class="social text-center">
                                        <button class="btn btn-just-icon btn-round btn-twitter">
                                            <i class="fa fa-twitter"></i>
                                        </button>
                                        <button class="btn btn-just-icon btn-round btn-dribbble">
                                            <i class="fa fa-dribbble"></i>
                                        </button>
                                        <button class="btn btn-just-icon btn-round btn-facebook">
                                            <i class="fa fa-facebook"> </i>
                                        </button>
                                        <h4> or be classical </h4>
                                    </div>
                                    <form class="form" method="post" action="" id="register-form">
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
                                        
                                        
                                        <div class="form-check">
                                        <input id="myCheckHidden" type="hidden" value="No" name="status">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" value="" name="status" type="checkbox" id="myCheckHidden" onclick="myFunction()" checked>
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                                I'm UiTM Perlis's student
                                            </label>
                                        </div>
                                        
                                        
                                        
                                        <div class="form-group">
                                        <input id="myCheck" type="hidden" value="No" name="status">
                                        I'm UiTM Perlis's student: <input name="status" type="checkbox" id="myCheckHidden" onclick="myFunction()" 
                                        value="student">
                                        </div>
                                        
                                        <div class="form-group">
                                        <input type="text" class="form-control" id="textHidden" placeholder="your student id" name="studentID" 
                                        value="" style="display:none" required />
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
        </div>
        <footer class="footer ">
            <div class="container">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="https://www.creative-tim.com">
                                Creative Tim
                            </a>
                        </li>
                        <li>
                            <a href="http://presentation.creative-tim.com">
                                About Us
                            </a>
                        </li>
                        <li>
                            <a href="http://blog.creative-tim.com">
                                Blog
                            </a>
                        </li>
                        <li>
                            <a href="https://www.creative-tim.com/license">
                                Licenses
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="copyright pull-right">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script>, made with <i class="material-icons">favorite</i> by
                    <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
                </div>
            </div>
        </footer>
    </div>
    <!--   Core JS Files   -->
    <script src="../assets/js/core/jquery.min.js"></script>
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/bootstrap-material-design.js"></script>
    <!--  Plugin for Date Time Picker and Full Calendar Plugin  -->
    <script src="../assets/js/plugins/moment.min.js"></script>
    <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
    <script src="../assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
    <!--	Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="../assets/js/plugins/nouislider.min.js"></script>
    <!-- Material Kit Core initialisations of plugins and Bootstrap Material Design Library -->
    <script src="../assets/js/material-kit.js?v=2.0.2"></script>
    <!-- Fixed Sidebar Nav - js With initialisations For Demo Purpose, Don't Include it in your project -->
    <script src="../assets/assets-for-demo/js/material-kit-demo.js"></script>
</body>

</html>