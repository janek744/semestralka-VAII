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
        $users = User::getAll();
        return $this->html($users);
    }

    public function delete() {

        $id = $this->request()->getValue('id');
        $postToDelete = User::getOne($id);
        if ($postToDelete) {
            $postToDelete->delete();
        }
        return $this->redirect("?c=prispevky");
    }

    public function store() {
        $id = $this->request()->getValue('id');
        $user = ( $id ? User::getOne($id) : new User());
        $error = 0;

        if ($this->request()->getValue('username') == null) {
            $user->setUserUsername("Nezadany");
            $error++;
        }
        else{$user->setUserUsername($this->request()->getValue('username'));}

        if ($this->request()->getValue('password') == null) {
            $user->setUserPassword("Nezadany");
            $error++;
        } else {$user->setUserPassword($this->request()->getValue('password'));}

        if ($error > 0) {return $this->redirect("?c=users&a=create");
        } else {
            $user->save();
            return $this->redirect("?c=prispevky");}
    }

    public function create() {
        return $this->html(new User());
    }

    public function edit() {
        $id = $this->request()->getValue('id');
        return $this->redirect("?c=prispevky");
        $postToEdit = User::getOne($id);
        return $this->html($postToEdit);
    }
}