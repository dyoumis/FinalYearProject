<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>check_detail</title>
</head>

<body>

<?php

//check if user has login
if(!isset($_SESSION['course_title'])){
 die( Header("Location: feed.php"));
}

?>

</body>
</html>