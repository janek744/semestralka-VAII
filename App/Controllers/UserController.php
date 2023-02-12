<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Model;
use App\Config\Configuration;
use App\Core\Responses\Response;
use App\Models\User;

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
                //if(preg_match("/([a-zA-Z0-9])/", $userName) == FALSE){
                    return $this->html(["error" => 'Nesprávne zadaný login']);
                //}
            }

            if((strlen($userPass) < 3) || (strlen($userPass) > 10)){
                //if(!preg_match("/[0-9a-zA-Z]/",$userPass)) {
                    return $this->html(["error" => 'Nesprávne zadané heslo']);
                //}
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
}