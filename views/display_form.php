<form action="display.php" method="GET">
    <fieldset>
        <div class="form-group">
            <button class="btn btn-default" onclick=display() type="submit">
                  Display
            </button>
        </div>
        <div id="wait" style="display:none; width:60px; height:60px; position:absolute;">
        <img src="/img/ajax-loader.gif" width="50" height="50"/><br>Extracting Data from database</div>
    </fieldset>
</form>
