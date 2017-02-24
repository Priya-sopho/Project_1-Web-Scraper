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
    
    return $result;
 }
 
 function scrap($url)
 {
    $page = curl_get_file($url);   //Contents of individual college page
  
   //For address
   $regex='@<strong class="flLt">Address\s*:\s*<[^>]*?>\s*<[^>]*?>\s*([^<]*?)\s*</span>@';
   preg_match($regex,$page,$addr);
   $addr = $addr[1];  
   
   
   //For year of establishment
   $regex = '@<label>Established in (\d+)\s*</label>@';
   preg_match($regex,$page,$year);
   if($year != null)
      $year = $year[1];
  
   
   //For Website if any
   $regex = '@<strong class="flLt">Website\s*:\s*<[^>]*?>\s*<[^>]*?>\s*<[^>]*?>\s*([^<]*?)\s*</a>@';
   preg_match($regex,$page,$web);
   if($web != null)
     $web = $web[1];
   
   
  
   //For courses
   $regex = '@<a\s*uniqueattr="LISTING_INSTITUTE_PAGES/CO_LINK_CLICK"\s*href="[^>]*?>([^<]*?)</a>\s*<span>([^<]*?)</span>@';
   preg_match_all($regex,$page,$courses);
   $n = count($courses[1]);
   
   for($i=0 ; $i < $n ; $i++)
   {
      $courses[1][$i] .= $courses[2][$i];
   }
   $courses = implode("+",$courses[1]);     
  
  
  
   //For Infrastructure facility if any
   $regex = '@<span\s*class="flLt"\s*title="Infrastructure / Teaching Facilities"\s*>[<>\w\s"=&;:,/_-]*?<ul>\s*([<>/\w\s"&;,_-]*?)</ul>@';
   preg_match($regex,$page,$facilities);
   
   if($facilities == null)   //If no facility
   $facility = null;
   
   else
   {
    $regex = '@<li>([<>/\w\s,&;_-]*?)</li>@';
   preg_match_all($regex,$facilities[1],$facility);
      
   //To strip span tag if any
   $n =count($facility[1]);
   for( $i=0; $i<$n ; $i++)
   {
     $facility[1][$i] = preg_replace('@(<span>|</span>|&nbsp;)@',' ',$facility[1][$i]);
   }  
   
   $facility = implode("+",$facility[1]);
   }
   
   var_dump($addr,$year,$web,$courses,$facility);
   }

?>   
     
