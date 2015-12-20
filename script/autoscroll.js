var scrolly = 0;// number of the pixel to be moved
var distance = 40;// no of pixel per function call
var speed = 15; // speed of settimeout method
//alert("auto scroll");
function autoScrollTo(e){
	var currentY = window.pageYOffset; // current position of us in the browser
	var targetY = document.getElementById(e).offsetTop; // top pixel number of the selected element
	var bodyHeight = document.body.offsetHeight; //height of body
	
	//window.innerHeight ---> 
	var yPos = currentY+ window.innerHeight;
	var animator = setTimeout('autoScrollTo(\''+e+'\')',speed);
	
	//when ypos reach end of page we should get rid of scrolling
	if(yPos > bodyHeight){
		clearTimeout(animator);
		}
	else{
		if(currentY < targetY - distance){
			scrolly = currentY+ distance;
			window.scroll(0,scrolly);
			}
		else{
			clearTimeout(animator);
			}
		}
	}
	
function resetScroller(e){
	var currentY = window.pageYOffset; // current position of us in the browser
	var targetY = document.getElementById(e).offsetTop; // top pixel number of the selected element
	
	var animator = setTimeout('resetScroller(\''+e+'\')',speed);
	
	if(currentY > targetY){
		scrolly = currentY - distance;
		window.scroll(0,scrolly);
		}
	else{
		clearTimeout(animator);
		}
	
	}