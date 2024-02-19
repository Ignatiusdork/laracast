<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php

use Core\Authenticator;
use Core\Session;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

// Create a new login form
$form = new LoginForm();

// Check if the form has been validated if it has not return to form field
if ($form->validate($email, $password)) {

    $auth = new Authenticator();

    // attempt and signin user if login authentification is true and redirect else update errors list and send the users to login form/page
    if ((new Authenticator)->attempt($email, $password)) {

        redirect('/laracasts/index');
    } 

    $form->error('email', 'The email and passwords credentials do not match our records.');

}

Session::flash('errors', $form->errors());
Session::flash('old', [
    'email' => $_POST['email']
]);

redirect('/laracasts/login');