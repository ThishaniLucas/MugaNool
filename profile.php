<?php 
session_start();
include('.\templates\user_session_set.php');
if(isset($_GET["u"])==""){
	header("Location: http://localhost/SocialNetworkingApp/profile.php?u=".$_SESSION["user_logged"]);	
}
?>


<?php include('.\templates\db_conx.php');

 ?>
<?php include_once('.\templates\header_tem.php'); ?>
<?php include_once('.\templates\menu_item.php'); ?>
<?php 
$u = $_GET["u"];
$u_ses = $_SESSION["user_logged"];
$sql ="SELECT avatar,email,gender,website,counry,birthday FROM users WHERE username='$u'";
$query=mysqli_query($db_conx,$sql);
if(mysqli_num_rows($query)<1){
echo '<h1 style="color:orange;">no such record!</h1>';

}
//,email,gender,website,country,userlevel,activated
/*<script>document.getElementById("profile").style.display="none";</script>*/

$row = mysqli_fetch_row($query);

$img = $row[0];
$email = $row[1];
$gender = $row[2];
$website = $row[3];
$country = $row[4];
$birthday = $row[5];
?> 
<script type="text/javascript">
document.getElementById('profile_menu_right').className="active";
</script>
 <script src="script/friend.js"></script>

<div class="row" id="profile" style="margin-top:3%;">
  <div class="col-md-5">
  	 <a class="thumbnail" data-toggle="modal" data-target="#profilePicModal" href="" title="change profile picture">
     <img src="<?php echo $img; ?>" />
      <!-- 
       <img src="<?php //echo $img; ?>" usemap="#exmap"/>
      <map name="exmap">
         <area shape="rect" coords="0,150,200,200" data-toggle="modal" data-target="#profilePicModal" alt="profile picture" title="change profile picture">
      </map>-->
         </a>
     
     <div class="modal fade" id="profilePicModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title" id="myModalLabel">Change your profile picture</h4>
          </div>
          <div class="modal-body">
          	<form name="pp" action="pp_processing.php" method="post" enctype="multipart/form-data">
            <input type="file" name="pp_input" />
            <hr />
            <div align="right"><button type="submit" class="btn btn-primary" name="pp_submit">Save changes</button></div>  
            </form>
          </div>
        </div>
      </div>
    </div>
    
    
     
    	<div style="margin:3%" align="center">
        <?php 
			$sqlreqcheck = "SELECT * FROM friendrequest WHERE requester='$u_ses' AND requeste_to='$u'";
			$queryreqcheck = mysqli_query($db_conx,$sqlreqcheck);
			
			
			//need to code this is for when user requested person visit profile it should be accept request
			$sqlcuruserreqcheck = "SELECT * FROM friendrequest WHERE requester='$u' AND requeste_to='$u_ses'";
			$querycuruserreqcheck = mysqli_query($db_conx,$sqlcuruserreqcheck);
			
			if(mysqli_num_rows($queryreqcheck)>0){
					
			}
		?>
        
        <button class="btn btn-success btn-group-justified" id="friendbutton" <?php if(mysqli_num_rows($queryreqcheck)>0){  ?> disabled <?php } ?> onClick="document.getElementById('friendbutton').innerHTML='request sent';document.getElementById('friendbutton').disabled=true;sendfriendreq('<?php echo $u ?>')" <?php if($u==$u_ses){ ?> style="display:none"<?php } ?>><?php if(mysqli_num_rows($queryreqcheck)>0){  ?> Request Sent <?php }else if(mysqli_num_rows($querycuruserreqcheck)>0){
			?>Accept Request<?php }else{ ?>ADD FRIEND<?php } ?></button><br />
        <button class="btn btn-danger btn-group-justified" onClick="" <?php if($u==$u_ses){ ?> style="display:none"<?php } ?>><span class="fa fa-user-times"></span>&emsp;<span>BLOCK</span></button>
        
       
        
        </div>
   
    
    <div id="profile_details" class="well">
    	<div title="name" style="word-wrap:break-word"><span class="glyphicon glyphicon-user"></span>
		&nbsp;<?php echo $u; ?></div><hr />
        <div title="email" style="word-wrap:break-word"><span class="glyphicon glyphicon-envelope"></span>
		&nbsp;<?php echo $email; ?></div><hr />
        <div title="gender" style="word-wrap:break-word"><?php if($gender=='m'){echo '<i class="fa fa-male"></i>&nbsp;&nbsp;&nbsp;male';}else{ echo '<i class="fa fa-female"></i>&nbsp;&nbsp;female'; } ?></div><hr />
        <div title="website" style="word-wrap:break-word"><span class="glyphicon glyphicon-globe"></span>
		&nbsp;
		<?php if($website==""){echo "none";}else{ echo $website; }?></div><hr />
        <div title="country" style="word-wrap:break-word"><span class="glyphicon glyphicon-flag"></span>
		&nbsp;<?php echo $country; ?></div><hr />
        <div title="birthday" style="word-wrap:break-word"><i class="fa fa-birthday-cake"></i></span>
		&nbsp;<?php echo $birthday; ?></div>
    </div>
     
  </div>
  

  <div class="col-md-7" >
  <script type="text/javascript" src="script/update.js"></script>
 	<span id="recent"></span>
 <?php 
 	$sqlupdatesread = "SELECT `username`, `textupdate`, `posted_at`, `likes`, `id` FROM `textupdates` WHERE username='$u' ORDER BY `posted_at` DESC";
	
	$queryupdateread = mysqli_query($db_conx,$sqlupdatesread);
	$currYear = date('Y');
	$yearstart = '01-01-'.$currYear;
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
 
 
 		$updatetimearray = explode('-',$updatetime);
		$updatetimeyear = $updatetimearray[0];
		$updatetimemonth = $updatetimearray[1];
		$updatetimedate = $updatetimearray[2];
 		
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
	
				if(strtotime($updatetime)<strtotime($yearstart)){
					
	  ?>
      
      <span id="<?php echo 'startof'.$currYear ?>"></span>
     
      <?php  $currYear--;$yearstart = '01-01-'.$currYear; } ?>
        <div style="padding:0%" class="panel">
                  <h4 align="left" style="margin:1%;" class="panel-heading"><img style="border:solid #2B66F0 2px;" src="<?php echo $updaterimage ?>" width="7%" height="7%" /><?php 
                  echo ' by <a href="profile.php?u='.$updateuser.'" style="text-decoration:none;">'.$updateuser.'</a> on '.date('d M Y D',strtotime($updatetime)) ?></h4>
                  <div class="panel-body"> 
                  <h4 align="left" style="margin:1%"><?php echo $newupdatetext; 
				  //we need to make this null otherwise previous text will join this
				  $newupdatetext=""; ?></h4><br />
                  <img class="img-thumbnail" src="cp/Amazing Nature HD Wallpapers (6).jpg" style="display:none" />
                  </div><hr style="margin:0%" />
                 <div>
                 <h4 align="left" style="margin:2%;margin-left:5%"> <a style="text-decoration:none" onClick="textupdatelike(<?php echo $updateid ?>)"><span class="fa fa-thumbs-o-up" 
             
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
                   
                </div>
    
<?php } ?>

<?php 

 	$sqlsu = "SELECT signup FROM users WHERE username='$u'";
	$querysu = mysqli_query($db_conx,$sqlsu);
	
	$row = mysqli_fetch_row($querysu);
	$signupday = $row[0];
	
	$signuparray = explode('-',$signupday);
	$signupyear = $signuparray[0];
	$signpupmonth = $signuparray[1];
	$signpupdate = $signuparray[2];
	
?>
<span id="joint"></span>
	 <div style="padding:0%" class="panel">
     <h4 align="left" style="margin:1%;" class="panel-heading"><img style="border:solid #2B66F0 2px;" src="<?php echo $img ?>" width="7%" height="7%" />&nbsp;<?php echo date('d M Y D',strtotime($signupday)); ?></h4>
            <div class="thumbnail" align="center" style="font-size:120px;color:#4CD1EC;"> <span class="fa fa-group"></span> </div>
      <h3 align="center" style="color:#FF8587"><?php echo $u ?> Joint Muganool on this day<br /><?php echo date('d M Y D',strtotime($signupday)); ?></h3>            
        </div>
        
        
<span id="born"></span>

        <div style="padding:0%" class="panel">
             <h4 align="left" style="margin:1%;" class="panel-heading"><img style="border:solid #2B66F0 2px;" src="<?php echo $img ?>" width="7%" height="7%" />&nbsp;<?php echo date('d M Y D',strtotime($birthday)); ?></h4>
             <div class="thumbnail" align="center" style="font-size:120px;color:#4CD1EC;"> <span class="fa fa-birthday-cake"></span> </div>
      <h3 align="center" style="color:#FF8587"><?php echo $u ?> born on this day<br /><?php echo date('d M Y D',strtotime($birthday)) ?></h3>            
        </div>
	

 </div>
 
 <div id="timeScroller" style="position:fixed;top:100px;left:1180px;">
 <ul class="nav nav-pills nav-stacked" role="tablist">
 
 <li role="presentation" class="active" onClick="return false;" onMouseDown="autoScrollTo('recent');resetScroller('recent');"><a href="#">Recent</a></li>
 <?php 
	$curYear = date('Y');
	
	$scroller = 0;
	
	while($curYear > $signupyear){
		
 ?>
 
  <li role="presentation" onClick="return false;" onMouseDown="autoScrollTo('<?php echo 'startof'.$curYear; ?>');resetScroller('<?php echo 'startof'.$curYear; ?>');"><a href="#" ><?php echo $curYear;$curYear--; ?></a></li>

<?php } ?>
  
    <li role="presentation" onClick="return false;" onMouseDown="autoScrollTo('joint');resetScroller('joint');"><a href="#"><?php 
  	
	echo $signupyear;
   ?></a></li>
  
  <li role="presentation" onClick="return false;" onMouseDown="autoScrollTo('born');resetScroller('born');"><a href="#"><?php 
  	$bd = explode('-',$birthday);
	$birth_year = $bd[0];
	$month = $bd[1];
	$date = $bd[2];
  	
	echo $birth_year;
   ?></a></li>
   
   <li role="presentation" onClick="return false;" onMouseDown="autoScrollTo('empty');" style="display:none;"><a href="#"></a></li>
</ul>
 </div>
 
</div>

<div id="empty" style="margin-top:200px;"></div>
<?php include_once('.\templates\footer_tem.php'); ?>