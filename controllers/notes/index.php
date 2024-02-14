<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$notes = $db->query('SELECT * FROM notes WHERE user_id = 1')->get();

view("notes/index.view.php", [
    'heading' => "My Notes",
    'notes' => $notes
]);