<?php

namespace App\Repositories;

use App\Article;

class ArticlesRepository extends Repository
{

    public function __construct(Article $articles)
    {
        $this->model = $articles;
    }

    public function one($alias, $params = array()) {

        $article = parent::one($alias, $params);

        if ($article && !empty($params)) {
            $article->load('comments');
            $article->comments->load('user');
        }

        return $article;
    }

}