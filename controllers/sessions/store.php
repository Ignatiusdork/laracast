<?php

use Core\Database;
use Core\Validator;
use Core\App;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

if (!Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address';
}

if (!Validator::string($password)) { 
    $errors['password'] = "Password must be valid";
}

if (! empty($errors)) {
    return view('sessions/create.view.php', [
        'errors' => $errors
    ]);
}

//match the credentials from the database
$user = $db->query('SELECT * FROM users WHERE email = :email', [
    'email' => $email
])->find();

// if we found matches then proceed to the next step
if ($user) {
    // we have a user, but we don't know if the password provided matches what we have in the db
    if (password_verify($password, $user['password'])) {
        login([
            'email' => $email
        ]);

        header('location: /laracasts/index');
        exit();
    }
}

// else return  to the form with errors
return view('sessions/create.view.php', [
    'errors' => [
        'email' => 'No matching account found for that email address and password'
    ]
]);


