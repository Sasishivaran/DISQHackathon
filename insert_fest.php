<?php include('./connect.php'); ?>
<?php session_start(); 
if(isset($_SESSION['admin'])&&$_SESSION['admin']==1)
{

}
else
{
	header("Location: admin.php");
}


?>
<?php 

	$cname = "";
	$cprice = "";
	$cdesc = "";
	$date = "";
	
	$cname = @$_POST['cname'];
	$cprice = @$_POST['cprice'];
	$cdesc = @$_POST['cdesc'];
	$date = date('Y-m-d');
$cid = "";


echo $cname;
$sql = mysqli_query($con,"SELECT * FROM cracker WHERE cname = '$cname'");
$count = mysqli_num_rows($sql);
if($count < 1)
{
$sql = mysqli_query($con,"INSERT INTO cracker values ('','$cname','$cprice','$cdesc')");
echo 'Ok';

$sql = mysqli_query($con,"SELECT cid FROM cracker WHERE cname = '$cname' LIMIT 1");
echo 'Ok';
while($row = mysqli_fetch_array($sql,MYSQLI_ASSOC))
{
	$cid = $row['cid'];
	echo $cid;
}
	$filename = @$_FILES['image']['name'];
$pos = strpos($filename,'.')+1;
$ext = substr($filename,$pos);

	echo $filename;

		$sourcePath = @$_FILES['image']['tmp_name'];
		echo $sourcePath;
		$targetPath = imagepng(imagecreatefromstring(file_get_contents($sourcePath)), "images/".$cid.".png");
if(move_uploaded_file($sourcePath,$targetPath)) {
?>


<img src="<?php echo $targetPath; ?>" width="150px" height="180px" />

<?php
}


header('Location: admin_panel.php');

}
else
	echo "Already Exist <a href='admin_panel.php'>Go Back</a>";
?>