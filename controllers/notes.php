<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php

$config = require('config.php');

// initiate the db connection
$db = new Database($config['database']);

$heading = 'My Notes';

$notes = $db->query('SELECT * FROM notes WHERE user_id = 1')->get();

require "views/notes.view.php";