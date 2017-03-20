<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\MenuRepository;
use App\Repositories\ArticlesRepository;
use App\Repositories\CommentsReposytory;

class BLogController extends SiteController
{
    //

    /**
     * BLogController constructor.
     * @param ArticlesRepository $a_rep
     * @param CommentsReposytory $c_rep
     */
    public function __construct(ArticlesRepository $a_rep, CommentsReposytory $c_rep) {

        $this->a_rep = $a_rep;
        $this->c_rep = $c_rep;

        parent::__construct(new MenuRepository(new \App\Menu));

        $this->template = env('THEME').'.blog';
        $this->bar = 'right';
        $this->title = 'Блог';
        $this->commentBar = TRUE;

    }

    /**
     * @param bool $cat_alias
     * @return $this
     */
    public function show($cat_alias = FALSE)
    {

        //Get content
        $articles = $this->getAllArticles($cat_alias);
        $content = view(env("THEME"). '.blog_content')->with('articles', $articles)->render();
        $this->vars = array_add($this->vars, 'content', $content);

        return $this->renderOutput();
    }



    public function showArticle($alias)
    {

        $article = $this->a_rep->one($alias, ['comments' => TRUE]);
        if ($article) {
            $article->img = json_decode($article->img);
        }

        $this->title = $article->title;

        $content = view(env('THEME'). '.article_content')->with('article', $article)->render();
        $this->vars = array_add($this->vars, 'content', $content);

        return $this->renderOutput();
    }


}
