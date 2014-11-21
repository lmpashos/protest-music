// Handles the side menu on the about page
document.addEventListener("DOMContentLoaded", function() {
	var top = 100;
	var elements = document.getElementsByTagName("ul");
	
	// will have to change this if another ul is added
	var list = elements[5];
	
	window.addEventListener("scroll", function(){
		var scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
			
		if(scrollTop > top && list.className == "absolute")
    		list.className="fixed";
		else if(scrollTop < top && list.className =="fixed")
    		list.className="absolute";
		
		// fixes the width of the ul and a few other bugs
		var leftWidth = document.getElementById("left").clientWidth;
		list.style.width = leftWidth + "px";
		list.style.paddingLeft = 0;
		var children = list.children;
		for(var i = 0; i < children.length; i++)
			children[i].style.marginLeft = -6 + "px"
	});
});