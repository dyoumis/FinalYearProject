<?php
session_start();
include('check_organizer.php');
include ('header_organizer.php');
include('connection.php');

$username = $_SESSION['username'];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="../assets/img/kit/free/uitm-logo.png">
    <link rel="icon" href="../assets/img/kit/free/uitm-logo.png">
    <title>
        class form
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../assets/css/material-kit.css?v=2.0.2">
</head>

<body>
<div class="container" style="margin-top:50px">
<div class="content">
</br>
</br>
<h2>Add New Training Class &raquo;</h2>
<hr />
<?php



$check = "SELECT * FROM organizer WHERE username = '$username'";
$result = $connection -> query($check);


if($result ->num_rows == 0){
	echo "<br><br><br><br></br></br></br></br>";
	echo "<p align=center valign=middle><font color=black size='6pt'>No record have been found!</font></p>";
	echo "<p align=center valign=middle> <font color=black size='4pt'><br><a href='index.php'>Back </font></p>";
}
else if($row = $result -> fetch_assoc()){

if(isset($_POST['add'])){ // if button Add clicked
$course_title = $_POST['course_title'];
$level = $_POST['level'];
$duration = $_POST['duration'];
$training_date = $_POST['training_date'];
$price = $_POST['price'];
$venue = $_POST['venue'];
$limitation = $_POST['limitation'];
$organizerID = $_POST['organizerID'];

$description = $_POST['description'];




$insert = mysqli_query($connection, "INSERT INTO class(course_title, level, duration, training_date, price, venue, limitation, organizerID, timestamp, description) VALUES('$course_title','$level', '$duration', '$training_date', '$price', '$venue', '$limitation', '$organizerID', NOW(), '$description')") or die(mysqli_error()); // query for adding data into database
if($insert){ // if query executed successfully
echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data for new member added.. <a href="view_users.php"><- Back</a></div>'; // display message data saved successfully.'
}else{ // if query unsuccessful
echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Cannot add data for new member! <a href="view_users.php"><- Back</a></div>'; // display message data unsuccessful added!'
}
}

?>


<!-- Form for collecting member data -->
<form class="form-horizontal" action="" method="post">
<div class="col-md-12">
<div class="form-group">
<label class="col-sm-3 control-label">Training Class Name: </label>
<div class="col-sm-2">
<input type="text" name="course_title" class="form-control" placeholder="Class Name" required>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">Training Class Description: </label>
<div class="col-sm-4">
<textarea rows="4" cols="50" name="description" class="form-control" placeholder="Description" required></textarea>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">Level: </label>
<div class="col-sm-4">
<select name="level" class="form-control" placeholder="Level" required>
  <option value="select">Select a Level</option>
  <option value="Beginner">Begginer</option>
  <option value="Intermediate">Intermediate</option>
  <option value="Advance">Advanced</option>
</select>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">Duration: </label>
<div class="col-sm-4">
<select name="duration" class="form-control" required>
  <option value="select">Select duration</option>
  <option value="1 Hour">1 Hour</option>
  <option value="2 Hour">2 Hour</option>
  <option value="3 Hour">3 Hour</option>
</select>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label"> Event Date: </label>
<div class="col-sm-4">
<input type="text" name="training_date" class="form-control datepicker" placeholder="Date" required>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">Fee per Pax: </label>
<div class="col-sm-4">
<input type="text" name="price" class="form-control" placeholder="Fee" required>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">Venue: </label>
<div class="col-sm-4">
<input type="text" name="venue" class="form-control" placeholder="Event Venue" required>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">Limitation: </label>
<div class="col-sm-4">
<input type="text" name="limitation" class="form-control" placeholder="Limitation" required>
</div>
</div>

<div class="form-group"> 
<label class="col-sm-3 control-label">Organizer ID: </label> 
<div class="col-sm-5"> 
<input type="text" name="organizerID" class="form-control" value="<?php echo $row['lecturerID']; ?>" required> 
</div> 
</div>
<div class="form-group">
<label class="col-sm-3 control-label">&nbsp;</label>
<div class="col-sm-6">
<input type="submit" name="add" class="btn btn-sm btn-primary" value="Add" data-toggle="tooltip" title="Add member data">
<a href="view_users.php" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Cancel">Cancel</a>
</div>
</div>
</div>
</form> <!-- /form -->
</div> <!-- /.content -->
</div> <!-- /.container -->
<?php } ?>
</body>
</html>