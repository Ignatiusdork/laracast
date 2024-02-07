<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>


<?php

require 'functions.php';
require 'Database.php';

$config = require('config.php');

$db = new Database($config['database']);

// Check if 'id' is set in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM posts WHERE id = ?";
    $posts = $db->query($query, [$id])->fetch();

    // Check if a post was found before attempting to dump it
    if ($posts) {
        dd($posts);
    } else {
        echo "No post found with the given ID.";
    }
} else {
    echo "ID parameter not provided in the URL.";
}