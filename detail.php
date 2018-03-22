<?php

session_start();
$course_id = $_SESSION['course_id']; 
include('check_member.php');
include ('headerMember.php');
include("connection.php");

$check = mysqli_query($connection, "SELECT * FROM class WHERE course_id = '1'");
if (mysqli_num_rows($check) == 0)
{
	echo "No data retrieved";
}
else 
{
	$row = mysqli_fetch_assoc($check);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
echo $row['course_title'];

}

?>



</body>
</html>