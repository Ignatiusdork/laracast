<?php

$router->get('/laracasts/', 'controllers/index.php');
$router->get('/laracasts/index', 'controllers/index.php');
$router->get('/laracasts/about', 'controllers/about.php');
$router->get('/laracasts/contact', 'controllers/contact.php');

$router->get('/laracasts/notes', 'controllers/notes/index.php');
$router->get('/laracasts/note', 'controllers/notes/show.php');
$router->delete('/laracasts/note', 'controllers/notes/destory.php');
$router->get('/laracasts/notes/create', 'controllers/notes/create.php');

