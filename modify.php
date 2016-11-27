.<?php
session_start();
$msg="";
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"osp");
$user=$_SESSION['name'];
$sql="select * from signup where name='".$user."'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
$a=$row[0];
$h=$row[1];

mysqli_close($con);
if(isset($_POST['submit']))
{
$a=$_POST['name'];
$h=$_POST['loc'];
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"osp");
$sqll="update signup set name='$a',Location and Date='$h' where name='".$user."'";
$_SESSION['name']=$a;
if(mysqli_query($con,$sqll))
{
$msg="The details are updated successfully!!!";
}
else
{
$msg="Updating error has been found!!!";
}
	mysqli_close($con);
	
}
?>
<html>
<head>
<title>modify</title>  
<link rel="stylesheet" href="http://localhost/OSPP/Project/log1/bootstrap.min.css">
    <link href="signin.css" rel="stylesheet">
</head>
<body>
<font color="blue"><h2>Modify Details:</font></h2>
<form method="POST" action=" ">
<center><br><label>
<?php echo "<font color='red'>".$msg."</font><br><br>";?>
<table border="0" width="130%" height="80%" ><tr><td>
        Event Name:</td><td> <input type="text" class="form-control" name="name" value="<?php echo $a;?>" placeholder="Name" required autofocus></td></tr>
	<tr><td>Location and Date </td><td><input type="text" class="form-control" value="<?php echo $h;?>" name="loc" placeholder="Location" required ></td></tr>
	<button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">UPDATE</button></td></tr>
 </table></label>
 </center>
</form>
</body>
</html>

