<?php

use Core\Database;
use Core\Validator;
use Core\App;
use Http\Forms\LoginForm;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

// Check if the form has been validated if it has not return to form field
if (!$form->validate($email, $password)) {
    return view('session/create.view.php', [
        'errors' => $form->errors()
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
return view('session/create.view.php', [
    'errors' => [
        'email' => 'No matching account found for that email address and password'
    ]
]);


