<!Doctype html>
<html>
<head>
<title>Web Scraper</title>
</head>
<body>
<h1>Hola!!<br>Let's Scrap some data :></h1>
<?php
  require_once('../includes/helpers.php');
 $url = "http://engineering.shiksha.com/be-btech-courses-in-chennai-2-ctpg";
 $page = curl_get_file($url);
 $regex ='@<a\s*class="institute-title-clr"\s*href="([^"]*?)"\s*title="([^"]*?)"\s*>@';
 preg_match_all($regex,$page,$match);
 if($match == null)
 echo "No match found!!";
 else
 {
   $url = $match[1][15];
   var_dump($match[2][15]); //$match[2] contains College name
   scrap($url);
   
  }
 ?>
</body>
</html> 
