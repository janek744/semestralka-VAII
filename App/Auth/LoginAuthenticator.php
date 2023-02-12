<?php

namespace App\Auth;

use App\Core\IAuthenticator;
use App\Models\User;

/**
 * Class LoginAuthenticator
 * @package App\Auth
 */

class LoginAuthenticator implements IAuthenticator
{

    /**
     * LoginAuthenticator constructor
     */
    public function __construct()
    {
        session_start();
    }

    /**
     * Verify, if the user is in DB and has his password is correct
     * @param $login
     * @param $password
     * @return bool
     * @throws \Exception
     */

    function login($login, $password) : bool
    {
        $allusers = User::getAll();
        $user = null;

        foreach ($allusers as $person) {
            if ($person->getUserLogin() == $login) {
                if (password_verify($password, $person->getUserPassword())) {
                    $user = $person;
                    break;
                }
            }
        }

        if ($user != null) {
            $_SESSION["user"] = $user;
            return true;
        } else {
            return false;
        }
    }

    /**
     * Logout the user
     */
    function logout() : void
    {
        if (isset($_SESSION["user"])) {
            unset($_SESSION["user"]);
            session_destroy();
        }
    }

    function isLogged() : bool
    {
        return isset($_SESSION["user"]);
    }

    function getLoggedUserId(): mixed
    {
        return $_SESSION["user"]->getUserId() ?? throw new \Exception("User not logged in");
    }

    function getLoggedUserContext(): mixed
    {
        return $_SESSION["user"] ?? throw new \Exception("User not logged in");
    }

    function getLoggedUserName(): string
    {
        return $_SESSION["user"]->getUserLogin() ?? throw new \Exception("User not logged in");
    }
}