<?php

namespace App\Models;

use App\Core\Model;

class Comment extends Model
{
    protected $id;
    protected $post;
    protected $text;

    /**
     * @return mixed
     */
    public function getCommentId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setCommentId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getCommentPost()
    {
        return $this->post;
    }

    /**
     * @param mixed $post
     */
    public function setCommentPost($post): void
    {
        $this->post = $post;
    }

    /**
     * @return mixed
     */
    public function getCommentText()
    {
        return $this->text;
    }

    /**
     * @param mixed $text
     */
    public function setCommentText($text): void
    {
        $this->text = $text;
    }


}
