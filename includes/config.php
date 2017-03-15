<!-- This file is to connect database and truncate all the previous data stored-->

<?php
  
     
  $json= file_get_contents("../config.json");
 
  //To convert config.json contents to associative array
  $db = json_decode($json, true);
    
  //Enable session
  session_start();
  
  //Connect Database
  $link = mysql_connect($db["database"]["host"],$db["database"]["username"],$db["database"]["password"]) or die ("Could not connect to server");
  
  //Select database
  mysql_select_db($db["database"]["dbname"],$link) or die("Could not select database");
  
  //To truncate data from table i.e previous scrapped data
  mysql_query('TRUNCATE TABLE College');
  
?>      

