<?php

namespace App\Auth;

class LoginAuthenticator extends DummyAuthenticator
{

    function login($login, $password): bool
    {
        $error = 0;
        if (empty($login)){$error++;}
        if (empty($password)){$error++;}

        if(!empty($login)) {
            if (preg_match("/[^A-Za-z0-9]/", $login)) {$error++;}
        }

        if (!empty($password)) {
            if (preg_match("/[^A-Za-z0-9]/", $password)){$error++;}
        }

        if ($error <= 0) {
            $_SESSION['user'] = $login;
            return true;
        }
        return false;
    }
}