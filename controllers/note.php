<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php

$config = require('config.php');
$db = new Database($config['database']);

$heading = 'Note';
$currentUserId = 1;

// Fetching a note from db and authorizing it //

//search for a single note from the database
$note = $db->query('SELECT * FROM notes WHERE id = :id', ['id' => $_GET['id']
])->findOrFail();

// then authorize users to only be able to view the page avaliable to them
authorize($note['user_id'] === $currentUserId);

require 'views/note.view.php';