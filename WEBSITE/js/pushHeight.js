// pushes the length of the content panel down to the footer
// this document is buggy, but it kinda works...

document.addEventListener("DOMContentLoaded", function(){
	var pushCols = function(){
		document.getElementById("left").style.height = element.style.height;
		document.getElementById("center").style.height = element.style.height;
		document.getElementById("right").style.height = element.style.height;
	}
	
	var element = document.getElementsByClassName("content")[0];
	var space = window.innerHeight - element.offsetTop;
	if(window.innerHeight > 800){
		element.style.height = space + "px";
		pushCols();
	}
	
	window.onresize = function(){
		if(window.innerHeight > 800){
			space = window.innerHeight - element.offsetTop;
			element.style.height = space + "px";
			pushCols();
		}
	}
	
	// expands songs to fill grown space
	var pushSongs = function(){
		var songs = document.getElementsByClassName("song")
		
		if(songs.length == 2){
			if(space > 0){
				songs[0].style.height = space - 223 + "px";
				songs[1].style.height = space - 223 + "px";
			}
		}		
		else if(songs.length == 1){
			if(space > 0){
				songs[0].style.height = space - 223 + "px";
			}
		}
	}
	// this is not ideal, but its all i could manage
	window.onmousemove = function(){
		if (window.innerHeight > 800)
			pushSongs();
	}
});
