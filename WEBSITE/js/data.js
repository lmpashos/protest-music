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

  var protestPanel = document.getElementById("left");
  var protestList = left.getElementsByTagName("li");
  for(var i = 0; i < protestList.length; ++i) {
    protestList[i].addEventListener("click", function() {
      var songXMLFileName = this.getAttribute("id");
      var protestSongRequest = new ajaxObject("get_html_song.php", function(responseText, responseStatus, responseXML) {
        if(responseStatus == 200) {
          document.getElementById("protest").innerHTML = responseText;
        }
      });
      protestSongRequest.update("song_filename=" + songXMLFileName);
    });
    
    protestList[i].addEventListener("mouseover", function(){
      this.style.backgroundColor = "black";
    });
    
    protestList[i].addEventListener("mouseout", function(){
      this.style.backgroundColor = "inherit";
    });
  }
  
  var nonProtestPanel = document.getElementById("right");
  var nonProtestList = nonProtestPanel.getElementsByTagName("li");
  for(var i = 0; i < nonProtestList.length; i++){
    nonProtestList[i].addEventListener("click", function() {
      var songXMLFileName = this.getAttribute("id");
      var nonProtestSongRequest = new ajaxObject("get_html_song.php", function(responseText, responseStatus, responseXML) {
        if(responseStatus == 200) {
          document.getElementById("non_protest").innerHTML = responseText;
        }
      });
      nonProtestSongRequest.update("song_filename=" + songXMLFileName);
    });
    
    nonProtestList[i].addEventListener("mouseover", function() {
      this.style.backgroundColor = "black";
    });
    
    nonProtestList[i].addEventListener("mouseout", function() {
      this.style.backgroundColor = "inherit";
    });
  }  
//  console.log(document.getElementById("music_era").value);
//  protestListRequest.update("is_protest=true");
	  
});