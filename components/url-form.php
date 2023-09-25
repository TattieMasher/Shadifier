<h1>Shady URL Shortener</h1>
<form id="url-form" method="POST">
    <label for="url">Enter your URL:</label>
    <input name="url" id="url" required>
    <!-- <label for="shade-level">Shadiness:</label>
    <input type="number" name="shade-level" min="2" max="10" value="5"> -->
    <label for="expiry-date">Expiry (in days):</label>
    <input type="number" name="expiry-date" min="1" max="30" value="30">
    <button id="submit-url" type="submit">Create Shady Link!</button>
</form>