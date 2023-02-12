<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Comment;
use App\Models\Event;
use App\Models\Prispevok;

class EventController extends AControllerBase
{
    /**
     * Authorize controller actions
     * @param $action
     * @return bool
     */
    public function authorize($action)
    {
        switch ($action) {
            case "store":
            case "create":
                return $this->app->getAuth()->isLogged();
        }
        return true;
    }

    public function index(): Response
    {
        $prispevky = Event::getAll();
        return $this->html($prispevky);
    }

    public function store()
    {
        $id = $this->request()->getValue('id');
        $text = $this->request()->getValue('message');
        $event = ($id ? Event::getOne($id) : new Event());
        $error = 0;

        $event->setText($text);

        $event->save();
        return $this->redirect("?c=prispevky");
    }
}
