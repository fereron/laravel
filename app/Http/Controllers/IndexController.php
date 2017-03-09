<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\Repositories\MenuRepository;
use App\Repositories\SlidersRepository;
use App\Repositories\PortfolioRepository;
use App\Repositories\ArticlesRepository;

class IndexController extends SiteController
{
    //

    public function __construct(SlidersRepository $s_rep, PortfolioRepository $p_rep, ArticlesRepository $a_rep) {
        $this->s_rep = $s_rep;
        $this->p_rep = $p_rep;
        $this->a_rep = $a_rep;
        parent::__construct(new MenuRepository(new \App\Menu));

        $this->template = env('THEME').'.index';
        $this->bar = 'right';
        $this->title = 'Главная';

    }


    public function index()
    {

        // Get portfolios
        $portfolios = $this->getPortfolio();
        $content = view(env('THEME'). '.portfolio')->with( 'portfolios' , $portfolios)->render();
        $this->vars = array_add($this->vars, 'content', $content);


        //Get Sliders
        $sliderItems = $this->getSliders();
        $slider = view(env('THEME'). '.slider')->with('sliders', $sliderItems)->render();
        $this->vars = array_add($this->vars, 'slider', $slider);

        return $this->renderOutput();
    }



}
