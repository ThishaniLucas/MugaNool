<?php include_once('.\templates\db_conx.php'); ?>
<?php 

if(isset($_POST["usernamecheck"])){
	$user_name=$_POST['usernamecheck'];
	$sql = "SELECT id FROM users WHERE username='$user_name' LIMIT 1";	
	
	$query = mysqli_query($db_conx,$sql);
	$row_num = mysqli_num_rows($query);
	
	if($row_num <1){
		echo "<div class='bg-success'>'$user_name' is ok</div>";
		exit();
		}
	else{
		echo "<div class='bg-danger'>'$user_name' is already taken</div>";
		exit();
		}
	
	}
	
	
if(isset($_POST["emailcheck"])){
	$email=$_POST['emailcheck'];
	$sql = "SELECT id FROM users WHERE email='$email' LIMIT 1";	
	
	$query = mysqli_query($db_conx,$sql);
	$row_num = mysqli_num_rows($query);
	
	if($row_num <1){
		echo "<div class='bg-success'>'$email' is ok</div>";
		exit();
		}
	else{
		echo "<div class='bg-danger'>'$email' is already taken</div>";
		exit();
		}
	
	}
	
if(isset($_POST["u"])){
	$u=$_POST['u'];
	$e=$_POST['e'];
	$p=$_POST['p'];
	$g=$_POST['g'];
	$c=$_POST['c'];
	$b=$_POST['b'];
	
	//sanetizing username, email address and password
	//preg_replace("regular expression","replacement","variable to be looked");
	$u = preg_replace('#[^a-z0-9]#i','',$u);
	
	//mysqli_real_escape_string() will treat special characters as string
	$e = mysqli_real_escape_string($db_conx,$e);
	
	//hasing password using md5 encription techinique, but crypt() is always the better choice when encrypting
	$hashP = md5($p);
	
	//getenv or $_SERVER['REMOTE_ADDR'] to get ip address of the visitor
	//$ip = getenv('REMOTE_ADDR');
	$ip = preg_replace('#[^0-9.]#','',getenv('REMOTE_ADDR'));
	
	$sql2 = "SELECT id FROM users WHERE username='$u' LIMIT 1";	
	
	$query2 = mysqli_query($db_conx,$sql2);
	$row_num2 = mysqli_num_rows($query2);
	
	$sql3 = "SELECT id FROM users WHERE email='$e' LIMIT 1";	
	
	$query3 = mysqli_query($db_conx,$sql3);
	$row_num3 = mysqli_num_rows($query3);
	
	if($row_num2>0){
		echo 'username is already exist, try another username!';
		exit();
	}else if($row_num3>0){
		echo 'email is already exist, try another username!';
		exit();
	}else if(strlen($p)<8){
		echo 'password doesn\'t have required length!, atleast it should have 8 characters';
		exit();
	}else if(strlen($u)<3){
		echo 'username should have atleast 3 characters and atmost 32 characters!';
		exit();
	}else if(is_numeric($u[0])){
		echo 'username cannot begin with numbers';
		exit();
	}
	else{
		
		if($g=='m'){
		$img = mysqli_real_escape_string($db_conx,"img/avatar_male.png");	
		}else{
		$img = mysqli_real_escape_string($db_conx,"img/avatar_female.png");	
		}
		
	$sql1 = "INSERT INTO `users`(`username`, `email`, `password`, `gender`, `counry`, `signup`, `lastlogin`,`ip`,`avatar`) VALUES ('$u','$e','$hashP','$g','$c',NOW(),NOW(),'$ip','$img')";
	$query1 = mysqli_query($db_conx,$sql1);
	echo  "signup_success";
	exit();
	}
	}

?>

