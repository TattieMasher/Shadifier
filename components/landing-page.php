<div id="landing-page">
    <div id="banner">
        <h3>Wow, lucky you!</h3>
        <h4>Someone has sent you a gift.</h4>
    </div>
    <?php 
    // Retrieve shady URLs from the database
    $shadyUrl = retrieveShadyUrls($pdo, $pathSegment); // Fetch a single original_url
    
    if ($shadyUrl !== false) {
        $originalURL = urldecode($shadyUrl);
        
        // Display the redirect button in the center
        echo '<div id="center-button"><a id="shady-link" href="http://' . $originalURL . '"><button id="success">Claim Gift</button></a></div>';
    } else {
        echo '<div id="center-button"><button id="failure">This link has expired!</button></div>';
    }
    ?>
</div>