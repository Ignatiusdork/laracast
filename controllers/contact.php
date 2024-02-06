<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php

echo $_SERVER['REQUEST_URI'];
$heading = 'Contact Us!';

require 'views/contact.view.php';