<?php

class AppController {
    public function handleRequest() {
        $uri = $_SERVER['REQUEST_URI'];

        // Main Route
        if ($uri === '/' || $uri === '/app' || $uri === '/helloworld') {
            include __DIR__ . '/../templates/index.html'; // <- Change this to what html file you want to show
        } else {
            http_response_code(404);
            echo "Page not found.";
        }
    }
}
?>