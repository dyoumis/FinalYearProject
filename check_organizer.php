<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>

<?php

//check if user has login
if(!isset($_SESSION['username'])){
 die( Header("Location: login.php"));
}
//check user level
if($_SESSION['level']!="Organizer"){
 die( Header("Location: login.php"));
}
?>

</body>
</html>