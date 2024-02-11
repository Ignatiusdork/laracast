<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>


<?php

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'functions.php';

require base_path('Database.php');
require base_path('Response.php');
require base_path('router.php');




