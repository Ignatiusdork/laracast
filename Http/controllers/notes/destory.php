<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUserId = 1;

//search for a single note from the database to delete
$note = $db->query('SELECT * FROM notes WHERE id = :id', [
    'id' => $_POST['id']
])->findOrFail();

// authorize users are only able to delete the notes created by them
authorize($note['user_id'] === $currentUserId);

// form was sumbmitted, delete the current note
$db->query('DELETE FROM notes WHERE id = :id', [
    'id' => $_POST['id']
]);

header('Location: /laracasts/notes');
exit();
