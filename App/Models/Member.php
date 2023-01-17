<?php

namespace App\Models;

use App\Core\Model;

class Member extends Model
{
    protected $id;
    protected $login;
    protected $password;
    protected $active = false;

    /**
     * @return mixed
     */
    public function getMemberId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setMemberId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getMemberLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     */
    public function setMemberLogin($login): void
    {
        $this->login = $login;
    }

    /**
     * @return mixed
     */
    public function getMemberPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setMemberPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * @param bool $active
     */
    public function setActive(bool $active): void
    {
        $this->active = true;
    }
}