<body>
<?php
if(isset($_POST["view"])){
	include("connection.php");

	$query = mysqli_query($connection,"SELECT * FROM organizer WHERE statusApp = ''");
	$count = mysqli_num_rows($query);

	$data = array(
		'count'   => $count
	);
	echo json_encode($data);
}
?>

</body>