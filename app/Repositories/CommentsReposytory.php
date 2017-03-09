<?php

namespace App\Repositories;

use App\Comment;

class CommentsReposytory extends Repository
{

    public function __construct(Comment $comments)
    {
        $this->model = $comments;
    }

}