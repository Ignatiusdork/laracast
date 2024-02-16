<?php

use Core\Database;
use Core\Validator;
use Core\App;

$email = $_POST['email'];
$password = $_POST['password'];

// validate the form inputs
$errors = [];

if (!Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address';
}

if (!Validator::string($password, 7, 255)) { 
    $errors['password'] = "Password must be between 7 and 255 characters";
}

if (!empty($errors)) {
    return view('registration/create.view.php', [
        'errors' => $errors
    ]);
}

$db = App::resolve(Database::class);
// check if the account already exists
$user = $db->query('SELECT * FROM users WHERE email = :email', [
    ':email' => $email
])->find();

if ($user) {
    // then someone with that email already exits and has an account
    // if yes, redirect to a login page
    header('location: /laracasts/index');
} else {
    // if not, save one to the database, and then log the user in, and redirect
    $db->query('INSERT INTO users(email, password) VALUES(:email, :password)', [
        ':email' => $email,
        ':password' => $password
    ]);

    // mark that the user has logged in using sessions
    $_SESSION['user'] = [
        'email' => $email
    ];

    header('location: /laracasts/index');
    exit();
}
