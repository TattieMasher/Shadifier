<!DOCTYPE html>
<?php // Include functions to create link and extract end of client request URL
include('link-builder.php');
?>

<html>
    <head>
        <title>Shady Link Builder</title>
        <link rel="stylesheet" href="styles.css" />
    </head>
    <body>
    <?php // Include file for storing db connection settings, running database actions and storing results
        include('db-actions.php');
                ?>
        <div id="app-container">
            <?php 
            $urlRequested = $_SERVER['REQUEST_URI'];
            $pathSegment = trim(extractPathAfterBaseURL($urlRequested, $baseUrl));

            echo "<h2>REQUESTED: $urlRequested</h2>
            <br>
            <h3>Segment: $pathSegment</h3>";

            if ($pathSegment === "Shadifier" || $pathSegment === "") {
                include('components/url-form.php');
            } else {
                // Retrieve shady URLs from the database
                $shadyUrl = retrieveShadyUrls($pdo, $pathSegment); // Fetch a single original_url
                
                if ($shadyUrl !== false) {
                    $originalURL = urldecode($shadyUrl);
                    
                    // Display the single shady URL
                    echo "<h4>Original URL: $originalURL<br>";
                    echo "Shady URL: $pathSegment<br></h4>";
                } else {
                    echo "<h1>No Shady URLs found.</h1>
                    <p>SQL Query: $query</p>
                    <p>Path Segment: $pathSegment</p>";
                }
            }
            ?>
        </div>
    </body>
</html>