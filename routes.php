<?php

$router->get('/laracasts', 'controllers/index.php');
$router->get('/laracasts/index', 'controllers/index.php');
$router->get('/laracasts/about', 'controllers/about.php');
$router->get('/laracasts/contact', 'controllers/contact.php');

$router->get('/laracasts/notes', 'controllers/notes/index.php')->only('auth');
$router->get('/laracasts/note', 'controllers/notes/show.php');
$router->delete('/laracasts/note', 'controllers/notes/destory.php');

$router->get('/laracasts/note/edit', 'controllers/notes/edit.php');
$router->patch('/laracasts/note', 'controllers/notes/update.php');

$router->get('/laracasts/notes/create', 'controllers/notes/create.php');
$router->post('/laracasts/notes/create', 'controllers/notes/store.php');

$router->get('/laracasts/register', 'controllers/registration/create.php')->only('guest');
$router->post('/laracasts/register', 'controllers/registration/store.php')->only('guest');

$router->get('/laracasts/login', 'controllers/session/create.php')->only('guest');
$router->post('/laracasts/session', 'controllers/session/store.php')->only('guest');
$router->delete('/laracasts/session', 'controllers/session/destory.php')->only('auth');