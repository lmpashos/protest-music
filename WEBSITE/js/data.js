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
  
  //Resizing stuff
  var minHeight = 800;
  resizeColumns();  
  
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
      
      var songXMLFileName = this.getAttribute("id");
      if(songXMLFileName === currentProtestSong) {
        document.getElementById("protest").innerHTML = null;
        currentProtestSong = "NONE";
      } else {
        var protestSongRequest = new ajaxObject("get_html_song_info.php", function(responseText, responseStatus, responseXML) {
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
      
      var songXMLFileName = this.getAttribute("id");
      if(songXMLFileName === currentNonProtestSong) {
        document.getElementById("non_protest").innerHTML = null;
        currentNonProtestSong = "NONE";
      } else {
        var nonProtestSongRequest = new ajaxObject("get_html_song_info.php", function(responseText, responseStatus, responseXML) {
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
});