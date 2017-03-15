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
 
 
 
 
 /***
  This function is used to scrap next pages
  **/
 function scrap_page_next($url)
 {
  $page = curl_get_file($url);
  $regex = '@(?s)<h2.*?Add to Compare@';
  preg_match_all($regex,$page,$match);
  if($match == null)
  echo "No match found!!";
  else
  {
   foreach($match[0] as $m)
    scrap($m);
  }
  
  //To find next url
  $regex = '@<link\s*rel="next"\s*href="(.*)?"@';
  preg_match($regex,$page,$u);
  if($u == null)
   return null;
  else 
  return $u[1];    
 }
 
  /***
   This is to find url of prev page if any
   **/
 function prev_url($url)
  {
 
   $page = curl_get_file($url);
   //To find prev url
  $regex = '@<link\s*rel="prev"\s*href="(.*)?"@';
  preg_match($regex,$page,$u);
  if($u == null)
   return null;
  else 
  return $u[1];
 }    

   /***
  This function is used to scrap prev pages
  **/
 function scrap_page_prev($url)
 {
  $page = curl_get_file($url);
  $regex = '@(?s)<h2.*?Add to Compare@';
  preg_match_all($regex,$page,$match);
  if($match == null)
  echo "No match found!!";
  else
  {
   foreach($match[0] as $m)
    scrap($m);
  }
  
  //To find prev url
  $regex = '@<link\s*rel="prev"\s*href="(.*)?"@';
  preg_match($regex,$page,$u);
  if($u == null)
   return null;
  else 
  return $u[1];    
 }

/***
 This function is used to scrap individual college detail
 ***/ 
 function scrap($page)
 {
   
   //For College Name and Location 
   $regex = '@class="tuple-clg-heading">\s*<a[^>]*?>([^<]*?)</a>\s*<p>\s*\|\s*([^<]*?)</p>@';  //</h2>\s*(<ul[\w\s\d";_=<>/,-]*?</ul>)?@';
    preg_match($regex,$page,$match);
  
  
   //For facility if any
   $regex = '@<h3>([^<]*?)</h3>@';
   preg_match_all($regex,$page,$facility);  
   $f = implode("+",$facility[1]);
   
   
   //For reveiew if any
   $regex = '@<b>(\d+)</b><a\s*target=".*?"\s*type="reviews"@';
   preg_match($regex,$page,$review);
   if($review == NULL)
    $r = 0;
   else
    $r = (int)$review[1];
     
   
   var_dump($match[1],$match[2],$f,$r);
 }  
   

?>   
     
