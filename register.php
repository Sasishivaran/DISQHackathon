<?php 
include ('./connect.php'); 
include ('./session.php');
include ('./header.php');
?>


<?php
if(isset($_GET['item'])&&$_GET['item']=='cracker')
{
	$pid = "";
	$pid = $_GET['id'];

	$sql = mysqli_query($con,"SELECT * FROM cracker WHERE cid = '$pid' LIMIT 1");

	while($row = mysqli_fetch_array($sql,MYSQLI_ASSOC))
	{
	echo 
	'
		<div class="product-view">
		<div class="container">
			<div class="row">
				<div class="col-md-4 text-center">
					<h1>'.$row['cname'].'</h1>
					
					<div id="demo" class="thumbnail" data-zoomed="images/'.$row['cid'].'.png">

					  <img src="images/'.$row['cid'].'.png" alt="">

				</div>
					<p2><span style="font-size:2.2em;"><b>Rs.'.$row['cprice'].'</b></span></p2>
				</div>
				<div class="col-md-5">
					<div class="product-text">
					
					<form action="addcart.php" method="GET">
					<input type="hidden" name="cid" value="'.$row['cid'].'" />
					<input type="hidden" name="item" value="cracker" />
					<div class="form-group">
						<label for="quantity">Quantity</label>
	    <input type="text" min="10" max="30" name="q" class="form-control" id="quantity" required>
					</div>
					
					<input type="submit" class="btn btn-primary" value="interested" />
					</form>
					</div>
					 
				</div>
			
			</div>
			
<div class="row">
			<div class="col-md-12">
				<h1 class="page-header">Description:<h3>'.$row['cdesc'].'</h3></h1>
			</div>

	</div>';
	}
	
}	
	
	else
	{
		echo "No product is selected";
	}
?> 
<?php 
include ('./footer.php');
?>