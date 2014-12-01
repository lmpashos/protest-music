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
"use strict";

  document.addEventListener("DOMContentLoaded", function() {
     
    var allPages = ["home", "about", "lyrics", "data", "conclusions"];
    //Find out what page we are on
    var currentPageName = document.getElementById("current_page_name").value;   
    
    function createMenuItem(num) {    
      var menuButton = document.getElementById(allPages[num]);
      var menuButtonPanel = document.getElementById(allPages[num] + "_panel");
      
      menuButton.addEventListener("mouseover", function() {
        if(num === 0) {
          menuButton.style.background = "rgba(0,0,0,0.6)";
        } else {
          menuButton.style.background = "rgba(0,0,0,0.6)";
          menuButtonPanel.style.display = "block";
        }
      });
      
      if(num !== 0) {
        menuButtonPanel.addEventListener("mouseover", function() {
          menuButtonPanel.style.display = "block";
          menuButton.style.background = "rgba(0,0,0,0.6)";
        });       
      }

      
      //These two depend on whether we are on the current page or not
      if(currentPageName == allPages[num]) {
        menuButton.addEventListener("mouseout", function() {
          if(num === 0) {
            menuButton.style.background = "rgba(0,0,0,0.8)";
          } else {
            menuButtonPanel.style.display = "none";
            menuButton.style.background = "rgba(0,0,0,0.8)";            
          }
        });
        
        if(num !== 0) {
          menuButtonPanel.addEventListener("mouseout", function() {
            menuButtonPanel.style.display = "none";
            menuButton.style.background = "rgba(0,0,0,0.8)";
          }); 
        }
      } else {
        if(num === 0) {
          menuButton.addEventListener("mouseout", function(){
            menuButton.style.background = "rgba(0,0,0,0.2)";
          });
        } else {
          menuButton.addEventListener("mouseout", function(){
            menuButtonPanel.style.display = "none";
            menuButton.style.background = "rgba(0,0,0,0.2)";
          });
        }

        if(num !== 0) {
          menuButtonPanel.addEventListener("mouseout", function() {
            menuButtonPanel.style.display = "none";
            menuButton.style.background = "rgba(0,0,0,0.2)";
          });
        }
      }
    }
      
    ////////////////////////////
    // menu bar interactivity //
    ////////////////////////////
    for(var i = 0; i < allPages.length; ++i) {   
      createMenuItem(i);
    }
    
    
    
    //Column Height fix for 3 cols
    if(currentPageName != allPages[0] && currentPageName != allPages[1] && currentPageName != allPages[2] && currentPageName != allPages[3] && currentPageName != allPages[4]) {
      var leftHeight = document.getElementById("left").clientHeight;
      var centerHeight = document.getElementById("center").clientHeight;
      var rightHeight = document.getElementById("right").clientHeight;
      
      var biggest = Math.max(leftHeight,centerHeight,rightHeight);
      if(biggest === leftHeight) {
        document.getElementById("center").style.height = leftHeight + "px";
        document.getElementById("right").style.height = leftHeight + "px";  
      } else if(biggest === centerHeight) {
        document.getElementById("left").style.height = centerHeight + "px";
        document.getElementById("right").style.height = centerHeight + "px";
      } else {
        document.getElementById("left").style.height = rightHeight + "px";
        document.getElementById("center").style.height = rightHeight + "px";
      }
    }
	// Column height fix for 2 cols
	else if(currentPageName == allPages[1] || currentPageName == allPages[4]){
		var leftHeight = document.getElementById("left").clientHeight;
        var centerHeight = document.getElementById("center").clientHeight;
		var biggest = Math.max(leftHeight,centerHeight);
		if(biggest === leftHeight)
        	document.getElementById("center").style.height = leftHeight + "px";
        else if(biggest === centerHeight)
        	document.getElementById("left").style.height = centerHeight + "px";
	}
	
	

  });