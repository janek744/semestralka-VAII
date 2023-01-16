<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
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
        $prispevky = Prispevok::getAll();
        return $this->html($prispevky);
    }

    public function delete() {

        $id = $this->request()->getValue('id');
        $postToDelete = Prispevok::getOne($id);
        if ($postToDelete) {
            $postToDelete->delete();
        }
        return $this->redirect("?c=prispevky");
    }

    public function store() {
        $id = $this->request()->getValue('id');
        $post = ( $id ? Prispevok::getOne($id) : new Prispevok());
        $error = 0;

        if ($this->request()->getValue('obrazok') == null) {
            $post->setObrazok("Nezadany");
            $error++;
        }
        else{$post->setObrazok($this->request()->getValue('obrazok'));}

        if ($this->request()->getValue('nazov') == null) {
            $post->setNazov("Nezadany");
            $error++;
        } else {$post->setNazov($this->request()->getValue('nazov'));}

        if ($this->request()->getValue('text') == null) {
            $post->setText("Nezadany");
            $error++;
        } else{$post->setText($this->request()->getValue('text'));}

        if ($error > 0) {return $this->redirect("?c=prispevky&a=create");
        } else {
            $post->save();
            return $this->redirect("?c=prispevky");}
    }

    public function create() {
        return $this->html(new Prispevok(), viewName: 'create.form');
    }

    public function edit() {
        $id = $this->request()->getValue('id');
        $postToEdit = Prispevok::getOne($id);
        return $this->html($postToEdit, viewName: 'create.form');
    }
}