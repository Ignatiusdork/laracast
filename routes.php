<?php

$router->get('/laracasts', 'index.php');
$router->get('/laracasts/index', 'index.php');
$router->get('/laracasts/about', 'about.php');
$router->get('/laracasts/contact', 'contact.php');

$router->get('/laracasts/notes', 'notes/index.php')->only('auth');
$router->get('/laracasts/note', 'notes/show.php');
$router->delete('/laracasts/note', 'notes/destory.php');

$router->get('/laracasts/note/edit', 'notes/edit.php');
$router->patch('/laracasts/note', 'notes/update.php');

$router->get('/laracasts/notes/create', 'notes/create.php');
$router->post('/laracasts/notes/create', 'notes/store.php');

$router->get('/laracasts/register', 'registration/create.php')->only('guest');
$router->post('/laracasts/register', 'registration/store.php')->only('guest');

$router->get('/laracasts/login', 'session/create.php')->only('guest');
$router->post('/laracasts/session', 'session/store.php')->only('guest');
$router->delete('/laracasts/session', 'session/destory.php')->only('auth');