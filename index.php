<!DOCTYPE html>
<html>
    <head>
        <title>Shady Link Builder</title>
        <link rel="stylesheet" href="styles.css" />
    </head>
    <body>
        <div id="">
            <h1>Shady URL Shortener</h1>
            <form id="url-form" method="POST">
                <label for="url">Enter your URL:</label>
                <input name="url" id="url" required>
                <label for="shade-level">Shadiness:</label>
                <input type="number" name="shade-level" min="2" max="10">
                <label for="expiry-date">Expiry (in days):</label>
                <input type="number" name="expiry-date" min="1" max="30">
                <button id="submit-url" type="submit">Create Shady Link!</button>
            </form>

            <div id="link-container">
                <?php
                include('link-builder.php');
                include('db-actions.php');
                ?>
            </div>
        </div>
    </body>
</html>