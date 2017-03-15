<?php
  require_once('../includes/helpers.php');

 $url = $_GET["url"];
 $purl = prev_url($url);   //To get prev url
 
 while($url)
 {
   $url = scrap_page_next($url);
 }  

 while($purl)
 {
   $purl = scrap_page_prev($purl);
 }  
    
 ?>
