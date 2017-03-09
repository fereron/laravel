<?php

namespace App\Http\Controllers;

use App\Repositories\MenuRepository;
use App\Repositories\PortfolioRepository;
use Illuminate\Http\Request;


class PortfoliosController extends SiteController
{
    //

    public function __construct(MenuRepository $m_rep, PortfolioRepository $p_rep)
    {
        parent::__construct($m_rep);

        $this->p_rep = $p_rep;

        $this->template = env('THEME'). '.pages.portfolios';
        $this->bar = 'no';
        $this->title = 'Портфолио';

    }

    public function show() {
        $portfolios = $this->getAllPortfolios();
        $content = view(env('THEME'). '.portfolios_content')->with('portfolios', $portfolios)->render();
        $this->vars = array_add($this->vars, 'content', $content);

        return $this->renderOutput();
    }

    public function showPortfolio($alias)
    {
        $portfolio = $this->getPortfolioByAlias($alias);
        if ($portfolio) {
            $portfolio->img = json_decode($portfolio->img);
        }
        $portfolios = $this->getAllPortfolios(FALSE);
        $content = view(env('THEME'). '.portfolio_content')->with(['portfolios' => $portfolios, 'portfolio' => $portfolio])->render();
        $this->vars = array_add($this->vars, 'content', $content);


        return $this->renderOutput();
    }

}
