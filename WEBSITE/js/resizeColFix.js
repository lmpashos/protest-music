// fixes a bug on about page where column lengths don't match on page resize
document.addEventListener("DOMContentLoaded", function() {
	window.onresize = function(){
        var centerHeight = document.getElementById("center").clientHeight;
		document.getElementById("left").style.height = centerHeight + "px";
	}
});