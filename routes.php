<?php

// return [
//     '/laracasts/' => 'controllers/index.php',
//     '/laracasts/index' => 'controllers/index.php',
//     '/laracasts/about' => 'controllers/about.php',
//     '/laracasts/notes' => 'controllers/notes/index.php',
//     '/laracasts/note' => 'controllers/notes/show.php',
//     '/laracasts/notes/create' => 'controllers/notes/create.php',
//     '/laracasts/contact' => 'controllers/contact.php',
// ];

$router->get('/laracasts/index', 'controllers/index.php');
$router->delete('/laracasts/note', 'controllers/notes/destory.php');

