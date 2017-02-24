<?php
 //Function to make get request using url
 function curl_get_file($url)
 {
    $c = curl_init();  //Initialize curl session 
    
    //Setting curl option
    curl_setopt($c,CURLOPT_RETURNTRANSFER,TRUE);
    curl_setopt($c,CURLOPT_URL,$url);
    
    $result = curl_exec($c);   //Executing curl session
    curl_close($c);   //Closing curl session
    
    return $results;
 }
 
 function scrap($url)
 {
    $page = curl_get_file($url);   //Contents of individual college page
  
   //For address
   $regex='@<strong class="flLt">Address\s*:\s*<[^>]*?>\s*<[^>]*?>\s*([^<]*?)\s*</span>@';
   preg_match($regex,$page,$addr);
  
   //For year of establishment
   $regex = '@<label>Established in (\d+)\s*</label>@';
   preg_match($regex,$page,$year);
   if($year == null)
   $year[1] = null;
  
   //For Website if any
   $regex = '@<strong class="flLt">Website\s*:\s*<[^>]*?>\s*<[^>]*?>\s*<[^>]*?>\s*([^<]*?)\s*</a>@';
   preg_match($regex,$page,$web);
   if($web == null)
   $web[1] = null;
  
  
   //For courses
   $regex = '@<a\s*uniqueattr="LISTING_INSTITUTE_PAGES/CO_LINK_CLICK"\s*href="[^>]*?>([^<]*?)</a>\s*<span>([^<]*?)</span>@';
   preg_match_all($regex,$page,$courses);
   
   foreach($courses[1] as $course)
   {
      $course += $courses[2];
   }
   implode("+",$courses[1]);     
  
   //For Infrastructure
   $regex = '@<span\s*class="flLt"\s*title="Infrastructure / Teaching Facilities"\s*>[<>\w\s"=&;:,/_-]*?<ul>\s*([<>/\w\s"&;,_-]*?)</ul>@';
   preg_match($regex,$page,$facilities);
   $regex = '@<li>([<>/\w\s,&;_-]*?)</li>@';
   preg_match_all($regex,$facilities[1],$facility);
   
   var_dump($addr[1],$year[1],$web[1],$courses[1],$facility);
   }

?>   
     
