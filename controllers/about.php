<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php

//echo $_SERVER['REQUEST_URI'];

view("about.view.php", [
    'heading' => 'Home',
]);