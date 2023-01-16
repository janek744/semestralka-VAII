<?php

namespace App\Models;

use App\Core\Model;

class Comment extends Model
{
    protected $id;
    protected $author;
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
    public function getCommentAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     */
    public function setCommentAuthor($author): void
    {
        $this->author = $author;
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

    /**
     * @return mixed
     */
    public function getCommentPost()
    {
        return $this->text;
    }

    /**
     * @param mixed $text
     */
    public function setCommentPost($text): void
    {
        $this->text = $text;
    }

}
