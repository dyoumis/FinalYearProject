<?php
include('connection.php');
if(isset($_POST["rej_user"])){
    $reject_user = $_POST['rej_user'];
    $qry = "DELETE FROM `organizer` WHERE username ='$reject_user'";
    $result=mysqli_query($connection,$qry);
}
else if(isset($_POST["app_user"])){
	$approve_user = $_POST['app_user'];
	$qry = "UPDATE organizer SET statusApp = '1' WHERE username='$approve_user'";
	$result=mysqli_query($connection,$qry);
}
    
?>