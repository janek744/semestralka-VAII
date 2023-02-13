<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Comment;
use App\Models\Prispevok;

class PrispevkyController extends AControllerBase
{
    /**
     * Authorize controller actions
     * @param $action
     * @return bool
     */
    public function authorize($action)
    {
        switch ($action) {
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
        $prispevky = Prispevok::getAll();
        return $this->html($prispevky);
    }

    public function delete()
    {
        $data = Prispevok::getAll();
        $commdata = Comment::getAll();
        $id = $this->request()->getValue('id');
        $i = false;

        foreach ($data as $log) {
            if ($log->getIdPrispevku() == $id) {
                $i = true;
                break;
            }
        }

        if ($i) {
            $id = $this->request()->getValue('id');
            $postToDelete = Prispevok::getOne($id);

            foreach ($commdata as $comm) {
                if ($comm->getCommentPost() == $id) {
                    $commId = $comm->getCommentId();
                    $commenttoDelete = Comment::getOne($commId);
                    if ($commenttoDelete) {
                        $commenttoDelete->delete();
                    }
                }
            }

            if ($postToDelete) {
                $postToDelete->delete();
            }

        return $this->redirect("?c=prispevky");
        }
    }

    public function store()
    {
        $id = $this->request()->getValue('id');
        $post = ($id ? Prispevok::getOne($id) : new Prispevok());
        $error = 0;

        if ($this->request()->getValue('obrazok') == null) {
            $post->setObrazok("Nezadany");
            $error++;
        } else {
            $post->setObrazok($this->request()->getValue('obrazok'));
        }

        if ($this->request()->getValue('nazov') == null) {
            $post->setNazov("Nezadany");
            $error++;
        } else {
            $post->setNazov($this->request()->getValue('nazov'));
        }

        if ($this->request()->getValue('text') == null) {
            $post->setText("Nezadany");
            $error++;
        } else {
            $post->setText($this->request()->getValue('text'));
        }

        if ($error > 0) {
            return $this->redirect("?c=prispevky&a=create");
        } else {
            $post->setUserID($this->app->getAuth()->getLoggedUserId());
            $option = $_POST["opt"];
            $post->setFilterID($option);
            $post->save();
            return $this->redirect("?c=prispevky");
        }
    }

    public function create() {
        return $this->html(new Prispevok(), viewName: 'create.form');
    }

    public function edit() {
        $data = Prispevok::getAll();
        $id = $this->request()->getValue('id');
        $i = false;

        foreach ($data as $log) {
            if ($log->getIdPrispevku() == $id) {
                $i = true;
                break;
            }
        }

        if ($i) {
            $postToEdit = Prispevok::getOne($id);
            return $this->html($postToEdit, viewName: 'create.form');
        } else {return $this->redirect("?c=prispevky");}
    }

    public function myPosts(): Response {
        $prispevky = Prispevok::getAll();
        return $this->html($prispevky);
    }
    public function refresh(): Response
    {
        $id = $this->request()->getValue('postID');
        $data = Prispevok::getAll();
        $i = 0;
        foreach ($data as $post) {
            if( $post->getFilterID() == $id){
                unset($data[$i]);
            }
            $i++;
        }

        return $this->html($data);
    }

    public function filteredPosts()
    {
        return $this->html();
        //$data = Prispevok::getAll();
        //return $this->html($data);
    }
}