window.onload = function() {
	var leftHeight = document.getElementById("left").clientHeight;
	var centerHeight = document.getElementById("center").clientHeight;
	var rightHeight = document.getElementById("right").clientHeight;
	var biggest = Math.max(leftHeight,centerHeight,rightHeight);
	if(biggest === leftHeight) {
		document.getElementById("center").style.height = leftHeight + "px";
		document.getElementById("right").style.height = leftHeight + "px";  
	}
	else if(biggest === centerHeight) {
		document.getElementById("left").style.height = centerHeight + "px";
		document.getElementById("right").style.height = centerHeight + "px";
	}
	else {
		document.getElementById("left").style.height = rightHeight + "px";
		document.getElementById("center").style.height = rightHeight + "px";
	}
}