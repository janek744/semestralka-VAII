<?php

namespace App\Models;

use App\Core\Model;

class User extends Model
{
    protected $id;
    protected $username;
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
    public function getUserUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUserUsername($username): void
    {
        $this->username = $username;
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