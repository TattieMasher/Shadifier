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
    "classified",
    "top-secret",
    "exclusive",
    "lottery",
    "pyramid-scheme",
    "multi-level-marketing",
    "not-a-scam"
];

function generateShadyURL() {
    global $shadyElements; // Use the global keyword to access the external variable
    $characters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-_!$()*";
    $shadiness = 4; // Number of shadyElements (above) in generated URL
    $length = 11;  // Length of random characters (as above) at end of generated URL

    $shadyURL = '';
    for ($i = 0; $i < $shadiness; $i++) {
        $shadyURL .= $shadyElements[rand(0,count($shadyElements))];
        $shadyURL .= "!";
    }

    for ($i = 0; $i < $length; $i++) {
        $shadyURL .= $characters[rand(0, strlen($characters) - 1)];
    }

    return "http://shady-links.website.com/$shadyURL";
}
?>