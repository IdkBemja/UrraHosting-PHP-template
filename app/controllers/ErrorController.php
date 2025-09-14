<?php

class ErrorController {
    public function handleRequest() {
        $uri = $_SERVER['REQUEST_URI'];

        include __DIR__ . '/../templates/404.html';
    }
}
?>