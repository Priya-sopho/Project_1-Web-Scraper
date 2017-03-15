<?php

    // configuration
    require("../includes/config.php"); 

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("input_url.php", ["title" => "input"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["url"]))
        {
            apologize("You must provide url to scrap.");
        }
        
        else
        { 
          //To truncate data from table i.e previous scrapped data
           mysql_query('TRUNCATE TABLE College');
           
             $url = $_POST["url"];
             $purl = prev_url($url);   //To get prev url
               
           while($url)
            {
                $url = scrap_page_next($url);
             }  

         while($purl)
           {
             $purl = scrap_page_prev($purl);
           } 
 
          redirect("display.php");
         }   

   }

?>
