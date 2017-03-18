<?php
  
  //configuration
    require("../includes/config.php");
    
    //Retrieve data from college table 
    $row = mysql_query('SELECT * FROM College') or die(mysql_error());
    
    if($row == NULL)
    echo("Nothing to display");
    
    else
    {
     //render display page
    render("display.php",["title"=> "Display", "row" => $row]);
    }
 ?>                           
