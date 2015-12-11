function restrict(e){
	var tf = document.getElementById(e);
	var rx = new RegExp();
	
	if(e == "Email"){
		rx = /[' "]/gi;//rx = ',",space
		}
	else if(e == "User_Name"){
		rx = /[^a-z0-9]/gi; // rx = characters other than 0-9,a-z-,A-Z
		}
		
		tf.value = tf.value.replace(rx,""); // will replace charctrs in rx with null value
	}
	
function emptyDivElement(e){
	document.getElementById(e).innerHTML="";
	document.getElementById(e).style.display="none";
	}

function emptyTfElement(e){
	document.getElementById(e).value="";
	}

function checkEmail(){
	
	var e = document.getElementById("Email").value;
	if(e != ""){
		var es = document.getElementById("emailstatus");
		
		
		var ajax = ajaxObj("POST","http://localhost/SocialNetworkingApp/signupcheck.php");
		ajax.onreadystatechange = function(){
			if(ajaxReturn(ajax)==true){
					es.innerHTML = ajax.responseText;
					es.style.display="inline";
				}
			}
			ajax.send("emailcheck="+e);
		}
	}
		
function checkUserName(){
	
	var u = document.getElementById("User_Name").value;
	if(u != ""){
		var us = document.getElementById("unamestatus");
		
		var ajax = ajaxObj("POST","http://localhost/SocialNetworkingApp/signupcheck.php");
		ajax.onreadystatechange = function(){
			if(ajaxReturn(ajax)==true){
					us.innerHTML = ajax.responseText;
					us.style.display="inline";
				}
			}
			ajax.send("usernamecheck="+u);
		}
	}

function passwordStrength(){
	
	var p = document.getElementById("Password");
	var ps = document.getElementById("passstatus");
	
	//alert(p.value.length);
	
	if(p.value.length<8){
		p.style.backgroundColor="orange";
		p.style.color="white";
		ps.innerHTML = "password is weak!";
		ps.style.display="inline";
		} 
		else{
			ps.innerHTML = "";
			ps.style.display="none";
			p.style.backgroundColor="green";
			}
	}

function passwordcheck(){
	var p = document.getElementById("Password");
	var ps = document.getElementById("passstatus");
	
	var cp = document.getElementById("Confirm_Password");
	var cps = document.getElementById("conpassstatus");
	
	if(p.value != cp.value){
		cp.style.backgroundColor="red";
		cp.style.color="white";
		cps.innerHTML = "password is not same!";
		cps.style.display="inline";
	}
	else{
		cp.style.backgroundColor="green";
		cp.style.color="white";
		cps.style.display ="none";
		}
}

function signup(){
	var u = document.getElementById("User_Name");
	var us = document.getElementById("unamestatus");
	
	var e = document.getElementById("Email");
	var es = document.getElementById("emailstatus");
	
	var p = document.getElementById("Password");
	var ps = document.getElementById("passstatus");
	
	var cp = document.getElementById("Confirm_Password");
	var cps = document.getElementById("conpassstatus");
	
	var g = document.getElementById("gender");
	var gs = document.getElementById("genstatus");

	var c = document.getElementById("country");
	var cs = document.getElementById("countrystatus");	
	
	var b = document.getElementById("Birthday");
	var bs = document.getElementById("Birthdaystatus");	
	
	var but = document.getElementById("signupSubmit");
	
	
	
		if(u.value=="" || e.value=="" || p.value=="" || cp.value=="" || g.value=="" || c.value=="" || b.value==""){
			emptyTfElement('Password');
			emptyTfElement('Confirm_Password');	
			window.scrollTo(0,0);
			document.getElementById("error1_alert").innerHTML ="Error on login, Fillout all data!!!";
			document.getElementById("error1_alert").style.display="block";
			}
		else if(p.value != cp.value){
			emptyTfElement('Password');
			emptyTfElement('Confirm_Password');	
			window.scrollTo(0,0);
			document.getElementById("error1_alert").innerHTML ="Error on login, Password Confirmation failed!!!";
			document.getElementById("error1_alert").style.display="block";
			}
		else{
			but.disabled = true;
			but.innerHTML="please wait..."
			
			var ajax = ajaxObj("POST","http://localhost/SocialNetworkingApp/signupcheck.php");
			ajax.onreadystatechange = function(){
			if(ajaxReturn(ajax)==true){
					if(ajax.responseText == "signup_success"){
							window.location="http://localhost/SocialNetworkingApp/index.php?u="+u.value;
							
					}else{
							window.scrollTo(0,0);
							document.getElementById("error1_alert").innerHTML =ajax.responseText;
							document.getElementById("error1_alert").style.display="block";
							but.disabled = false;
							but.innerHTML="Signup";
					}
				}
			}
			ajax.send("u="+u.value+"&e="+e.value+"&p="+p.value+"&g="+g.value+"&c="+c.value+"&b="+b.value);
			//window.location="http://localhost/SocialNetworkingApp/signupcheck.php";
			}
	}
	
