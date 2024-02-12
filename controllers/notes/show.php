<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

$currentUserId = 1;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //search for a single note from the database to delete
    $note = $db->query('SELECT * FROM notes WHERE id = :id', ['id' => $_GET['id']
    ])->findOrFail();
    
    // authorize users are only able to delete the notes created by them
    authorize($note['user_id'] === $currentUserId);

    // form was sumbmitted, delete the current note
    $db->query('DELETE FROM notes WHERE id = :id', [
        'id' => $_GET['id']
    ]);

    header('Location: /laracasts/notes');
    exit();

} else {

    // Fetching a note from db and authorizing it //

    //search for a single note from the database
    $note = $db->query('SELECT * FROM notes WHERE id = :id', ['id' => $_GET['id']
    ])->findOrFail();

    // authorize users to only be able to view the page avaliable to them
    authorize($note['user_id'] === $currentUserId);

    view("notes/show.view.php", [
        'heading' => 'Note',
        'note' => $note
    ]);
}
