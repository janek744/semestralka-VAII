<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\User;
use App\Models\Event;

class UserController extends AControllerBase
{
    /**
     * Authorize controller actions
     * @param $action
     * @return bool
     */
    public function authorize($action)
    {
        return true;
    }

    /**
     * Example of an action (authorization needed)
     * @return \App\Core\Responses\Response|\App\Core\Responses\ViewResponse
     */
    public function index(): Response
    {
        return $this->html();
    }

    public function register(): Response{
        $data = $this->request()->getPost();
        if (isset($data["login"])) {
            $allusers = User::getAll();
            $userName = $_POST["login"];
            $userPass = $_POST["password"];
            if((strlen($userName) < 1) || (strlen($userName) > 10)){
                if (!preg_match("/[^A-Za-z0-9]/", $userName)){
                    return $this->html(["error" => 'Nesprávne zadaný login']);
                }
            }

            if((strlen($userPass) < 3) || (strlen($userPass) > 10)){
                if (!preg_match("/[^A-Za-z0-9]/", $userPass)){
                    return $this->html(["error" => 'Nesprávne zadané heslo']);
                }
            }

            foreach ($allusers as $person){
                if($person->getUserLogin() == $data["login"]){
                    return $this->html(["error"=>'Použivateľ s týmto loginom už existuje']);
                }
            }

            $user = new User();
            $user->setUserLogin($data["login"]);
            $password = password_hash($data["password"], PASSWORD_DEFAULT);
            $user->setUserPassword($password);
            $user->save();

            return $this->redirect("?c=auth&a=login");
        }
        return $this->html();
    }

    public function edit(): Response{
        $data = $this->request()->getPost();


        if (isset($data["oldpass"])) {
            $user = User::getOne($this->app->getAuth()->getLoggedUserId());
            if (password_verify($data["oldpass"], $user->getUserPassword())) {
                $userPass = $data["newpass"];
                if((strlen($userPass) < 3) || (strlen($userPass) > 10)){
                    //if(!preg_match("/[0-9a-zA-Z]/",$userPass)) {
                    return $this->html(["error" => 'Nesprávne zadané nové heslo']);
                    //}
                }
                $password = password_hash($userPass, PASSWORD_DEFAULT);
                $user->setUserPassword($password);
                $user->save();
                return $this->redirect("?c=prispevky");
            } else {
                return $this->html(["error"=>'Zle zadané heslo']);
            }
        }

        return $this->html();
    }

    public function delete(): Response
    {
        $data = $this->request()->getPost();

        if (isset($data["oldpass"])) {
            $user = User::getOne($this->app->getAuth()->getLoggedUserId());
            if (password_verify($data["oldpass"], $user->getUserPassword())) {
                $this->app->getAuth()->logout();
                $user->delete();
                return $this->redirect("?c=prispevky");
            }
        }
        return $this->html();
    }
}