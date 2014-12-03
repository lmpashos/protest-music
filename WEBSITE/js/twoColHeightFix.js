window.onload = function() {
	var leftHeight = document.getElementById("left").clientHeight;
	var centerHeight = document.getElementById("center").clientHeight;
	var biggest = Math.max(leftHeight,centerHeight);
	if(biggest === leftHeight)
		document.getElementById("center").style.height = leftHeight + "px";
	else if(biggest === centerHeight)
		document.getElementById("left").style.height = centerHeight + "px";
}