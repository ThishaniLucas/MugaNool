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
<div class="row" id="profile" style="margin-top:3%;">
  <div class="col-md-5">
  	 <a class="thumbnail">
      <img src="<?php echo $img; ?>" usemap="#exmap"/>
      <map name="exmap">
         <area shape="rect" coords="0,150,200,200" data-toggle="modal" data-target="#profilePicModal" alt="profile picture" title="change profile picture">
      </map>
         </a>
     
     <div class="modal fade" id="profilePicModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title" id="myModalLabel">Change your profile picture</h4>
          </div>
          <div class="modal-body">
          	<form name="pp">
            <input type="file" />
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
    
    <div id="profile_details" class="well">
    	<div title="name"><span class="glyphicon glyphicon-user"></span>
		&nbsp;<?php echo $u; ?></div><hr />
        <div title="email"><span class="glyphicon glyphicon-envelope"></span>
		&nbsp;<?php echo $email; ?></div><hr />
        <div title="gender"><?php if($gender=='m'){echo '<i class="fa fa-male"></i>&nbsp;&nbsp;&nbsp;male';}else{ echo '<i class="fa fa-female"></i>&nbsp;&nbsp;female'; } ?></div><hr />
        <div title="website"><span class="glyphicon glyphicon-globe"></span>
		&nbsp;
		<?php if($website==""){echo "none";}else{ echo $website; }?></div><hr />
        <div title="country"><span class="glyphicon glyphicon-flag"></span>
		&nbsp;<?php echo $country; ?></div><hr />
        <div title="birthday"><i class="fa fa-birthday-cake"></i></span>
		&nbsp;<?php echo $birthday; ?></div>
    </div>
     
  </div>
  

  <div class="col-md-7" >
 	<span id="recent"></span>
 <?php for($i=0;$i<50;$i++) {
	 	if($i%10 == 0){
	  ?>
      
      <span id="<?php echo 'group'.$i ?>"></span>
      
      <?php } ?>
  	<div class="jumbotron">
      <h1 style="padding:5%;">Hello, world!</h1>
      <p style="padding:5%;"><a class="btn btn-primary btn-lg" href="#" role="button"><span class="glyphicon glyphicon-heart"></span> </a>
      <a class="btn btn-primary btn-lg" href="#" role="button"></span> <span class="glyphicon glyphicon-comment"></span></a></p>
    </div>
    
<?php } ?>
	<span id="born"></span>
	<div class="jumbotron">
    	<div class="thumbnail" align="center" style="font-size:120px;color:#4CD1EC;"> <span class="fa fa-birthday-cake"></span> </div>
      <h3 align="center" style="color:#FF8587"><?php echo $u ?> born on this day<br /><?php echo $birthday ?></h3>
    </div>

 </div>
 
 <div id="timeScroller" style="position:fixed;top:100px;left:1180px;">
 <ul class="nav nav-pills nav-stacked" role="tablist">
 
 <li role="presentation" class="active" onClick="return false;" onMouseDown="autoScrollTo('recent');resetScroller('recent');"><a href="#">Recent</a></li>
 <?php 
 	$sqlsu = "SELECT signup FROM users WHERE username='$u'";
	$querysu = mysqli_query($db_conx,$sqlsu);
	
	$row = mysqli_fetch_row($querysu);
	$signupdate = $row[0];
	
	$signuparray = explode('-',$signupdate);
	$signupyear = $signuparray[0];
	$signpupmonth = $signuparray[1];
	$signpupdate = $signuparray[2];
	
	$curYear = date('Y');
	
	$scroller = 0;
	
	while($curYear >= $signupyear){
		
 ?>
 
  <li role="presentation" onClick="return false;" onMouseDown="autoScrollTo('<?php echo 'group'.$scroller; ?>');resetScroller('<?php echo 'group'.$scroller;$scroller+=10; ?>');"><a href="#" ><?php echo $curYear;$curYear--; ?></a></li>

<?php } ?>
  
  <li role="presentation" onClick="return false;" onMouseDown="autoScrollTo('born');"><a href="#"><?php 
  	$bd = explode('-',$birthday);
	$birth_year = $bd[0];
	$month = $bd[1];
	$date = $bd[2];
  	
	echo $birth_year;
   ?></a></li>
</ul>
 </div>
 
</div>


<?php include_once('.\templates\footer_tem.php'); ?>