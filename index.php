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
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <p class="modal-title" id="myModalLabel" style="color:#DC4C4E">add @@ signs at the end of link when you are adding a link</p>
                    <p class="modal-title" id="myModalLabel" style="color:#DC4C4E">make sure you link protocol is https</p>
                  </div>
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
  	$sqlupdatesread = "SELECT `username`, `textupdate`, `posted_at`, `likes`, `id` FROM `textupdates` ORDER BY `posted_at` DESC";
	
	$queryupdateread = mysqli_query($db_conx,$sqlupdatesread);
	
	while($rowsupdate = mysqli_fetch_array($queryupdateread)){
	
	$updateuser = $rowsupdate[0];
	$updatetext = $rowsupdate[1];
	$updatetime = $rowsupdate[2];
	$updatelikes = $rowsupdate[3];
	$updateid = $rowsupdate[4];

	 	 $sqlimgupdater = "SELECT avatar FROM users WHERE username='$updateuser'";
		 $queryimgupdater = mysqli_query($db_conx,$sqlimgupdater);
		 
		 $rowimgupdater = mysqli_fetch_row($queryimgupdater);
		 $updaterimage = $rowimgupdater[0];
	
	
		$newline=explode("\n",$updatetext);
		
		//$newline = explode(PHP_EOL,$updatetext);
		//foreach to find text lines
		
		
		
		foreach($newline as $line){
				//$line .= $line.'<br />';
				$line .= '<br />';
				$newupdatetext .= $line;
			}


		$linktesthttps = explode("https://",$newupdatetext);
		$linktesthttp = explode("http://",$newupdatetext);	
	
		$beforelinkstarthttps = $linktesthttps[0];
		$beforelinkstarthttp = $linktesthttp[0];
		
		if($linktesthttps[1]!=""){
				$newupdatetext="";
			}
		
		for($x=1;$x<count($linktesthttps);$x++)
		{
			if($newupdatetext==""){
				$newupdatetext= $beforelinkstarthttps;
				}
		if($linktesthttps[$x]!=""){
			$domaintesthttps = explode("@@",$linktesthttps[$x]);
			$afterlink = $domaintesthttps[1];
			$linktext = "https://".$domaintesthttps[0];
			$newupdatetext2='<a href="'.$linktext.'" target="_blank" style="text-decoration:none">'.$linktext.'</a>'.$afterlink;		
		}
			
			$newupdatetext .= $newupdatetext2;
		
		}
/*		
		if($linktesthttp[1]!=""){
				$newupdatetext="";
			}


		for($y=1;$y<count($linktesthttp);$y++){
			if($newupdatetext==""){
				$newupdatetext = $beforelinkstarthttp;
				}
			
			if($linktesthttp[$y]!=""){
			$domaintesthttp = explode("@@",$linktesthttp[$y]);
			$afterlink = $domaintesthttp[1];
			$linktext = "http://".$domaintesthttp[0];
			$newupdatetext2='<a href="'.$linktext.'" target="_blank" style="text-decoration:none">'.$linktext.'</a>'.$afterlink;
		}
		
		$newupdatetext .= $newupdatetext2;
			}
	*/	
		
  ?>      
        	<div style="padding:0%" class="panel">
              <h4 align="left" style="margin:1%;" class="panel-heading"><img style="border:solid #2B66F0 2px;" src="<?php echo $updaterimage ?>" width="7%" height="7%" /><?php 
			  echo ' by <a href="profile.php?u='.$updateuser.'" style="text-decoration:none;">'.$updateuser.'</a> on '.date('d M Y D',strtotime($updatetime)) ?></h4>
              <div class="panel-body"> 
              <h4 align="left" style="margin:1%"><?php echo $newupdatetext;$newupdatetext="" ?></h4><br style="margin-bottom:0%;" />
              <img class="img-thumbnail" src="cp/Amazing Nature HD Wallpapers (6).jpg" style="display:none" />
              </div><hr style="margin:0%" />
             <div>
             <h4 align="left" style="margin:2%;margin-left:5%">
             
             <a style="text-decoration:none" onClick="textupdatelike(<?php echo $updateid ?>)"><span class="fa fa-thumbs-o-up" 
             
             <?php 
			 	
				$sqlupdateliked_or_not = "SELECT * FROM textupdatelikes WHERE likername='$u_ses' AND postid='$updateid'";
			 
			 $queryUpdate_like_or_not = mysqli_query($db_conx,$sqlupdateliked_or_not);
			 
			 if(mysqli_num_rows($queryUpdate_like_or_not)<1){
			 
			  ?>style="display:inline"<?php }else{ ?> style="display:none"<?php } ?>
              
             
             id="liketextupdate<?php echo $updateid ?>" ></span></a>
             
             
             
             
             <a style="text-decoration:none" onClick="textupdateunlike(<?php echo $updateid ?>)"><span class="fa fa-thumbs-up" <?php 
			 	
				$sqlupdateliked_or_not = "SELECT * FROM textupdatelikes WHERE likername='$u_ses' AND postid='$updateid'";
			 
			 $queryUpdate_like_or_not = mysqli_query($db_conx,$sqlupdateliked_or_not);
			 
			 if(mysqli_num_rows($queryUpdate_like_or_not)<1){
			 
			  ?>style="display:none"<?php }else{ ?> style="display:inline"<?php } ?>
              
               id="likedtextupdate<?php echo $updateid ?>"></span></a>&nbsp;<span id="likesamount<?php echo $updateid ?>"><?php echo $updatelikes ?></span>&emsp;&emsp;&emsp;<a href=""><span class="fa fa-comment-o"></span></a>&nbsp;&emsp;&emsp;&emsp;<a href=""><span class="fa fa-share-alt"></span></a>&nbsp;</h4>
             </div>
             
             
             	<a id="expandlink<?php echo $updateid ?>" style="text-decoration:none;display:inline"  onClick="return false;" onMouseDown="expand('prev_comment<?php echo $updateid ?>');comment_ex('<?php echo $updateid ?>');">show previuos comments on this post...</a>
                
                <a id="retractlink<?php echo $updateid ?>" style="text-decoration:none;display:none"  onClick="return false;" onMouseDown="retract('prev_comment<?php echo $updateid ?>');comment_re('<?php echo $updateid ?>');">hide previuos comments on this post...</a>
             
             
               <div class="panel-footer" id="prev_comment<?php echo $updateid ?>" style="overflow:hidden;height:0px;">
                    <div class="row" style="padding:0%;margin:0%">
                        <div class="col-md-1" style="padding:1%;margin:0%" align="center">
                          <img style="margin:0%;padding:0%;" width="45px" height="45px" id="loggedinuserimage" class="img-responsive" src="<?php echo $img ?>" />&emsp;
                        </div>
                        <div class="col-md-11" style="">
                            cool
                        </div>
                    </div>
              
              		 <div class="row" style="padding:0%;margin:0%">
                        <div class="col-md-1" style="padding:1%;margin:0%" align="center">
                          <img style="margin:0%;padding:0%;" width="45px" height="45px" id="loggedinuserimage" class="img-responsive" src="<?php echo $img ?>" />&emsp;
                        </div>
                        <div class="col-md-11" style="">
                            chennai super kings ku wizle podu
                        </div>
                    </div>
                    
                     <div class="row" style="padding:0%;margin:0%">
                        <div class="col-md-1" style="padding:1%;margin:0%" align="center">
                          <img style="margin:0%;padding:0%;" width="45px" height="45px" id="loggedinuserimage" class="img-responsive" src="<?php echo $img ?>" />&emsp;
                        </div>
                        <div class="col-md-11" style="">
                            sixku piragu sevenda sivajiku piragu evenda?
                        </div>
                    </div>
              
                   </div>
                   
                   
              
               
               <div class="panel-footer" id="new_comment_section">
                    <div class="row" style="padding:0%;margin:0%">
                        <div class="col-md-1" style="padding:1%;margin:0%" align="center">
                          <img style="margin:0%;padding:0%;" width="45px" height="45px" id="loggedinuserimage" class="img-responsive" src="<?php echo $img ?>" />&emsp;
                        </div>
                        <div class="col-md-11">
                            <form id="comment_form" role="form">
                                <textarea class="form-control form-control-static" rows="2" style="resize:none" ></textarea>
                            </form>
                        </div>
                    </div>
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