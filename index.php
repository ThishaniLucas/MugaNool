<?php include_once('.\templates\header_tem.php'); ?>
<?php 
	if(!isset($_SESSION['user_logged'])){
	header("Location: http://localhost/SocialNetworkingApp/signup.php");
	exit();
	}
?>

<?php include_once('.\templates\menu_item.php'); ?>

<?php include('.\templates\db_conx.php'); ?>

<?php 
	session_start();
	$u_ses = $_SESSION['user_logged'];
	$sqln = "UPDATE users SET notescheck=NOW() WHERE username='$u_ses'";
	$queryn = mysqli_query($db_conx,$sqln);
?>
<?php 
$sql ="SELECT avatar FROM users WHERE username='$u_ses' LIMIT 1";
$query=mysqli_query($db_conx,$sql);

if(mysqli_num_rows($query)<1){
	echo '<h1 style="color:orange;">no such record!</h1>';
}

$row = mysqli_fetch_row($query);
$img = $row[0];

?> 

<div class="row">
	<div class="col-md-2" align="center">
    	<div style="margin-top:9%;padding:0%" ><a href="profile.php"><img src="<?php echo $img ?>" width="50%" height="50%" style="border:3px solid white" /></a></div>
    </div>
    
    <div class="col-md-7" style="margin-top:1%">
    	<script type="text/javascript" src="script/update.js"></script>
        
        <div class="well">
        <ul class="nav nav-pills" role="tablist">
          <li role="presentation"><a href="#" data-toggle="modal" data-target="#textupdatemodal">Update Status </a>
          
          	<div class="modal fade" id="textupdatemodal">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-body">
                    <form name="textupdate" id="textupdate" onSubmit="return false;">
                      <div class="form-group">
                       	<textarea class="form-control" id="textupdateinput" name="textupdateinput" placeholder="What's in your mind?" rows="12"></textarea> 
                      </div>
                     <div align="right"><button type="submit" class="btn btn-primary btn-lg" id="textsubmit" name="textsubmit" onClick="textupdatefunc()"  >update</button></div>															      				</form>
                  </div>
                </div>
              </div>
            </div>
          
          </li>
          <li role="presentation"><a href="#"><span class="glyphicon glyphicon-camera"></span>&nbsp; Add a photo </a></li>
          <li role="presentation"><a href="#"><span class="glyphicon glyphicon-facetime-video
"></span>&nbsp;&nbsp;Add a video </a></li>
            <li role="presentation"><a href="#"><span class="glyphicon glyphicon-file
            "></span>&nbsp;&nbsp;Add a file </a></li>
        </ul>
        </div>
        
  <?php 
  	$sqlupdatesread = "SELECT `username`, `textupdate`, `posted_at`, `likes` FROM `textupdates` ORDER BY `posted_at` DESC";
	
	$queryupdateread = mysqli_query($db_conx,$sqlupdatesread);
	
	while($rowsupdate = mysqli_fetch_array($queryupdateread)){
	
	$updateuser = $rowsupdate[0];
	$updatetext = $rowsupdate[1];
	$updatetime = $rowsupdate[2];
	$updatelikes = $rowsupdate[3];
	 	 $sqlimgupdater = "SELECT avatar FROM users WHERE username='$updateuser'";
		 $queryimgupdater = mysqli_query($db_conx,$sqlimgupdater);
		 
		 $rowimgupdater = mysqli_fetch_row($queryimgupdater);
		 $updaterimage = $rowimgupdater[0];
		 
		
  ?>      
        	<div style="padding:0%" class="panel">
              <h4 align="left" style="margin:1%;" class="panel-heading"><img style="border:solid #2B66F0 2px;" src="<?php echo $updaterimage ?>" width="7%" height="7%" /><?php 
			  echo ' by <a href="profile.php?u='.$updateuser.'" style="text-decoration:none;">'.$updateuser.'</a> on '.date('d M Y D',strtotime($updatetime)) ?></h4>
              <div class="panel-body"> 
              <h4 align="left" style="margin:1%"><?php echo $updatetext ?></h4><br style="margin-bottom:0%;" />
              <img class="img-thumbnail" src="cp/Amazing Nature HD Wallpapers (6).jpg" style="display:none" />
              </div><hr style="margin:0%" />
             <div>
             <h4 align="left" style="margin:2%;margin-left:5%"><a href=""><span class="fa fa-thumbs-o-up"></span></a>&nbsp;<?php echo $updatelikes ?>&emsp;&emsp;&emsp;<a href=""><span class="fa fa-comment-o"></span></a>&nbsp;&emsp;&emsp;&emsp;<a href=""><span class="fa fa-share-alt"></span></a>&nbsp;</h4>
             </div>
               
            </div>

<?php } ?>        
    
    </div>
    
    <div class="col-md-3" style="margin-top:1%">
    	<div class="well"></div>
        <div class="well"></div>
        <div class="well"></div>
    </div>
</div>

<?php include_once('.\templates\footer_tem.php'); ?>