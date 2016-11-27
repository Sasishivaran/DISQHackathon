<?php include('./connect.php'); ?>
<?php 
session_start();
if (function_exists('date_default_timezone_set'))
{
  date_default_timezone_set('Asia/Mumbai');
}
$uname = "";
$upass = "";
$_SESSION['date'] = date('l jS \of F Y h:i:s A');

$uname = @$_POST['uname'];
$upass = @$_POST['upass'];

$sql = mysqli_query($con,"SELECT id FROM admin WHERE uname = '$uname' AND upass = '$upass'");
$count = mysqli_num_rows($sql);
if($count>0)
{
	while ($row = mysqli_fetch_array($sql,MYSQLI_ASSOC)) {
		$_SESSION['id'] = $row['id'];		
	}
	$_SESSION['admin'] = 1;

	header("Location: admin_order.php");
	exit();
}
else
{
	header("Location: admin.php");
}

?>