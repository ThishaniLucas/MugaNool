
function inserticon(i,uid){
	var textbox = document.getElementById('comment_box'+uid);
	var textxomment = textbox.value;
	if(i=="arrow-left"){
		textbox.value = textxomment+"\n";
		
		}else if(i=="thumbs-up"){
		textbox.value = textxomment+"`thums-up`";
		}else if(i=="thumbs-down"){
		textbox.value = textxomment+"`thums-down`";
		}
	//textbox.value=textxomment+'<div style="color: blue; font-size:50px;" align="center" class="glyphicon glyphicon-'+i+'"></div>';
			//textbox.disabled=true;
		
	
	}


function comment_ex(id){
	
	var exlink = document.getElementById('expandlink'+id);
	var relink = document.getElementById('retractlink'+id);
	

	exlink.style.display="none";
	relink.style.display="inline";

	}
	
function comment_re(id){
	
	var exlink = document.getElementById('expandlink'+id);
	var relink = document.getElementById('retractlink'+id);
	
	exlink.style.display="inline";
	relink.style.display="none";
	}

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

function textupdatelike(id){
	
	var like = document.getElementById("liketextupdate"+id);
	var liked = document.getElementById("likedtextupdate"+id);
	var likeamount = document.getElementById("likesamount"+id);
	ajax = ajaxObj("POST","http://localhost/SocialNetworkingApp/textupdatelikeprocessing.php");
	ajax.onreadystatechange = function(){
		if(ajaxReturn(ajax)==true){
			like.style.display="none";
			liked.style.display="inline";
			likeamount.innerHTML=ajax.responseText;
		}	
	}
	ajax.send("id="+id);
	
}

function textupdateunlike(id){
	
	var like = document.getElementById("liketextupdate"+id);
	var liked = document.getElementById("likedtextupdate"+id);
	var likeamount = document.getElementById("likesamount"+id);
	ajax = ajaxObj("POST","http://localhost/SocialNetworkingApp/textupdateunlikeprocessing.php");
	ajax.onreadystatechange = function(){
		if(ajaxReturn(ajax)==true){
				liked.style.display="none";
				like.style.display="inline";
				likeamount.innerHTML=ajax.responseText;
			}
		}	
	
	ajax.send("id="+id);
}