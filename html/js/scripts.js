/***
 Global Scripts
**/ 

function scrape() {

  
  //To display loading gif
  $(document).ajaxStart(function(){
   $("#wait").css("display","block");
   });
 
  
  //To remove loading gif
  function remove (){
   $("#wait").css("display","none");
   }  
   
  
  //To load input.php  
  $.ajax({
   url: '/input.php',
   type: 'POST',
   data: {
   url : $('#url').val()},
   success: remove() 
  });
 } 
   
 function display() {

  
  //To display loading gif
  $(document).ajaxStart(function(){
   $("#wait").css("display","block");
   });
 
  
  //To remove loading gif
  function remove (){
   $("#wait").css("display","none");
   }  
   
  
  //To load input.php  
  $.ajax({
   url: '/display.php',
   type: 'POST',
   success: remove() 
  });
 }  
  
