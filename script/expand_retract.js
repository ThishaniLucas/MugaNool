//alert("expand and retract");

function expand(e){
	
	//getting the element object
	var target = document.getElementById(e);
	
	//height of element at a specific time
	var h = target.offsetHeight;
	
	//height of the contents in an object
	var sh = target.scrollHeight;
	
	var loopTimer = setTimeout('expand(\''+e+'\')',8);
	
	if(h<sh){
		h += 5;
		}
	else{
		clearTimeout(loopTimer);		
	}
	
	target.style.height = h+"px";
	
	}
	

function retract(e){
	var target = document.getElementById(e);
	
	var h = target.offsetHeight;
	
	var loopTimer = setTimeout('retract(\''+e+'\')',8);
	
	if(h>27){
		h -= 5;
		}
	else{
		target.style.height = "0px";
		clearTimeout(loopTimer);
		}
		
	target.style.height = h+"px";
	
	}