<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Comment;

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

    public function delete() {

        $id = $this->request()->getValue('id');
        $postToDelete = Comment::getOne($id);
        if ($postToDelete) {
            $postToDelete->delete();
        }
        return $this->redirect("?c=prispevky");
    }

    public function store() {
        $id = $this->request()->getValue('id');
        $post = ( $id ? Comment::getOne($id) : new Comment());
        $error = 0;

        if ($this->request()->getValue('text') == null) {
            $error++;
        }
        else{$post->setCommentText($this->request()->getValue('text'));}

        if ($error > 0) {return $this->redirect("?c=prispevky&a=create");
        } else {
            $post->save();
            return $this->redirect("?c=prispevky");}
    }

    public function create() {
        return $this->html(new Comment(), viewName: 'create.comment');
    }
}