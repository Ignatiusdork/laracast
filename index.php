<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>


<?php

require 'functions.php';

//require 'router.php';

//connect to mySQL db
$dsn = "mysql:host=localhost;dbname=blog;charset=utf8mb4";
$pdo = new PDO($dsn,'root');

$stmt = $pdo->prepare('SELECT * FROM posts');
$stmt->execute();
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($posts as $post) {
    echo "<li>" . $post['title'] . "</li>";
}