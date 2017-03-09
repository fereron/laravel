<?php

namespace App\Providers;

use App\Comment;
use App\Portfolio;
use SleepingOwl\Admin\Providers\AdminSectionsServiceProvider as ServiceProvider;

class AdminSectionsServiceProvider extends ServiceProvider
{

    /**
     * @var array
     */
    protected $sections = [
        //\App\User::class => 'App\Http\Sections\Users',
        \App\Article::class => 'App\Http\Admin\Articles',
        \App\Menu::class => 'App\Http\Admin\Menus',
        Portfolio::class => 'App\Http\Admin\Portfolios',
        Comment::class => 'App\Http\Admin\Comments',
    ];

    /**
     * Register sections.
     *
     * @return void
     */
    public function boot(\SleepingOwl\Admin\Admin $admin)
    {
    	//

        parent::boot($admin);
    }
}
