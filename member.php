<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Member Page</title>
</head>

<?php 
session_start();
include ('headerMember.php');
$icno = $_SESSION['icno']; 

//check if user has login 
include('check_member.php'); //check if member logged in 
include("connection.php"); // connction to database
?>

<body>

<?php



/* execute SQL statement */
$check = "SELECT * FROM user 
WHERE icno = '$icno'";

$result = $connection -> query($check);

if($result ->num_rows == 0){
	echo "<br><br><br><br></br></br></br></br>";
	echo "<p align=center valign=middle><font color=black size='6pt'>No record have been found!</font></p>";
	echo "<p align=center valign=middle> <font color=black size='4pt'><br><a href='index.php'>Back </font></p>";
}
else if($row = $result -> fetch_assoc()){
	$first = $row['first']; 
	$last = $row['last']; 
	$username = $row['username']; 
	$icno = $row['icno'];
	 $studentID = $row['studentID'];
	$status = $row['status']; 
	
	
	
?> 
<div class="container" style="margin-top:50px"> 
<div class="content"> 
<h2>Member Profile &raquo;</h2> 
<hr /> 

<html>
<body>


<p align="center">&nbsp;</p>
<form name="form" align = "center" valign="middle">
  <p><br> 
  <table width="1000" height="100" border="1" align="center">
  

  <tr>
    <td align="center"><b>first</td>
    <td align="center"><b>last</td>
    <td align="center"><b>username</td>
    <td align="center"><b>icno</td>
    
    <?php
	
	if($row['status'] == 'student')
	{
		
		echo "StudentID:";
	}
	?>
   
     
  </tr>
  
  </p>
    <tr>
      <td align="center"><?php echo $first = $row['first']; ?></td> 
      <td align="center"><?php echo $last = $row['last']; ?></td> 
      <td align="center"><?php echo $username = $row['username'];  ?></td>   
      <td align="center"><?php echo $icno = $row['icno']; ?></td>
       <?php
	
	if($row['status'] = "student")
	{
		
		echo $status = $row['studentID'];
	}
	?>
	  
    </tr>
     <table>
   <p><br>
</form>
<div class="form-group"> 
<label class="col-sm-3 control-label">&nbsp;</label> 
<div class="col-sm-6"> 
 
<a href="edit_member.php" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Cancel">Update</a> 


<?php
if(($row['status']) == 'Active'){
echo '<a href="print_letter.php?icno='.$row['icno'].'" target="_blank"
title="Print Letter" data-toggle="tooltip" class="btn btn-sm btnprimary"><span
class="glyphicon glyphicon-print" aria-hidden="true"></span>
Print Letter</a>';
}
?> 
</div> 
</body>
</html>
<?php
}
?>

</body>
</html>