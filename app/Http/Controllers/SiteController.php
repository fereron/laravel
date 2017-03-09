<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\MenuRepository;
use Menu;
use Config;
use App\Category;

class SiteController extends Controller
{

    protected $a_rep;           // Articles Repository
    protected $p_rep;           // Portfolios Repository
    protected $s_rep;           // Sliders Repository
    protected $m_rep;           // Menus Repository
    protected $c_rep;           // Comments Repository

    protected $title;
    protected $meta_description;
    protected $meta_keywords;

    protected $template;
    protected $vars = array();

    protected $bar = FALSE;

    protected $commentBar = FALSE;
    protected $contactBar = FALSE;

    public function __construct(MenuRepository $m_rep)
    {
        $this->m_rep = $m_rep;
    }
    protected function renderOutput() {

        $menu = $this->getMenu();
        $navigation = view(env('THEME').'.navigation')->with('menu', $menu)->render();
        $this->vars = array_add($this->vars, 'navigation', $navigation);

        $footer = view(env('THEME'). '.footer')->render();
        $this->vars = array_add($this->vars, 'footer', $footer);

        $this->vars = array_add($this->vars, 'title', $this->title);
        $this->vars = array_add($this->vars, 'title', $this->meta_description);
        $this->vars = array_add($this->vars, 'title', $this->meta_keywords);

        if ($this->commentBar) {
            $this->vars = array_add($this->vars, 'bar', $this->bar);
            $comments = $this->getCommentsForSidebar();
            $sidebar = view(env('THEME').'.commentBar')->with('comments', $comments);
            $this->vars = array_add($this->vars, 'sidebar', $sidebar);
        }
        else if ($this->contactBar) {
            $this->vars = array_add($this->vars, 'bar', $this->bar);
            $sidebar = view(env('THEME').'.contactBar')->render();
            $this->vars = array_add($this->vars, 'sidebar', $sidebar);
        }
        else if ($this->bar != 'no') {
            $this->vars = array_add($this->vars, 'bar', $this->bar);
            $articles = $this->getArticlesForSidebar();
            $sidebar = view(env('THEME').'.sidebar')->with('articles', $articles);
            $this->vars = array_add($this->vars, 'sidebar', $sidebar);
        }

        return view($this->template)->with($this->vars);
    }


    protected function getMenu() {

        $menu = $this->m_rep->get();
//        dd($menu);
        $m_builder = Menu::make('MyNav', function ($m) use ($menu) {

            foreach ($menu as $item) {
//                dump($m->find($item->parent));

                if ($item->parent_id == NULL) {
//                    dump($item->title);
                    $m->add($item->title, $item->path)->id($item->id);
                }
                else {

//                    $m->item($item)
                    if ($m->find($item->parent_id)) {
//                        dump($item);
                        $m->find($item->parent_id)->add($item->title, $item->path)->id($item->id);
                    }
                }
            }
        });
//        dump($m_builder);
        return $m_builder;
    }

    protected function getSliders() {

        $sliders = $this->s_rep->get();
        return $sliders;
    }

    protected function getPortfolio() {

        $portfolio = $this->p_rep->get('*', Config::get('settings.home_portfolios_count'));
        return $portfolio;
    }


    protected function getArticlesForSidebar() {

        $articles = $this->a_rep->get(['title', 'created_at', 'img', 'alias'], Config::get('settings.sidebar_articles_count'));
        return $articles;
    }

    protected function getAllArticles($alias = FALSE) {

        $where = FALSE;

        if ($alias) {
            $id = Category::select('id')->where('alias', $alias)->first()->id;

            $where = ['category_id', $id];
        }

        $articles = $this->a_rep->get('*', FALSE, TRUE, $where);

        if ($articles) {
            $articles->load('category', 'user', 'comments');
        }

        return $articles;
    }

    protected function getCommentsForSidebar() {

        $comments = $this->c_rep->get(['name', 'article_id', 'user_id', 'text'], Config::get('settings.sidebar_comments_count'), FALSE, FALSE, 'DESC');

        if ($comments) {
            $comments->load('article', 'user');
        }

        return $comments;
    }

    protected function getAllPortfolios($paginate = TRUE) {

        $portfolios = $this->p_rep->get('*', FALSE, $paginate);
        return $portfolios;
    }

    protected function getPortfolioByAlias($alias) {

        $portfolio = $this->p_rep->one($alias);
        return $portfolio;
    }


}
