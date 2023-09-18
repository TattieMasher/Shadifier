<!DOCTYPE html>

<?php function extractPathAfterBaseURL($urlRequested, $baseUrl) {
    $pathWithoutBaseURL = str_replace($baseUrl, '', $urlRequested);

    $pathSegments = explode('/', $pathWithoutBaseURL);

    $pathSegments = array_filter($pathSegments);

    $lastSegment = end($pathSegments);

    return $lastSegment;
}
?>

<html>
    <head>
        <title>Shady Link Builder</title>
        <link rel="stylesheet" href="styles.css" />
    </head>
    <body>
        <div id="">
            <?php 
            $urlRequested = $_SERVER['REQUEST_URI'];
            $pathSegment = trim(extractPathAfterBaseURL($urlRequested, $baseUrl));

            echo "<h2>REQUESTED: $urlRequested</h2>
            <br>
            <h3>Segment: $pathSegment</h3>
            Path Segment: $pathSegment";

            if($pathSegment === "Shadifier") {
                include('components/url-form.php');
            }
            ?>

            <div id="link-container">
                <?php
                include('link-builder.php');
                include('db-actions.php');
                ?>
            </div>
        </div>
    </body>
</html>