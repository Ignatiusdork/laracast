<?php

//$errors = isset($_SESSION['_flash']['errors']) ? $_SESSION['_flash']['errors'] : [];

view('session/create.view.php', [
    'errors' => $_SESSION['_flash']['errors'] ?? []
]);

