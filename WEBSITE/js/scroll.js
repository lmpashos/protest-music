window.addEventListener("scroll", function() {
    var top = 100;
	
	var lastScrollLeft = 0;

    var documentScrollLeft = $(document).scrollLeft();
    if (lastScrollLeft != documentScrollLeft) {
        lastScrollLeft = documentScrollLeft;
    }
	
	if (lastScrollLeft == 0){
		var list = document.querySelectorAll("#left > ul");  
		var scrollTop = document.documentElement.scrollTop || document.body.scrollTop;	  
		if(scrollTop > top && list[0].className == "absolute") {
		  list[0].className="fixed";
		} else if(scrollTop < top && list[0].className =="fixed") {
		  list[0].className="absolute";
		}
		// fixes the width of the ul and a few other bugs
		var leftWidth = document.getElementById("left").clientWidth;
		list[0].style.width = leftWidth + "px";
		list[0].style.paddingLeft = 0;
		var children = list[0].children;
		for(var i = 0; i < children.length; ++i) {
		  children[i].style.marginLeft = -6 + "px"
		}
	}
	else {
		var list = document.querySelectorAll("#left > ul");
		list[0].className="absolute";
	}
	
});