<?php
include('header_admin.php');
require_once 'connection.php';


$sql2="SELECT * FROM organizer WHERE statusApp ='0'";
$result=mysqli_query($connection, $sql2);
$count=mysqli_num_rows($result);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>



<br/></br><br><br><br>
<div id="notification-header">
			   
			  <div class="demo-content">
		<div id="notification-header">
			   <div style="position:relative"><font color="#FF0000"> 
			   <a href="view_list.php" id="notification-icon" name="button" onclick="myFunction()" class="dropbtn"><span id="notification-count"><?php if($count>0) { echo $count; } ?></span></a></font>
				 <div id="notification-latest"></div>
				</div>			
		</div>
							
		</div>

</body>
</html>