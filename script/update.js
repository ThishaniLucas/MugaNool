

function textupdatefunc(){

	var textarea = document.getElementById("textupdateinput");
	var textupdateform = document.getElementById("textupdate"); 
	var textsubmit = document.getElementById("textsubmit"); 
	
	
	
	
	ajax = ajaxObj("POST","http://localhost/SocialNetworkingApp/textupdateprocessing.php");
	ajax.onreadystatechange = function(){
		if(ajaxReturn(ajax)==true){
			if(ajax.responseText=='updated'){
				window.location="http://localhost/SocialNetworkingApp/index.php";	
			}
			textupdateform.innerHTML=ajax.responseText;
		}	
	}
	ajax.send("tc="+textarea.value);
	
}