<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\User;

class UsersController extends AControllerBase
{
    /**
     * Authorize controller actions
     * @param $action
     * @return bool
     */
    public function authorize($action)
    {
        switch ($action){
            case "delete":
            case "store":
            case "create":
            case "edit":
                return $this->app->getAuth()->isLogged();
        }
        return true;
    }

    public function index(): Response
    {
        return $this->html(new User(), viewName: 'log.user');
    }

    public function delete() {

        $id = $this->request()->getValue('id');
        $userToDelete = User::getOne($id);
        if ($userToDelete) {
            $userToDelete->delete();
        }
        return $this->redirect("?c=users");
    }

    public function store() {
        $id = $this->request()->getValue('id');
        $user = ( $id ? User::getOne($id) : new User());
        $error = 0;

        if ($this->request()->getValue('login') == null) {
            $error++;
        }
        else{$user->setUserLogin($this->request()->getValue('login'));}

        if ($this->request()->getValue('regpassword') == null) {
            $error++;
        } else {$user->setUserPassword($this->request()->getValue('regpassword'));}

        if ($error > 0) {
            echo "Nebolo vyplnené niektoré z polí";
            return $this->redirect("?c=users&a=create");
        } else {
            $user->save();
            return $this->redirect("?c=prispevky");}
    }

    public function log() {
        return $this->html(new User(), viewName: 'log.user');
    }

    public function compare()
    {
        $login = $this->request()->getValue('login');
        $user = User::getOne($login);

        echo $login;
        echo $user;


        if ($user != null) {
            $password = $this->request()->getValue('password');
            echo $password;
            if ($user->getUserPassword() == $password) {
                return $this->redirect("?c=prispevky");
            } else {
                echo "Zadané zlé heslo";
                return $this->html(new User(), viewName: 'log.user');
            }
        } else {
            echo "Nebol nájdený uživatel";
            return $this->html(new User(), viewName: 'log.user');
        }
    }

    public function create() {
        return $this->html(new User(), viewName: 'create.user');
    }

    public function edit() {
        $id = $this->request()->getValue('id');
        $userToEdit = User::getOne($id);
        return $this->html($userToEdit, viewName: 'create.user');
    }
}