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

  var h2Depression = document.getElementById("link_xml_great_depression");
  var h2Vietnam = document.getElementById("link_xml_vietnam");
  var h2Modern = document.getElementById("link_xml_modern");
  
  h2Depression.addEventListener("click", function() {   
    var xmlDepressionDiv = document.getElementById("xml_great_depression");
    switch(xmlDepressionDiv.style.display) {
      case "none":
        xmlDepressionDiv.style.display = "block";
        var arrowSpan = document.getElementById("depression_arrow");
        arrowSpan.innerHTML = "&darr;";
        break;
      case "block":
        xmlDepressionDiv.style.display = "none";
        var arrowSpan = document.getElementById("depression_arrow");
        arrowSpan.innerHTML = "&rarr;";
        break;
      default:
        xmlDepressionDiv.style.display = "block";
        var arrowSpan = document.getElementById("depression_arrow");
        arrowSpan.innerHTML = "&darr;";
        break;        
    }
    resizeColumns();
  });
  
  h2Depression.addEventListener("mouseover", function() {
    this.style.textDecoration = "underline";
    this.style.cursor="pointer";
  });
  
  h2Depression.addEventListener("mouseout", function() {
    this.style.textDecoration = "initial";
    this.style.cursor="auto";
  });
  
  h2Vietnam.addEventListener("click", function() {   
    var xmlVietnamDiv = document.getElementById("xml_vietnam");
    switch(xmlVietnamDiv.style.display) {
    case "none":
      xmlVietnamDiv.style.display = "block";
      var arrowSpan = document.getElementById("vietnam_arrow");
        arrowSpan.innerHTML = "&darr;";
      break;
    case "block":
      xmlVietnamDiv.style.display = "none";
      var arrowSpan = document.getElementById("vietnam_arrow");
        arrowSpan.innerHTML = "&rarr;";
      break;
    default:
      xmlVietnamDiv.style.display = "block";
      var arrowSpan = document.getElementById("vietnam_arrow");
        arrowSpan.innerHTML = "&darr;";
      break;        
    }
    resizeColumns();
  });
  
  h2Vietnam.addEventListener("mouseover", function() {
    this.style.textDecoration = "underline";
    this.style.cursor="pointer";
  });
  
  h2Vietnam.addEventListener("mouseout", function() {
    this.style.textDecoration = "initial";
    this.style.cursor="auto";
  });
  
  h2Modern.addEventListener("click", function() {   
    var xmlModernDiv = document.getElementById("xml_modern");
    switch(xmlModernDiv.style.display) {
    case "none":
      xmlModernDiv.style.display = "block";
      var arrowSpan = document.getElementById("modern_arrow");
      arrowSpan.innerHTML = "&darr;";
      break;
    case "block":
      xmlModernDiv.style.display = "none";
      var arrowSpan = document.getElementById("modern_arrow");
      arrowSpan.innerHTML = "&rarr;";
      break;
    default:
      xmlModernDiv.style.display = "block";
      var arrowSpan = document.getElementById("modern_arrow");
      arrowSpan.innerHTML = "&darr;";
      break;        
    }
    resizeColumns();
  });
  
  h2Modern.addEventListener("mouseover", function() {
    this.style.textDecoration = "underline";
    this.style.cursor="pointer";
  });
  
  h2Modern.addEventListener("mouseout", function() {
    this.style.textDecoration = "initial";
    this.style.cursor="auto";
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
  
  window.addEventListener("resize", function() {
    var list = document.querySelectorAll("#left > ul");
    list[0].style.width = document.getElementById("left").clientWidth + "px";
    
    resizeColumns();
  });
	  
});