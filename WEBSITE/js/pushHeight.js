// pushes the length of the content panel down to the footer

document.addEventListener("DOMContentLoaded", function(){
	var minHeight = 800;
	
	var pushCols = function() {
		document.getElementById("left").style.height = element.style.height;
		document.getElementById("center").style.height = element.style.height;
		document.getElementById("right").style.height = element.style.height;
	}
	
	var element = document.getElementsByClassName("content")[0];
	element.style.height = 0;
	var space = window.innerHeight - element.offsetTop;
	if(space > minHeight)
		element.style.height = space + "px";
	else
		element.style.height = minHeight + "px"
	
	pushCols();
	
	window.onresize = function(){
		space = window.innerHeight - element.offsetTop;
		
		if(space > minHeight)
			element.style.height = space + "px";
		else
			element.style.height = minHeight;
			
		pushCols();
	}
});

// expands songs to fill grown space
var pushSongs = function(){
	var minHeight = 800;
	var element = document.getElementsByClassName("content")[0];
	var space = window.innerHeight - element.offsetTop;
	

	var songs = document.getElementsByClassName("song")
	var offset = 215;
	var minSongHeight = minHeight - offset;
	var songHeight = space - offset;
	
	if(songs.length == 2){
		if(songHeight > minSongHeight){
			songs[0].style.height = songHeight + "px";
			songs[1].style.height = songHeight + "px";
		}
		else{
			songs[0].style.height = minSongHeight + "px";
			songs[1].style.height = minSongHeight + "px";
		}
	}		
	else if(songs.length == 1){
		if(songHeight > minSongHeight)
			songs[0].style.height = songHeight + "px";
		else
			songs[0].style.height = minSongHeight + "px";
	}
}