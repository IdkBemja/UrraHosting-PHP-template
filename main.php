<?php

// Register controllers for the application
// You can add more just like this:
// require_once __DIR__ . '/app/controllers/AnotherController.php';

require_once __DIR__ . '/app/controllers/AppController.php';
require_once __DIR__ . '/app/controllers/ErrorController.php';


// Start Embed PHP Server
$uri = $_SERVER['REQUEST_URI'];

// function to get MIME type based on file extension
function getMimeType($file) {
    $ext = pathinfo($file, PATHINFO_EXTENSION);
    $mimeTypes = [
        'html' => 'text/html',
        'css'  => 'text/css',
        'js'   => 'application/javascript',
        'png'  => 'image/png',
        'jpg'  => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'gif'  => 'image/gif',
        'svg'  => 'image/svg+xml',
        'json' => 'application/json',
        // Add more MIME types as needed
    ];
    return $mimeTypes[$ext] ?? 'application/octet-stream';
}

// Handle static file requests
if (strpos($uri, '/app/static/') === 0) {
    $filePath = __DIR__ . $uri;
    if (file_exists($filePath)) {
        $mimeType = getMimeType($filePath);
        header("Content-Type: $mimeType");
        readfile($filePath);
        exit();
    } else {
        http_response_code(404);
        echo "File not found.";
        exit();
    }
}

// Handle HTTP Controller requests by URI routing
// Here could be a routing mechanism to map URIs to controller methods
// Example:
// case 'user': <- this URL should be http://localhost:8000/user
//     $userController = new UserController(); <- assuming you have a UserController and this create an instance of it
//     $userController->handleRequest(); <- assuming handleRequest is a method in UserController to process the request
//     break;

$segments = explode('/', trim($uri, '/'));
$controller = $segments[0] ?? 'app'; // Default to 'app' if no segment

if ($controller === '') {
    $controller = 'app';
}

switch ($controller) {
    case 'app':
        $appController = new AppController();
        $appController->handleRequest();
        break;
    // Add more cases for other controllers as needed
    // Default case is usually used for app routes or 404 handling how this app does it
    default:
        $errorController = new ErrorController();
        $errorController->handleRequest();
        break;
}
?>