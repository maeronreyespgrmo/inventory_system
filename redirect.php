<?php
// Fetch the URL parameter from the query string
$url = isset($_GET['url']) ? $_GET['url'] : '';

// Here you could implement logic to map short URLs to full URLs from a database or array
// For this example, I'm just redirecting based on a static map
$urlMap = [
    'home' => 'index.php',
    'test' => 'https://example.com/long-url-2'
];

// Check if the provided key exists in the map
if (array_key_exists($url, $urlMap)) {
    // Redirect to the corresponding long URL
    header('Location: ' . $urlMap[$url]);
    exit;
} else {
    // If the key doesn't exist, redirect to a 404 page or homepage
    header('Location: /404.html'); // or header('Location: /');
    exit;
}