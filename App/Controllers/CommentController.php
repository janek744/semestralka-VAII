<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Comment;
use App\Models\User;
use App\Models\Prispevok;

class CommentController extends AControllerBase
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
        $comments = Comment::getAll();
        return $this->html($comments);
    }

    public function store() {
        $id = $this->request()->getValue('id');
        $comment = ( $id ? Comment::getOne($id) : new Comment());
        $error = 0;

        if ($this->request()->getValue('text') == null) {
            $error++;
        }
        else{$comment->setCommentText($this->request()->getValue('text'));}

        $comment->setCommentText($this->request()->getValue('post'));

        if ($error > 0) {return $this->redirect("?c=comment&a=create");
        } else {
            $comment->save();
            return $this->redirect("?c=prispevky");}
    }

    public function create() {
        return $this->html(new Comment(), viewName: 'create.comment');
    }
}