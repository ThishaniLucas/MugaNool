//alert('hello');

function logincheck(){
	var EOU = document.getElementById('EOU');
	var Password1 = document.getElementById('Password1');
	var chkbox = document.getElementById('chkbox');
	var login_button = document.getElementById('login_button');
		//check for null
	if(chkbox.checked){
		chkbox.value = "ticked";
	}else{
		chkbox.value = "not ticket";
	}
	
	
	if(EOU.value=="" || Password1.value == ""){
		document.getElementById("error1_alert").innerHTML ="enter username or email and password to login!";
		document.getElementById("error1_alert").style.display="block";
		//refresh the same page
		//location.reload();
	}
	else{
		
		var ajax = ajaxObj("POST","http://localhost/SocialNetworkingApp/logincheck.php");
		ajax.onreadystatechange=function(){
		if(ajaxReturn(ajax)){
				if(ajax.response=="you are not registered yet!" || ajax.response=="your account is not activated yet, first activate your account and then login" || ajax.response=="your username and password not matched!"){
				document.getElementById("error1_alert").innerHTML =ajax.responseText;
				document.getElementById("error1_alert").style.display="block";
				}else{
					window.location="http://localhost/SocialNetworkingApp/profile.php?u="+ajax.responseText;	
				}
			}		
		}
		
		ajax.send("uoe="+EOU.value+"&p="+Password1.value+"&c="+chkbox.value);
		
	}
}

