/*
 * Copyright (C) 2014 University of Pittsburgh
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

/*
 * Note: Much of the code here was taken from http://www.hunlock.com/blogs/The_Ultimate_Ajax_Object
 * The blog shows how to create an AJAX object -- something that has become "under the hood" now that 
 * we use Javascript frameworks like Dojotoolkit, JQuery, etc
 */

// Create an AJAX request object. Try to create the most modern borwser compatible object first and
// on failures, try creating older IE versions
function createXHR() {
   try { 
     return new XMLHttpRequest(); 
   } catch(e) {}
   try { 
     return new ActiveXObject("Msxml2.XMLHTTP.6.0"); 
   } catch (e) {}
   try { 
     return new ActiveXObject("Msxml2.XMLHTTP.3.0"); 
   } catch (e) {}
   try { 
     return new ActiveXObject("Msxml2.XMLHTTP"); 
   } catch (e) {}
   try { 
     return new ActiveXObject("Microsoft.XMLHTTP"); 
   } catch (e) {}
 
   return null;
}

/**
 * Create an AJAX object that can be used to make requests. 
 * The callback function will be assinged to thte Request object's onreadystatechane event.
 * However it will only execute when the readyState == 4 (complete)
 */
function ajaxObject(url, callbackFunction) {
  var that = this;      
  this.updating = false;
  
  this.abort = function() {
    if(that.updating) {
      that.updating = false;
      that.AJAX.abort();
      that.AJAX = null;
    }
  }
  
  this.update = function(passData, postMethod) { 
    if(that.updating) { 
      return false; 
    }
    
    that.AJAX = createXHR();                          
                                               
    if(that.AJAX == null) {                             
      return false;                               
    } else {
      that.AJAX.onreadystatechange = function() {  
        if(that.AJAX.readyState == 4 ) {             
          that.updating = false;                
          that.callback(that.AJAX.responseText, that.AJAX.status, that.AJAX.responseXML);        
          that.AJAX = null;                                         
        }                                                      
      }  
      
      that.updating = new Date();                              
      if(/post/i.test(postMethod)) {
        var uri = urlCall +'?' + that.updating.getTime();
        that.AJAX.open("POST", uri, true);
        that.AJAX.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        that.AJAX.setRequestHeader("Content-Length", passData.length);
        that.AJAX.send(passData);
      } else {
        var uri=urlCall + "?" + passData + "&timestamp=" + (that.updating.getTime()); 
        that.AJAX.open("GET", uri, true);                             
        that.AJAX.send(null);                                         
      }              
      return true;                                             
    }                                                                           
  }
  
  var urlCall = url;        
  this.callback = callbackFunction || function () { };
}

document.addEventListener("DOMContentLoaded", function() {
  
  var minHeight = 800;
  resizeColumns();
  
  //Spacing on Song part
  // expands songs to fill grown space
  var pushSongs = function() {
    var songs = document.getElementsByClassName("song");
    var contentDiv = document.getElementsByClassName("content")[0];
    var space = window.innerHeight - contentDiv.offsetTop;
    var offset = 215;
    var minSongHeight = minHeight - offset;
    var songHeight = space - offset;
    
    if(songs.length == 2) {
      if(songHeight > minSongHeight){
        songs[0].style.height = songHeight + "px";
        songs[1].style.height = songHeight + "px";
      } else {
        songs[0].style.height = minSongHeight + "px";
        songs[1].style.height = minSongHeight + "px";
      }
    } else if(songs.length == 1) {
      if(songHeight > minSongHeight) {
        songs[0].style.height = songHeight + "px";
      } else {
        songs[0].style.height = minSongHeight + "px";
      }
    }
    
  }
  
  function resizeColumns() {
    
    var wrapperDiv = document.querySelectorAll("div.wrapper")[0];
    var menuDiv = document.querySelectorAll("div.menu")[0];
    var footerDiv = document.querySelectorAll("div.footer")[0];
    var wrapperDivHeight = wrapperDiv.clientHeight;
    var menuDivHeight = menuDiv.clientHeight;
    var footerDivHeight = footerDiv.clientHeight;

    var contentHeight = wrapperDivHeight - menuDivHeight - footerDivHeight;

    document.getElementById("center").style.height = contentHeight + "px";
    document.getElementById("left").style.height = contentHeight + "px";
    document.getElementById("right").style.height = contentHeight + "px";
  }
  
  window.addEventListener("resize", function() {
    var list = document.querySelectorAll("#left > ul");
    list[0].style.width = document.getElementById("left").clientWidth + "px";
    list = document.querySelectorAll("#right > ul");
    list[0].style.width = document.getElementById("right").clientWidth + "px";
    
    resizeColumns();
    pushSongs();
  });
  

  //Protest Side
  var protestPanel = document.getElementById("left");
  var protestList = left.getElementsByTagName("li");
  
  var currentProtestSong = "NONE";  
  var isProtestPOSDisplay = false;
  
  //Set up the right-hand menu
  for(var i = 0; i < protestList.length; ++i) {
    protestList[i].addEventListener("click", function() {
      //Remove the placeholder if it is still there
      if(document.getElementById("placeholder") != null) {
        document.getElementById("center").removeChild(document.getElementById("placeholder"));
      }
      
      //Hide the popup if necessary, reset all of the highlights, and uncheck all POS checkboxes
      hideLeftCheckboxPanel();
      isProtestPOSDisplay = false;
      turnOffHighlights("all", true);
      uncheckAllCheckbox("protest_class");
      
      var songXMLFileName = this.getAttribute("id");
      if(songXMLFileName === currentProtestSong) {
        document.getElementById("protest").innerHTML = null;
        currentProtestSong = "NONE";
      } else {
        var protestSongRequest = new ajaxObject("get_html_song.php", function(responseText, responseStatus, responseXML) {
          if(responseStatus == 200) {
            document.getElementById("protest").innerHTML = responseText;
            //Resize the song to fill in the space
            pushSongs();
          }
        });
        protestSongRequest.update("song_filename=" + songXMLFileName);
        currentProtestSong = songXMLFileName;
      }

    });
    
    protestList[i].addEventListener("mouseover", function(){
      this.style.backgroundColor = "black";
    });
    
    protestList[i].addEventListener("mouseout", function(){
      this.style.backgroundColor = "inherit";
    });
  }
  
  //Handle the popups for the Parts of Speech
  var protestPOSToggleBtn = document.getElementById("toggle_protest_pos");
  
  protestPOSToggleBtn.addEventListener("click", function(e) {
    if(isProtestPOSDisplay) {
      hideLeftCheckboxPanel();
      isProtestPOSDisplay = false;
    } else {
      showLeftCheckboxPanel(e);
      isProtestPOSDisplay = true;
    }
  });
  
  //Add click handlers to the elements on the protestPOS popup
  var inputs = document.getElementsByName("protest_class");
  for(var i = 0; i < inputs.length; ++i) {
    
    inputs[i].addEventListener("click", function() {
      var classValue = this.value;
      if(this.checked === true) {
        turnOnHighlights(classValue, true);
      } else {
        turnOffHighlights(classValue, true);
      }
      // fixes noun phrase background
      if(inputs[0].checked === true && inputs[4].checked === true) {
      	turnOnHighlightsSpecialCase(inputs[4].value, true);
      } else if(inputs[0].checked === false && inputs[4].checked === true) {
      	turnOffHighlightsSpecialCase(inputs[4].value, true);
      }

      if(inputs[0].checked === true && inputs[5].checked === true) {
      	turnOnHighlightsSpecialCase(inputs[5].value, true);
      } else if(inputs[0].checked === false && inputs[5].checked === true) {
      	turnOffHighlightsSpecialCase(inputs[5].value, true);
      }

      if(inputs[0].checked === true && inputs[6].checked === true) {
      	turnOnHighlightsSpecialCase(inputs[6].value, true);
      } else if(inputs[0].checked === false && inputs[6].checked === true) {
      	turnOffHighlightsSpecialCase(inputs[6].value, true);
      }

      if(inputs[0].checked === true && inputs[8].checked === true) {
      	turnOnHighlightsSpecialCase(inputs[8].value, true);
      } else if(inputs[0].checked === false && inputs[8].checked === true) {
      	turnOffHighlightsSpecialCase(inputs[8].value, true);
      }

    });
  }
  
  //Add events to the Clear and Done buttons
  var inputButton = document.getElementById("protest_clear");
  inputButton.addEventListener("click", function() {
    turnOffHighlights("all", true);
    uncheckAllCheckbox("protest_class");
  });
  
  inputButton = document.getElementById("protest_done");
  inputButton.addEventListener("click", function() {
    hideLeftCheckboxPanel();
    isProtestPOSDisplay = false;
  });
  
  //Non Protest Side
  var nonProtestPanel = document.getElementById("right");
  var nonProtestList = nonProtestPanel.getElementsByTagName("li");
  
  var currentNonProtestSong = "NONE"; 
  var isNonProtestPOSDisplay = false;
  
  //Handle the left-hand menu
  for(var i = 0; i < nonProtestList.length; i++) {
    nonProtestList[i].addEventListener("click", function() {
      //Remove the placeholder if it is still there
      if(document.getElementById("placeholder") != null) {
        document.getElementById("center").removeChild(document.getElementById("placeholder"));
      }
      
      //Hide the popup if necessary, reset all of the highlights, and uncheck all POS checkboxes
      hideRightCheckboxPanel();
      isNonProtestPOSDisplay = false;
      turnOffHighlights("all", false);
      uncheckAllCheckbox("non_protest_class");
      
      var songXMLFileName = this.getAttribute("id");
      if(songXMLFileName === currentNonProtestSong) {
        document.getElementById("non_protest").innerHTML = null;
        currentNonProtestSong = "NONE";
      } else {
        var nonProtestSongRequest = new ajaxObject("get_html_song.php", function(responseText, responseStatus, responseXML) {
          if(responseStatus == 200) {
            document.getElementById("non_protest").innerHTML = responseText;
            //Resize the song to fill in the space
            pushSongs();
          }
        });
        nonProtestSongRequest.update("song_filename=" + songXMLFileName);
        currentNonProtestSong = songXMLFileName;
      }  
    });
    
    nonProtestList[i].addEventListener("mouseover", function() {
      this.style.backgroundColor = "black";
    });
    
    nonProtestList[i].addEventListener("mouseout", function() {
      this.style.backgroundColor = "inherit";
    });
  }  
  
  //Handle the popups for the Parts of Speech
  var nonProtestPOSToggleBtn = document.getElementById("toggle_non_protest_pos");
  
  nonProtestPOSToggleBtn.addEventListener("click", function(e) {
    if(isNonProtestPOSDisplay) {
      hideRightCheckboxPanel();
      isNonProtestPOSDisplay = false;
    } else {
      showRightCheckboxPanel(e);
      isNonProtestPOSDisplay = true;
    }
  });
 
  //Add click handlers to the elements on the nonProtestPOS popup
  var input = document.getElementsByName("non_protest_class");
  for(var i = 0; i < input.length; ++i) {
    
    input[i].addEventListener("click", function() {
      var classValue = this.value;
      if(this.checked === true) {
        turnOnHighlights(classValue, false);
      } else {
        turnOffHighlights(classValue, false);
      }

      // fixes noun phrase background
      if(input[0].checked === true && input[4].checked === true) {
      	turnOnHighlightsSpecialCase(input[4].value, false);
      } else if(input[0].checked === false && input[4].checked === true) {
      	turnOffHighlightsSpecialCase(input[4].value, false);
      }	

      if(input[0].checked === true && input[5].checked === true) {
      	turnOnHighlightsSpecialCase(input[5].value, false);
      } else if(input[0].checked === false && input[5].checked === true) {
      	turnOffHighlightsSpecialCase(input[5].value, false);
      }

      if(input[0].checked === true && input[6].checked === true) {
      	turnOnHighlightsSpecialCase(input[6].value, false);
      } else if(input[0].checked === false && input[6].checked === true) {
      	turnOffHighlightsSpecialCase(input[6].value, false);
      }

      if(input[0].checked === true && input[8].checked === true) {
      	turnOnHighlightsSpecialCase(input[8].value, false);
      } else if(input[0].checked === false && input[8].checked === true) {
      	turnOffHighlightsSpecialCase(input[8].value, false);
      }

    });  
  }
  
  //Add events to the Clear and Done buttons
  var inputButton = document.getElementById("non_protest_clear");
  inputButton.addEventListener("click", function() {
    turnOffHighlights("all", false);
    uncheckAllCheckbox("non_protest_class");
  });
  
  inputButton = document.getElementById("non_protest_done");
  inputButton.addEventListener("click", function() {
    hideRightCheckboxPanel();
    isNonProtestPOSDisplay = false;
  });
  
  
  //Function To Display Left Popup
  function showLeftCheckboxPanel(e) {
    var popupDiv, x, y;

    //For this page, I always want x to be the width of the left div + 3 pixels
    x = document.getElementById("left").clientWidth + 3;
    
    popupDiv = document.getElementById("left_checkbox_panel");
    
    popupDiv.style.left = x + "px";
    popupDiv.style.top = "60%";
    popupDiv.style.transform = "translate(0, -50%)";
    popupDiv.style.display = "block";
  }
  
  //Function to Hide Left Popup
  function hideLeftCheckboxPanel() {
    document.getElementById("left_checkbox_panel").style.display = "none";
  }
  
  //Function To Display Right Popup
  function showRightCheckboxPanel(e) {
    var popupDiv, x, y;

    //For this page, I always want x to be the width of the page - right div - 200px
    //This is a kludge that covers all browsers to get the full width of the window
    var windowWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
    x = windowWidth - (document.getElementById("right").clientWidth + 3) - 227;

    popupDiv = document.getElementById("right_checkbox_panel"); //.style.display = "block";
    
    popupDiv.style.left = x + "px";
    popupDiv.style.top = "60%"; //y + "px";
    popupDiv.style.transform = "translate(0, -50%)";
    popupDiv.style.display = "block";
  }
  
  //Function to Hide Right Popup
  function hideRightCheckboxPanel() {
    document.getElementById("right_checkbox_panel").style.display = "none";
  }
  
  //Function to highlight a particular part of speech
  function turnOnHighlights(className, isProtest) {
    var spanList;
    if(isProtest) {
      spanList = document.querySelectorAll("#protest span." + className);
    } else {
      spanList = document.querySelectorAll("#non_protest span." + className);
    }
   
    for(var j = 0; j < spanList.length; ++j) {
      switch(className) {
        case "nounPhrase":
          spanList[j].style.backgroundImage = "url('images/squiggle.gif')";
          spanList[j].style.backgroundRepeat = "repeat-x";
		  spanList[j].style.backgroundPosition = "left bottom";
          break;
        case "verbPhrase":
          spanList[j].style.fontWeight = "bold";
          break;
        case "prepPhrase":
          spanList[j].style.textDecoration = "underline";
          break;
        case "noun":
          spanList[j].style.backgroundColor = "#8080FF";
          break;
        case "verb":
          spanList[j].style.backgroundColor = "#FF8080";
          break;
        case "prep":
          spanList[j].style.backgroundColor = "#FF80FF";
          break;  
        case "adjective":
          spanList[j].style.backgroundColor = "#80FF80";
          break; 
        case "adverb":
          spanList[j].style.backgroundColor = "#FFFF80";
          break; 
        case "det":
          spanList[j].style.backgroundColor = "#80FFFF";
          break;
        default:
          spanList[j].style.backgroundColor = "inherit";
          break;
      }
    }
  }

  // fixes noun phrase background
  function turnOnHighlightsSpecialCase(className, isProtest) {
  	var spanList;
    if(isProtest) {
    	spanList = document.querySelectorAll("#protest div.song span." + className);
    }
    else {
        spanList = document.querySelectorAll("#non_protest div.song span." + className);
    }

    for(var j = 0; j < spanList.length; ++j) {
    	if(className == "noun") {
	    	spanList[j].style.backgroundImage = "url('images/squiggle.gif')";
	        spanList[j].style.backgroundRepeat = "repeat-x";
			spanList[j].style.backgroundPosition = "left bottom";
			spanList[j].style.backgroundColor = "#8080FF";
		}
		else if(className == "adjective") {
	    	if(spanList[j].parentNode.className == "nounPhrase") {
		    	spanList[j].style.backgroundImage = "url('images/squiggle.gif')";
		        spanList[j].style.backgroundRepeat = "repeat-x";
				spanList[j].style.backgroundPosition = "left bottom";
				spanList[j].style.backgroundColor = "#80FF80";
			}
		}
		else if(className == "adverb") {
	    	if(spanList[j].parentNode.className == "nounPhrase") {
		    	spanList[j].style.backgroundImage = "url('images/squiggle.gif')";
		        spanList[j].style.backgroundRepeat = "repeat-x";
				spanList[j].style.backgroundPosition = "left bottom";
				spanList[j].style.backgroundColor = "#FFFF80";
			}
		}
		else if(className == "det") {
	    	spanList[j].style.backgroundImage = "url('images/squiggle.gif')";
	        spanList[j].style.backgroundRepeat = "repeat-x";
			spanList[j].style.backgroundPosition = "left bottom";
			spanList[j].style.backgroundColor = "#80FFFF";
		}
    }
  }
  
  //Function to turn off highlights for a particular part of speech
  function turnOffHighlights(className, isProtest) {
    var spanList;
    if(isProtest) {
      if(className === "all") {
        spanList = document.querySelectorAll("#protest div.song span");
      } else {
        spanList = document.querySelectorAll("#protest div.song span." + className);
      }
      
    } else {
      if(className === "all") {
        spanList = document.querySelectorAll("#non_protest div.song span");
      } else {
        spanList = document.querySelectorAll("#non_protest div.song span." + className);
      }
    }
   
    for(var j = 0; j < spanList.length; ++j) {
      spanList[j].style.backgroundColor = "";
      spanList[j].style.fontWeight = "";
      spanList[j].style.textDecoration = "";
      spanList[j].style.fontStyle = "";
      spanList[j].style.backgroundImage = "";
      spanList[j].style.backgroundRepeat = "";
	  spanList[j].style.backgroundPosition = "";
    }
  }

  // fixes noun phrase background
  function turnOffHighlightsSpecialCase(className, isProtest) {
  	var spanList;
    if(isProtest) {
    	spanList = document.querySelectorAll("#protest div.song span." + className);
    }
    else {
        spanList = document.querySelectorAll("#non_protest div.song span." + className);
    }

    for(var j = 0; j < spanList.length; ++j) {
    	spanList[j].style.backgroundImage = "";
      	spanList[j].style.backgroundRepeat = "";
	  	spanList[j].style.backgroundPosition = "";
    }
  }
  
  function uncheckAllCheckbox(checkboxName) {
    var inputs = document.getElementsByName(checkboxName);
    for(var i = 0; i < inputs.length; ++i) {      
      inputs[i].checked = false;
    }
  }
});