# Web-Scrapper
A web based application to scrape data of all the engineering colleges in a particular city from the website of Shiksha.com. App  take a URL of Shiksha.com of any city as an input and scrape the data of all the engineering colleges located in that city. 

Link to video 
   http://www.videosprout.com/video?id=92cd286d-6882-45e1-b422-b980e807ac9a

Design Paradigm : MVC

Files and folders:
  1. html/public : Contains all the controllers and index.php
        Folders: css (Stylesheets)
                 fonts 
                 img (logo.png and ajax.png)
                 js (javascripts)
        Files : display.php (controller which fetch data from db)
                index.php (main page)
                input.php (controller which validates input url and scrape data and store in db)
  2. includes :
       helpers.php (contain helper functions)
       configure.php (contain configuration for db)
  3.views : apology.php (to render error messages)
            display.php (to display the records)
            display_form.php (display button to render records)
            footer.php (footer for each page)
            header.php (header for each page)
            input_url.php (page to provide input box for url)
  4.College.sql (contain the structure of table to be imported in db )
  5. config.json (for configuration)


To do to run the app:
 1. update config.json (username and password ) 
 2. start mysql if not running ( $ mysql50 start ) 
 3. create database named "shiksha" and import College.sql in phpmyadmin 
 4. start apache server 
   (apache50 start ~workspace/Project_1-Web-Scraper/html)
 5.open web server 
 6.Now you should be on page to input url 
 7.Enter url: www.shiksha.com/b-tech/colleges/b-tech-colleges-<city>-[p]
    where city is the name of city for which you want to scrape data and p is optional page number
 8.Click on scrap button to scrap.
 9.Data will be scrapped, be patient
 10.Now it would lead to you page with display button to view the scrapped data.
 11.Clicking on logo will take you back to input url page.
 
    