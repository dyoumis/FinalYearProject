<?php
include('header_admin.php');
include("connection.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>viewList</title>
</head>

<body>


<div class="container" style="margin-top:50px">
<div class="content">
</br>
</br>
<h2>List of Members Need To Approve</h2>
<hr />

<!-- start responsive table-->
<div class="table-responsive">
<table class="table table-striped table-hover">
<tr>
<th>No</th>
<th>IC No</th>
<th colspan="2">Approval</th>
</tr>

<?php $filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL); ?>

<?php

	$sql=mysqli_query($connection,"SELECT * FROM organizer WHERE statusApp = '0'");
	
	if(mysqli_num_rows($sql) == 0){   
		echo '
			<div class="form-top-left">
                <p>No data retrived...</p>
            </div>';
	}
	else{
		echo'<div class="form-top">';
		$no = 1; // start from number 1  
		while($row = mysqli_fetch_object($sql)){
			echo '   
			<tr class="data">    
				<td class="data">'.$no.'</td>    
				<td class="data">'.$row->username.'</td>
				<td><button" id="'.$row->username.'" title="Approve" data-toggle="tooltip" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button>
				</td>    
				<td><button" id="'.$row->username.'" title="Reject" data-toggle="tooltip" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
				</td>   
			</tr>  
			';
			$no++;
		}
		echo'</div>';
	}
?>
				</div>
			</div>
			<p id="demo"></p>
		</div>
    <form role="form" method="post" class="">
    </form>
    </table>
    </body>
<script type = "text/javascript">



$(document).ready(function(){

  function load(view = '')
  {
    $.ajax({
      url:'check_noti.php',
      method:"POST",
      data:{view:view},
      dataType:"json",
      success:function(data)
      {
        $('.count').html(data.count);
      }
    });
  }

  $(function(){
    $('.btn-danger').click(function(){
      var rej_user= $(this).attr('id');
      var $ele = $(this).parent().parent();
      $.ajax({
          url:"reject.php",
          method:'POST',
          data:{rej_user,rej_user},
          success:function(data)
          {
            if(data!="YES"){
              $ele.fadeOut().remove();
              load();
            }
            else{
                alert("Can't delete the row");
            }
          }
      });
    });
  });

  $(function(){
    $('.btn-success').click(function(){
      var app_user= $(this).attr('id');
      var $ele = $(this).parent().parent();
      $.ajax({
          url:"reject.php",
          method:'POST',
          data:{app_user,app_user},
          success:function(data)
          {
            if(data!="YES"){
              $ele.fadeOut().remove();
              load();
            }
            else{
                alert("Can't approve the account");
            }
          }
      });
    });
  });

  load();
  setInterval(function(){   //function untuk refresh setiap 5 second.. Wow!!! Finally this is what I try to find out!
    load();
  }, 1000);
  });
</script>
</table>
</div> <!-- /.table-responsive -->
</div> <!-- /.content -->
</div> <!-- /.container -->
</body>
</html>