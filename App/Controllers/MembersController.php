<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Member;
use App\App;

class MembersController extends AControllerBase

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
        return $this->html(new Member(), viewName: 'log.member');
    }

    public function delete() {
        $data = Member::getAll();

        $id = $this->request()->getValue('id');
        $password = $this->request()->getValue('oldpass');


        $id = 0;

        foreach ($data as $log) {
            if ($log->isActive()) {
                $id = $log->getMemberId();
                break;
            }
        }
        $id = 13;
        $userToDelete = Member::getOne($id);
        if ($userToDelete->getMemberPassword() == $password) {
            if ($userToDelete) {
                $userToDelete->delete();
            }
            return $this->redirect("?c=members");
        } else {
            echo "Zadané zlé heslo";
            $this->remove();
        }
    }

    public function remove() {
        return $this->html(new Member(), viewName: 'remove.member');
    }

    public function store()
    {
        $data = Member::getAll();

        $login = $this->request()->getValue('login');
        $i = false;

        foreach ($data as $log) {
            if ($log->getMemberLogin() == $login) {
                $i = true;
                break;
            }
        }
        if (!$i) {
            $user = new Member();
            //$id = $this->request()->getValue('id');
            //$user = ( $id ? Member::getOne($id) : new Member());
            $error = 0;

            if ($this->request()->getValue('login') == null) {
                $error++;
            } else {
                $user->setMemberLogin($this->request()->getValue('login'));
            }

            if ($this->request()->getValue('password') == null) {
                $error++;
            } else {
                $user->setMemberPassword($this->request()->getValue('password'));
            }

            if ($error > 0) {
                echo "Nebolo vyplnené niektoré z polí";
                return $this->redirect("?c=members&a=create");
            } else {
                $user->save();
                return $this->redirect("?c=prispevky");
            }
        } else {
            echo "Použivateľ s rovnakým menom";
            return $this->redirect("?c=members&a=create");
        }
    }

    public function log() {
        return $this->html(new Member(), viewName: 'log.member');
    }

    public function compare()
    {
        $data = Member::getAll();

        $login = $this->request()->getValue('login');
        $password = $this->request()->getValue('password');
        $i = false;
        $id = 0;

        foreach ($data as $log) {
            if ($log->getMemberLogin() == $login) {
                $i = true;
                $id = $log->getMemberId();
                break;
            }
        }
        if (!$i) {
            echo "Použivatel sa v databáze nenachádza";
            return $this->html(new Member(), viewName: 'log.member');
        } else {
            if (Member::getOne($id)->getMemberPassword() == $password) {
                echo "Uživatel bol prihlásený";
                echo $id;
                if (Member::getOne($id)->isActive()) {
                    echo "active";
                } else { echo "not active";}

                Member::getOne($id)->setActive(true);

                if (Member::getOne($id)->isActive()) {
                    echo "active";
                } else { echo "not active";}

                Member::getOne(50)->setMemberPassword("dsasad");
                return $this->redirect("?c=prispevky");
            } else {
                echo "Zadané zlé heslo";
                return $this->html(new Member(), viewName: 'log.member');
            }
        }
    }

    public function create() {
        return $this->html(new Member(), viewName: 'create.member');
    }

    public function change() {
        return $this->html(new Member(), viewName: 'change.member');
    }

    public function edit() {
        $data = Member::getAll();

        $oldpass = $this->request()->getValue('oldpass');
        $newpass = $this->request()->getValue('newpass');
        $id = 0;

        foreach ($data as $log) {
            if ($log->isActive()) {
                $id = $log->getMemberId();
                break;
            }
        }
        echo $id;
        if (Member::getOne(16)->isActive()) {
            echo "active";
        } else { echo "not active";}

        $userToEdit = Member::getOne($id);

        if ($userToEdit->getMemberPassword() == $oldpass) {
            $userToEdit->setMemberPassword($newpass);
            $userToEdit->save();
        }


        return $this->redirect("?c=prispevky");
    }
}