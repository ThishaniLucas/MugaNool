<?php 
session_start();
include('.\templates\user_session_set.php');
include('.\templates\db_conx.php');

$user = $_SESSION["user_logged"];

if(isset($_POST["pp_submit"])){
	if(!file_exists("pp/".$user."/")){
	mkdir("pp/".$user."/");
	}
	
$target_dir = "pp/$user/";
$target_file = $target_dir . basename($_FILES["pp_input"]["name"]);
if (move_uploaded_file($_FILES["pp_input"]["tmp_name"], $target_file)) {
		$sqlupl = "UPDATE users SET avatar='$target_file' WHERE username='$user'";
		$queryupl = mysqli_query($db_conx,$sqlupl);
		header("Location: http://localhost/SocialNetworkingApp/profile.php?u=".$user);
		exit();
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
 	}
?>