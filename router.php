<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    '/laracasts/' => 'controllers/index.php',
    '/laracasts/index' => 'controllers/index.php',
    '/laracasts/about' => 'controllers/about.php',
    '/laracasts/notes' => 'controllers/notes.php',
    '/laracasts/note' => 'controllers/note.php',
    '/laracasts/contact' => 'controllers/contact.php',
];

function routeToController($uri, $routes) {
    if (array_key_exists($uri, $routes)) {
        require $routes[$uri];
    } else {
        abort();
    }
}

function abort($code = 404) {
    http_response_code($code);

    require "views/{$code}.php";
    die();
}

routeToController($uri, $routes);