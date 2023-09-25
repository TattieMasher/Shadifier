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
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<?php
function retrieveShadyUrls($pdo, $shadyUrl) {
    try {
        $query = "SELECT original_url FROM shady_urls WHERE shady_url = ? AND expiry_datetime > CURRENT_TIMESTAMP";

        $stmt = $pdo->prepare($query);
        $stmt->execute([$shadyUrl]);

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