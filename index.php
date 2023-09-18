<!DOCTYPE html>
<html>
    <head>
        <title>Shady URL Shortener</title>
    </head>
    <body>
        <h1>Shady URL Shortener</h1>
        <form method="POST">
            <label for="url">Enter your URL:</label>
            <input name="url" id="url" required>
            <label for="shade-level">Shadiness:</label>
            <input type="number" name="shade-level" min="2" max="10">
            <label for="expiry-date">Expiry (in days):</label>
            <input type="number" name="expiry-date" min="1" max="30">
            <button type="submit">Shorten</button>
        </form>

        <?php
include('link-builder.php'); // Check if the path is correct
include('db-actions.php');
?>

    </body>
</html>