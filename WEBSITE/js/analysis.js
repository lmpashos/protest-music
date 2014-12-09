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


// fixes a bug on about page where column lengths don't match on page resize
document.addEventListener("DOMContentLoaded", function() {
  
  resizeColumns();
  
  window.addEventListener("scroll", function() {
    var top = 100;
    
    var list = document.querySelectorAll("#left > ul");
   
    var scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
      
    if(scrollTop > top && list.className == "absolute") {
      list[0].className="fixed";
    } else if(scrollTop < top && list.className =="fixed") {
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
   
  });
  
  window.addEventListener("load", function(){
    resizeColumns();
  });
  
  
  window.addEventListener("resize", function() {
//    var centerHeight = document.getElementById("center").clientHeight;
//    document.getElementById("left").style.height = centerHeight + "px";
    
    var list = document.querySelectorAll("#left > ul");
    list[0].style.width = document.getElementById("left").clientWidth + "px";
    
    resizeColumns();
  });
  
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
  }
  
//  function resizeColumns() {
//	var leftHeight = document.getElementById("left").clientHeight;
//	var centerHeight = document.getElementById("center").clientHeight;
//	var biggest = Math.max(leftHeight,centerHeight);
//	if(biggest === leftHeight)
//		document.getElementById("center").style.height = leftHeight + "px";
//	else if(biggest === centerHeight)
//		document.getElementById("left").style.height = centerHeight + "px";  
//  }
  
});