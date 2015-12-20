
function sendfriendreq(f){
	ajax = ajaxObj("POST","http://localhost/SocialNetworkingApp/friendrequestsender.php");
	ajax.onreadystatechange = function(){
		if(ajaxReturn(ajax)==true){
			if(!ajax.responseText=='request_send'){		
			alert("request send failed");	
			}		
		}	
	}
	ajax.send("f="+f);
}