<form action="input.php" method="post">
    <fieldset>
        <div class="form-group">
            <input autofocus class="form-control" id="url" name="url" placeholder="www.shiksha.com/b-tech/colleges/b-tech-colleges-city" type="text"/>
        </div>
        <div class="form-group">
            <button class="btn btn-default" onclick=scrape() type="submit">
                  Scrap
            </button>
        </div>
        <div id="wait" style="display:none; width:800px; height:150px; position:center;">
        <img src="/img/ajax-loader.gif" width="50" height="50"/><br>Scraping Data,Please Wait</div>
    </fieldset>
</form>
