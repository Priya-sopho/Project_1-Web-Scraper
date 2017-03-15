<?php
  
  //configuration
    require("../includes/config.php");
    
    //Retrieve data from college table 
    $row = mysql_query('SELECT * FROM College');
    echo count($row);
    
    //render history page
    render("display.php",["title"=> "Display", "row" => $row]);
 ?>                           
