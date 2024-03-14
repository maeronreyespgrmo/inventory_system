<?php
// Define your routes
$routes = [
    '/' => 'home.php',
    '/about' => 'about.php',
    '/contact' => 'contact.php',
    '/products' => 'products.php',
    '/product/:id' => 'product.php',
];

// Get the requested URL
$request_uri = $_SERVER['REQUEST_URI'];

// Remove query string from URL
$request_uri = strtok($request_uri, '?');

// Check if the requested URL matches any of the defined routes
$route_found = false;
foreach ($routes as $route => $file) {
    // Replace ':id' placeholder with a regular expression to match numbers
    $route_regex = str_replace(':id', '(\d+)', $route);
    
    // Add start and end delimiters to the regex pattern
    $route_regex = '^' . $route_regex . '$';
    
    // Check if the requested URL matches the route pattern
    if (preg_match('#' . $route_regex . '#', $request_uri, $matches)) {
        $route_found = true;
        
        // If the route contains parameters, extract them
        if (strpos($route, ':') !== false) {
            $params = array_slice($matches, 1); // Remove the first match which is the full URL
            // Pass parameters to the included file
            $_GET['id'] = $params[0]; // For example, if ':id' is matched, it's treated as 'id' parameter
        }
        
        // Include the corresponding file
        include $file;
        break; // Break the loop once a route is found
    }
}

// If no route is found, show a 404 error
if (!$route_found) {
    http_response_code(404);
    echo "404 Not Found";
}
?>