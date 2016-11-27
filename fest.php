<?php 

include ('./connect.php'); 
include ('./session.php');

?>
<?php include ('./header.php'); ?>

                  
                  $sql = mysqli_query($con,"SELECT * FROM cracker WHERE categories='festive' AND cprice > '$min' AND cprice < '$max'");
                  while ($row = mysqli_fetch_array($sql,MYSQLI_ASSOC))
                  {
                  echo '
                   <div class="col-md-3 text-center">
                  <h3>'.$row['cname'].'</h3>

                      <p2><span style="font-size:1.3em;"><b>&#8377; '.$row['cprice'].'</b></span></p2>
                  <a href="product.php?id='.$row['cid'].'&item=cracker" class="btn btn-primary btn-lg">Register</a>

                  </div>';
                  }

                  break;

                  default:
            $sql = mysqli_query($con,"SELECT * FROM cracker WHERE categories='festive'");
            while ($row = mysqli_fetch_array($sql,MYSQLI_ASSOC)) 
            {
            echo '
             <div class="col-md-3 text-center">
            <h3>'.$row['cname'].'</h3>

              <div class="thumbnail">
                  <img src="images/'.$row['cid'].'.png">
                </div>  
                <p2><span style="font-size:1.3em;"><b>&#8377; '.$row['cprice'].'</b></span></p2> 
            <a href="product.php?id='.$row['cid'].'&item=cracker" class="btn btn-primary btn-lg">Register</a>
	
            </div>';
            }
          }
      ?>
             
                



            </div>
          </div>
        </div>
      </div>
    </div>

<form id="search-form" method="GET" action="fest.php">

<input type="text" name="q" id="search-input">
<input type="number" name="mode" value="1">
</form>


<?php include('./footer.php') ?>
 