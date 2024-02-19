<?php

namespace Core;

class Authenticator {

    // attempt to login a user
    public function attempt($email, $password) {

        //match the credentials from the database
        $user = App::resolve(Database::class)->query('SELECT * FROM users WHERE email = :email', [
            'email' => $email
        ])->find();

        // if we found matches then proceed to the next step
        if ($user) {
            // we have a user, but we don't know if the password provided matches what we have in the db
            if (password_verify($password, $user['password'])) {
                $this->login([
                    'email' => $email
                ]);
    
                return true;
            }
        }
        
        return false;
    }

    public function login($user) {

        $_SESSION['user'] = [ 
           'email' => $user['email']
        ];
    
        session_regenerate_id(true);
    }
    
    public function logout() {
    
        $_SESSION = [];
        session_destroy();
    
        $params = session_get_cookie_params();
        setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']); 
    }
}