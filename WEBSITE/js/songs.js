// Show or hide songs user clicks on

document.addEventListener('DOMContentLoaded', function() {
	  
	  var lastProtest;
	  
	  var protestPanel = document.getElementById("left");
	  var protestList = left.getElementsByTagName("li");
	  for(var i = 0; i < protestList.length; i++){
		  protestList[i].addEventListener("click", function(){
			  var clicked = this.getAttribute("id");
			  clicked += "Song";
			  var songs = document.getElementById("protest");
			  var songList = songs.getElementsByClassName("song");
			  for(var j = 0; j < songList.length; j++){
				  if(lastProtest != null && songList[j].getAttribute("id") == clicked){
					  if(lastProtest == songList[j]){
						  songList[j].style.display = "none";
						  lastProtest = null;
					  }
					  else{
					  	  songList[j].style.display = "block";
					      lastProtest.style.display = "none";
					  	  lastProtest = songList[j];
					  }
				  }
				  else if(songList[j].getAttribute("id") == clicked){
					  songList[j].style.display = "block";
					  lastProtest = songList[j];
				  }
			  }
		  })
		  protestList[i].addEventListener("mouseover", function(){
			  this.style.backgroundColor = "black";
		  })
		  protestList[i].addEventListener("mouseout", function(){
			  this.style.backgroundColor = "inherit";
		  })
	  }
	  
	  var lastNormal;
	  
	  var normalPanel = document.getElementById("right");
	  var normalList = normalPanel.getElementsByTagName("li");
	  for(var i = 0; i < normalList.length; i++){
		  normalList[i].addEventListener("click", function(){
			  var clicked = this.getAttribute("id");
			  clicked += "Song";
			  var songs = document.getElementById("normal");
			  var songList = songs.getElementsByClassName("song");
			  for(var j = 0; j < songList.length; j++){
				  if(lastNormal != null && songList[j].getAttribute("id") == clicked){
					  if(lastNormal == songList[j]){
						  songList[j].style.display = "none";
						  lastNormal = null;
					  }
					  else{
					  	  songList[j].style.display = "block";
					      lastNormal.style.display = "none";
					  	  lastNormal = songList[j];
					  }
				  }
				  else if(songList[j].getAttribute("id") == clicked){
					  songList[j].style.display = "block";
					  lastNormal = songList[j];
				  }
			  }
		  })
		  normalList[i].addEventListener("mouseover", function(){
			  this.style.backgroundColor = "black";
		  })
		  normalList[i].addEventListener("mouseout", function(){
			  this.style.backgroundColor = "inherit";
		  })
	  }
});