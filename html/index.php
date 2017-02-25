<!Doctype html>
<html>
<head>
<title>Web Scraper</title>
</head>
<body>
<h1>Hola!!<br>Let's Scrap some data :></h1>
<?php
 require_once('../includes/helpers.php');
 ?>
<form method="get" action="/scrap.php">
 <input type="text" name="url" placeholder="http://engineering.shiksha.com...">
 <button type="submit" name="submit">Scrap</button>
</form> 
<div id ="data"></div>
</body>
</html> 
