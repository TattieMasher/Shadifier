<?php
$shadyElements = [
    "wow",
    "free",
    "prizes",
    "nigerian-prince",
    "win",
    "millionaire",
    "discount",
    "bargain",
    "mind-blowing",
    "not-clickbait",
    "VIP",
    "once-in-a-lifetime",
    "exclusive",
    "lottery",
    "pyramid-scheme",
    "multi-level-marketing",
    "not-a-scam"
];

function generateShadyURL() {
    global $shadyElements; // Use the global keyword to access the external variable
    $characters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-_!$()*";
    $shadiness = 10; // Number of shadyElements (above) in generated URL
    $length = 11;  // Length of random characters (as above) at end of generated URL - not currently used

    $shadyURL = '';
    for ($i = 0; $i < $shadiness; $i++) {
        $shadyURL .= $shadyElements[rand(0,count($shadyElements))];
        $shadyURL .= "!";   // Shady element delimiter
    }

    /* No random characters at the end
    for ($i = 0; $i < $length; $i++) {
        $shadyURL .= $characters[rand(0, strlen($characters) - 1)];
    }
    */
    return "$shadyURL";
}

function extractPathAfterBaseURL($urlRequested, $baseUrl) {
    $pathWithoutBaseURL = str_replace($baseUrl, '', $urlRequested);
    $pathSegments = explode('/', $pathWithoutBaseURL);
    $pathSegments = array_filter($pathSegments);
    $lastSegment = end($pathSegments);

    return $lastSegment;
}
?>