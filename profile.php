<?php include_once('.\templates\header_tem.php'); ?>
<?php include_once('.\templates\menu_item.php'); ?>
<?php include('.\templates\db_conx.php'); ?>

<?php 
$u = $_GET["u"];
$sql ="SELECT avatar,email,gender,website,counry FROM users WHERE username='$u'";
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
?> 
<div class="row" id="profile" style="margin-top:3%;">
  <div class="col-md-4">
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
        <div title="gender"><span class="glyphicon glyphicon-user"></span>
		&nbsp;<?php if($gender=='m'){echo "male";}else{ echo "female"; } ?></div><hr />
        <div title="website"><span class="glyphicon glyphicon-globe"></span>
		&nbsp;
		<?php if($website==""){echo "none";}else{ echo $website; }?></div><hr />
        <div title="country"><span class="glyphicon glyphicon-flag"></span>
		&nbsp;<?php echo $country; ?></div>
    </div>
     
  </div>
  

  <div class="col-md-7 well" >
  	<div class="jumbotron">
      <h1>Hello, world!</h1>
      <p><a class="btn btn-primary btn-lg" href="#" role="button"><span class="glyphicon glyphicon-heart"></span> </a>
      <a class="btn btn-primary btn-lg" href="#" role="button"></span> <span class="glyphicon glyphicon-comment"></span></a></p>
    </div>
    
    <div class="jumbotron">
      <h1>Hello, world!</h1>
      <p><a class="btn btn-primary btn-lg" href="#" role="button"><span class="glyphicon glyphicon-heart"></span> </a>
      <a class="btn btn-primary btn-lg" href="#" role="button"></span> <span class="glyphicon glyphicon-comment"></span></a></p>
    </div>

<div class="jumbotron">
      <h1>Hello, world!</h1>
      <p><a class="btn btn-primary btn-lg" href="#" role="button"><span class="glyphicon glyphicon-heart"></span> </a>
      <a class="btn btn-primary btn-lg" href="#" role="button"></span> <span class="glyphicon glyphicon-comment"></span></a></p>
    </div>
    
    <div class="jumbotron">
      <h1>Hello, world!</h1>
      <p><a class="btn btn-primary btn-lg" href="#" role="button"><span class="glyphicon glyphicon-heart"></span> </a>
      <a class="btn btn-primary btn-lg" href="#" role="button"></span> <span class="glyphicon glyphicon-comment"></span></a></p>
    </div>

 </div>
 
 <div class="col-md-1" >
 
 </div>
 
</div>


<?php include_once('.\templates\footer_tem.php'); ?>