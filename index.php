<?php

require 'functions.php';

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    '/laracasts/index.php' => 'controllers/index.php',
    '/laracasts/about.php' => 'controllers/about.php',
    '/laracasts/contact.php' => 'controllers/contact.php',
];

if (array_key_exists($uri, $routes)) {
    require $routes[$uri];
}