<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php

use Core\Authenticator;
use Core\Session;
use Core\ValidationException;
use Http\Forms\LoginForm;


// Check if the form has been validated if it has not return to form field
try {

    // Create a new login form
    $form = LoginForm::validate($attributes = [
        'email' => $_POST['email'],
        'password' => $_POST['password']
    ]);

} catch (ValidationException $exception) {
    Session::flash('errors', $exception->errors);
    Session::flash('old', $exception->old);

    return redirect('/laracasts/login');
}

// attempt and signin user if login authentification is true and redirect else update errors list and send the users to login form/page
if ((new Authenticator)->attempt($attributes['$email'], $attributes['$password'])) {
    redirect('/laracasts/index');
} 

$form->error('email', 'The email and passwords credentials do not match our records.');

redirect('/laracasts/login');