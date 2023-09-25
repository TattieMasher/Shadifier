<!DOCTYPE html>
<?php // Include functions to create link and extract end of client request URL
include('link-builder.php');
?>

<html>
    <head>
        <title>Shady Link Builder</title>
        <link rel="stylesheet" href="styles.css" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Comic+Neue:wght@300;400;700&display=swap" rel="stylesheet"> 
    </head>
    <body>
        <?php // Include file for storing db connection settings, running database actions and storing results
            include('db-actions.php');
        ?>
        <div id="app-container">
            <?php 
            $urlRequested = $_SERVER['REQUEST_URI'];
            $pathSegment = trim(extractPathAfterBaseURL($urlRequested, $baseUrl));

            if ($pathSegment === "Shadifier" || $pathSegment === "") {
                include('components/url-form.php');
            } else {
                include('components/landing-page.php');
            }
            ?>
            <div id="link-details">
                <?php
                if ($_SERVER["REQUEST_METHOD"] === "POST") {
                    $originalURL = $_POST["url"];
                    $expiryDays = $_POST['expiry-date'];

                    // Remove the protocol (http:// or https://) from the URL
                    $originalURL = preg_replace('#^https?://#', '', $originalURL);

                    // Calculate the expiry date as 00:00 of the user-supplied number of days after today
                    $expiryDate = date('Y-m-d 00:00:00', strtotime("+$expiryDays days"));

                    $shadyURL = generateShadyURL();

                    // Insert the URLs and expiry date/time into the database
                    $stmt = $pdo->prepare("INSERT INTO shady_urls (original_url, shady_url, expiry_datetime) VALUES (?, ?, ?)");
                    $stmt->execute([$originalURL, $shadyURL, $expiryDate]);

                    echo "<br><br>";
                    echo "Shady URL: <a href='$shadyURL'>$shadyURL</a>";
                    echo "<br><br>";
                    echo "Expiry date: " . date('Y-m-d', strtotime($expiryDate));
                }
                ?>
            </div>
        </div>
    </body>
</html>