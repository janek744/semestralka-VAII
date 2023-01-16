<?php

namespace App\Models;

use App\Core\Model;

class User extends Model
{
    protected $id;
    protected $login;
    protected $password;

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setUserId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUserLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     */
    public function setUserLogin($login): void
    {
        $this->login = $login;
    }

    /**
     * @return mixed
     */
    public function getUserPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setUserPassword($password): void
    {
        $this->password = $password;
    }
}