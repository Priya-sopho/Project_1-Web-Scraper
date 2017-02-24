<!Doctype html>
<html>
<head>
<title>Web Scraper</title>
</head>
<body>
<h1>Hola!!<br>Let's Scrap some data :></h1>
<?php
 $url = "http://engineering.shiksha.com/be-btech-courses-in-chennai-2-ctpg";
 $page = file_get_contents($url);
 $regex ='@<a\s*class="institute-title-clr"\s*href="([^"]*?)"\s*title="([^"]*?)"\s*>@';
 preg_match_all($regex,$page,$match);
 if($match == null)
 echo "No match found!!";
 else
 {
   $url = $match[1][11];
   $page = file_get_contents($url);
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
   //For Infrastructure
   $regex = '@<span\s*class="flLt"\s*title="Infrastructure / Teaching Facilities"\s*>[<>\w\s"=&;:,/_-]*?<ul>\s*([<>/\w\s"&;,_-]*?)</ul>@';
   preg_match($regex,$page,$facilities);
   $regex = '@<li>([<>/\w\s,&;_-]*?)</li>@';
   preg_match_all($regex,$facilities[1],$facility);
   var_dump($match[2][11],$addr[1],$year[1],$web[1],$courses[1],$courses[2],$facility[1]); 
    
  }
 ?>
</body>
</html> 
