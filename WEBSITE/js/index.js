/**
 * 
 */

  document.addEventListener('DOMContentLoaded', function() {
    
    //Find out what page we are on
    var currentPageName = document.getElementById('current_page_name').value;    
    var allPages = ['index', 'about', 'data', 'conclusions'];
      
    ////////////////////////////
    // menu bar interactivity //
    ////////////////////////////
    for(i = 0; i < allPages.length; ++i) {   
      function createMenuItem(num) {    
        var menuButton = document.getElementById(allPages[num]);
        var menuButtonPanel = document.getElementById(allPages[num] + '_panel');
        
        menuButton.addEventListener('mouseover', function() {
          menuButtonPanel.style.display = 'block';
          menuButton.style.background = 'rgba(0,0,0,0.6)';
        });
        menuButtonPanel.addEventListener('mouseover', function() {
          menuButtonPanel.style.display = 'block';
          menuButton.style.background = 'rgba(0,0,0,0.6)';
        });
        //These two depend on whether we are on the current page or not
        if(currentPageName == allPages[num]) {
          menuButton.addEventListener('mouseout', function() {
            menuButtonPanel.style.display = 'none';
            menuButton.style.background = 'rgba(0,0,0,0.8)';
          });
          menuButtonPanel.addEventListener('mouseout', function() {
            menuButtonPanel.style.display = 'none';
            menuButton.style.background = 'rgba(0,0,0,0.8)';
          }); 
        } else {
          menuButton.addEventListener('mouseout', function(){
            menuButtonPanel.style.display = 'none';
            menuButton.style.background = 'rgba(0,0,0,0.2)';
          });
          menuButtonPanel.addEventListener('mouseout', function() {
            menuButtonPanel.style.display = 'none';
            menuButton.style.background = 'rgba(0,0,0,0.2)';
          });
        }
      }
      createMenuItem(i);
    }
    
    //Column Height
    var leftHeight = document.getElementById('left').clientHeight;
    var centerHeight = document.getElementById('center').clientHeight;
    var rightHeight = document.getElementById('right').clientHeight;
    console.log(leftHeight);
    console.log(centerHeight);
    console.log(rightHeight);
    var biggest = Math.max(leftHeight,centerHeight,rightHeight);
    if(biggest === leftHeight){
      document.getElementById('center').style.height = leftHeight + 'px';
      document.getElementById('right').style.height = leftHeight + 'px';  
    }
    else if(biggest === centerHeight){
      document.getElementById('left').style.height = centerHeight + 'px';
      document.getElementById('right').style.height = centerHeight + 'px';
    }
    else{
      document.getElementById('left').style.height = rightHeight + 'px';
      document.getElementById('center').style.height = rightHeight + 'px';
    }

  });