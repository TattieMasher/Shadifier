<?php
// Database connection settings
$host = 'srv915.hstgr.io';
$dbname = 'u908894077_URL_Shittifier';
$username = 'u908894077_URL_Admin';
$password = 'U%%~UE]&?HfSBx9';

// General settings
$baseUrl = "URL%20Shortener/Shadifier/";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $originalURL = $_POST["url"];
        $expiryDays = $_POST['expiry-date'];

        // Calculate the expiry date as 00:00 of the user-supplied number of days after today
        $expiryDate = date('Y-m-d 00:00:00', strtotime("+$expiryDays days"));

        $shadyURL = generateShadyURL();
    
        // Insert the URLs and expiry date/time into the database
        $stmt = $pdo->prepare("INSERT INTO shady_urls (original_url, shady_url, expiry_datetime) VALUES (?, ?, ?)");
        $stmt->execute([$originalURL, $shadyURL, $expiryDate]);
    
        echo "<br><br>";
        echo "Shady URL: <a href='$shadyURL'>$shadyURL</a>";
        echo "<br><br>";
        echo "Expiry date: $expiryDate";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<?php
function retrieveShadyUrls($pdo, $shadyUrl) {
    try {
        $query = "SELECT original_url FROM shady_urls WHERE shady_url = ? AND expiry_datetime > CURRENT_TIMESTAMP";
        echo "<br>SQL Query: $query"; // Debugging

        $stmt = $pdo->prepare($query);
        $stmt->execute([$shadyUrl]);

        // Echo the query with bound parameters
        echo "<br>"; $stmt->debugDumpParams();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return $result['original_url'];
        } else {
            return false;
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}
?>