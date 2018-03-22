<?php
$error='';
session_start();
include('check_member.php');
include ('headerMember.php');
include("connection.php");

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>feed</title>
<style>
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}
</style>
</head>

<body>
</br></br>
<div class="main main-raised">
<div class="section section-basic">
<div class="w3-container">
<center>
  <table class="w3-table w3-bordered">
    
<?php 

$query = $connection->query (" SELECT * FROM class ORDER BY timestamp DESC");


if ($connection->affected_rows >=1) {

	echo '<?xml version-"1.0" encoding-"UTF-8" ?>' ?>
	<rss version-"2.0">
	<channel>
        <h3> List of Training Class </h3>
        <?php
		while ($row = $query->fetch_assoc()) {
			$course_id = $row['course_id'];
		?>
        <tr>
        <td>
		<item><?php 
		$row['course_id'] = 'course_id';
		?>
			<?php echo '<a href="detail.php?course_id='.$course_id.'">' ?><b><?php echo $row['course_title']; ?></b></a></br>
			<description> <?php echo $row['description']; ?></description></br>
			<pubDate><?php echo date($row['timestamp']); ?> </pubDate>
		</item>
        </br></br>
        </p>
        <?php
			}
		?>
	</channel>
	</rss>
<?php
 }
?> 
</td>
</tr>
</table>
</center>
</div>
</div>
</body>
</html>