<?php
session_start();
include ('connection.php');

$query = mysqli_query($connection,"SELECT * FROM organizer WHERE statusApp = '0'");
	$count = mysqli_num_rows($query);

?>


<script type = "text/javascript">
$(document).ready(function(){
  function load(view = '')
  {
    $.ajax({
      url:"check_noti.php",
      method:"POST",
      data:{view:view},
      dataType:"json",
      success:function(data)
      {
        $('.count').html(data.count);
      }
    });
  }

  load();
  setInterval(function(){   //function untuk refresh setiap 5 second.. Wow!!! Finally this is what I try to find out!
    load();
  }, 5000);
  });
</script>



<!DOCTYPE html>
<html>
<head>
<title>Administrator Page</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- CSS -->
<link rel="stylesheet"
href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap-datepicker.css">
<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="assets/css/style.css" >
<!-- JS -->
<script
src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/tooltip.js"></script>
<script src="assets/js/bootstrap-datepicker.js"></script>

</head>
<body>
<!-- top navigation-->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
<div class="container">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" datatarget="#myNavbar">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
</div>
<div class="collapse navbar-collapse" id="myNavbar">
<ul class="nav navbar-nav navbar-right ">
<li class="active"><a href="admin.php"><span class="glyphicon glyphiconhome"></span>
Admin Home</a></li>

<li class="dropdown">
                <a href="view_list.php"><span class="label label-pill label-danger count" style="border-radius:10px;"></span> <span class="glyphicon glyphicon-globe" style="font-size:18px;"></span></a>
            </li>

<li ><a href="view_list.php" data-toggle='tooltip' data-placement="bottom" title="view approve list">Approval Request <span class="badge"> <?php if($count>0) { echo $count; } else {echo 0;} ?></span></a></li>

</ul>


</div>
</div>
</div>
</nav>

<script>
function showResult(str) {
if (str.length==0) {
document.getElementById("livesearch").innerHTML="";

document.getElementById("livesearch").style.background="transparent";
document.getElementById("livesearch").style.border="0px";
return;
}
if (window.XMLHttpRequest) {
// code for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp=new XMLHttpRequest();
} else { // code for IE6, IE5
xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange=function() {
if (this.readyState==4 && this.status==200) {
document.getElementById("livesearch").innerHTML=this.responseText;
document.getElementById("livesearch").style.border="1px solid #A5ACB2";
document.getElementById("livesearch").style.background="#FFFFFF";
document.getElementById("livesearch").style.padding="5px 10px 5px 10px"; }
}
xmlhttp.open("GET","livesearch.php?q="+str,true);
xmlhttp.send();
}

</script>
