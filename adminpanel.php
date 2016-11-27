<?php include ('./connect.php'); ?>
<?php session_start(); 
if(isset($_SESSION['admin'])&&$_SESSION['admin']==1)
{

}
else
{
	header("Location: admin.php");
}


?>
<!DOCTYPE html>
<html>
<head>
	<title> Admin Panel</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/admin.css">
</head>
<body>

<div class="row" style="margin: 0px;">
	<div class="col-xs-1" style="padding: 0px;">
<ul class="side-nav">
	<a href="#"><li class="active"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span><br>Insert</li></a>
<a href="admin_history.php"><li><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span><br>Modify</li></a>
		 <a href="admin_logout.php"><li><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span><br>Logout</li></a>
	<li id="timeline"><span class="glyphicon glyphicon-time" aria-hidden="true"></span><br><?php  
	$id = $_SESSION['id'];
	$sql = mysqli_query($con,"SELECT date FROM admin WHERE id = '$id'");
	while($row = mysqli_fetch_array($sql,MYSQLI_ASSOC))
	{
		echo $row['date'];
	}


	?></li>
</ul>
			
		
	</div>
	<div class="col-xs-11">
			<h1>Insert Event Name</h1>
			<div class="row">
			<div class="col-md-4"></div>
		<form class="col-md-4" action="insert_fest.php"  enctype="multipart/form-data" method="POST">
                  
                  <div class="form-group">
                    <label for="cname">Event Name</label>
                    <input type="text" class="form-control" id="cname" name="cname" required>
                  </div>
                  <div class="form-group">
                    <label for="cprice">Location and timing</label>
                    <input type="number" class="form-control" id="cprice" name="cprice" required>
                  </div>
                   <div class="form-group">
                    <label for="cdesc">Description</label>
                    <textarea id="cdesc" name="cdesc" class="form-control">
                    	
                    </textarea>
                  </div>
                   
                  
                  <button type="submit" id="signup-submit" class="btn btn-success btn-lg center-block">Submit</button>
                </form>
                <div class="col-md-4"></div>
</div>
<div class="col-xs-11">
			<h1>Modify Details</h1>
			<div class="row">
			<div class="col-md-4"></div>
		<form class="col-md-4" action="modify.php"  enctype="multipart/form-data" method="POST">
    
	</div>
</div>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>