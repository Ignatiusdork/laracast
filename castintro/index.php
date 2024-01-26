<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php 

$books = [
    [
        'name' => '12 Rules',
        'author' => 'Jordan Peterson',
        'releaseYear' => 2018,
        'genre' => 'Philosophy',
        'purchaseUrl' => 'http://example.com'
    ],

    [
        'name' => 'Art Of War',
        'author' => 'Sun Tzu',
        'releaseYear' => 2019,
        'genre' => 'Philosophy/Phychology',
        'purchaseUrl' => 'http://example.com'
    ],

    [
        'name' => 'Art Of War',
        'author' => 'Sun Tzu',
        'releaseYear' => 2019,
        'genre' => 'Philosophy/Phychology',
        'purchaseUrl' => 'http://example.com'
    ],

    [
        'name' => 'Blink',
        'author' => 'Malcolm Gladwell',
        'releaseYear' => 1968,
        'genre' => 'Philosophy/Phychology',
        'purchaseUrl' => 'http://example.com'
    ],
];

function filter($items, $fn) {
    $filteredItems = [];

    foreach ($items as $item) {
        if ($fn($item)) {
            $filteredItems[] = $item;
        }
    }
    return $filteredItems;
};

$filteredBooks = array_filter($books,function ($book) {
    return $book["releaseYear"] >= 1950 && $book['releaseYear'] <= 2020;
});

require 'index.view.php';