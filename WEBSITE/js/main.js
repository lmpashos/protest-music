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

  document.addEventListener("DOMContentLoaded", function() {
    
    //Find out what page we are on
    var currentPageName = document.getElementById("current_page_name").value;    
    var allPages = ["index", "about", "lyrics", "data", "conclusions"];
      
    ////////////////////////////
    // menu bar interactivity //
    ////////////////////////////
    for(i = 0; i < allPages.length; ++i) {   
      function createMenuItem(num) {    
        var menuButton = document.getElementById(allPages[num]);
        var menuButtonPanel = document.getElementById(allPages[num] + "_panel");
        
        menuButton.addEventListener("mouseover", function() {
          menuButtonPanel.style.display = "block";
          menuButton.style.background = "rgba(0,0,0,0.6)";
        });
        menuButtonPanel.addEventListener("mouseover", function() {
          menuButtonPanel.style.display = "block";
          menuButton.style.background = "rgba(0,0,0,0.6)";
        });
        //These two depend on whether we are on the current page or not
        if(currentPageName == allPages[num]) {
          menuButton.addEventListener("mouseout", function() {
            menuButtonPanel.style.display = "none";
            menuButton.style.background = "rgba(0,0,0,0.8)";
          });
          menuButtonPanel.addEventListener("mouseout", function() {
            menuButtonPanel.style.display = "none";
            menuButton.style.background = "rgba(0,0,0,0.8)";
          }); 
        } else {
          menuButton.addEventListener("mouseout", function(){
            menuButtonPanel.style.display = "none";
            menuButton.style.background = "rgba(0,0,0,0.2)";
          });
          menuButtonPanel.addEventListener("mouseout", function() {
            menuButtonPanel.style.display = "none";
            menuButton.style.background = "rgba(0,0,0,0.2)";
          });
        }
      }
      createMenuItem(i);
    }
    
    //Column Height
    if(document.getElementById("left") & document.getElementById("right")){
		var leftHeight = document.getElementById("left").clientHeight;
		var centerHeight = document.getElementById("center").clientHeight;
		var rightHeight = document.getElementById("right").clientHeight;
	 
		var biggest = Math.max(leftHeight,centerHeight,rightHeight);
		if(biggest === leftHeight) {
		  document.getElementById("center").style.height = leftHeight + "px";
		  document.getElementById("right").style.height = leftHeight + "px";  
		} 
		else if(biggest === centerHeight) {
		  document.getElementById("left").style.height = centerHeight + "px";
		  document.getElementById("right").style.height = centerHeight + "px";
		} 
		else {
		  document.getElementById("left").style.height = rightHeight + "px";
		  document.getElementById("center").style.height = rightHeight + "px";
		}
	}

    // changes the first menu bar item from "Index" to "Home"
    document.getElementById("index").innerHTML = "Home";
  });