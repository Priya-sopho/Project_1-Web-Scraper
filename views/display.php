<div>
    
    <div id="message">
       <?php 
           print("Your Scraped data is as follow");
         ?>
    </div>
    
    <table id="overview">
      <?php
         print("<tr>");
           print("<th>College Name</th>");
           print("<th>Location</th>");
           print("<th>Facility</th>");
           print("<th>Review</th>");
         print("</tr>");
         
         foreach ($row as $r)
         {
           print("<tr>");
              print("<td>".$r["Name"]."</td>");
              print("<td>".$r["Location"]."</td>");
              print("<td><ul>");
              $facility = explode('+',$r["facility"]);
              foreach ($facility as $f)
              print("<li>".$f."</li>");
              print("</ul></td>");
              print("<td>".$r["review"]."</td>");
           print("</tr>");
         }
 
       ?>      
   </table>         
</div>
