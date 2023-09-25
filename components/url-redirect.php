<?php
                // Retrieve shady URLs from the database
                $shadyUrl = retrieveShadyUrls($pdo, $pathSegment); // Fetch a single original_url
                
                if ($shadyUrl !== false) {
                    echo "<h1>Shady URLs:</h1>";
                    $originalURL = urldecode($shadyUrl);
                    $shadyURL = $encodedPathSegment; // The shady URL is the encoded path segment
                    
                    // Display the single shady URL
                    echo "Original URL: $originalURL<br>";
                    echo "Shady URL: $shadyURL<br>";
                } else {
                    echo "<h1>No Shady URLs found.</h1>
                    <p>SQL Query: $query</p>
                    <p>Path Segment: $pathSegment</p>";
                }

?>