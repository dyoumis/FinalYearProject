<!DOCTYPE html>
<html>
<head>

	
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="./assets/img/kit/free/apple-icon.png">
    <link rel="icon" href="./assets/img/kit/free/favicon.png">
    <title>
        Training Class Registration System
    </title>
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


  <nav class="navbar navbar-expand-lg bg-primary">
                        <div class="container">
                            <div class="navbar-translate">
                                <a class="navbar-brand" href="index.php">Training Class Registration System</a>
                                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                    <span class="navbar-toggler-icon"></span>
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                            </div>
                            <div class="collapse navbar-collapse">
                                <ul class="navbar-nav ml-auto">
                                   
                                    <li class="active nav-item">
                                        <a href="member.php" class="nav-link">
                                            Discover
                                        </a>
                                    </li>
                                    
                                    <li class="nav-item">
                                        <a href="feed.php" class="nav-link">
                                            Feed
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="setting.php" class="nav-link">
                                            setting
                                        </a>
                                    </li>
                                </ul>
                                
                            </div>
                        </div>
                 
                                <div class="container">
								<div class="pull-right">
								Welcome, <i><?php echo $_SESSION['username'];?></i>
								</div>
								</div>
                        
                    </nav>


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
</html>
