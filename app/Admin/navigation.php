<?php

use SleepingOwl\Admin\Navigation\Page;

// Default check access logic
 AdminNavigation::setAccessLogic(function(Page $page) {
 	   return auth()->user()->isAdmin();
 });
//
// AdminNavigation::addPage(\App\User::class)->setTitle('test')->setPages(function(Page $page) {
// 	  $page
//		  ->addPage()
//	  	  ->setTitle('Dashboard')
//		  ->setUrl(route('admin.dashboard'))
//		  ->setPriority(100);
//
//	  $page->addPage(\App\User::class);
// });
//
// // or
//
// AdminSection::addMenuPage(\App\Article::class)->setIcon('fa fa-user')->setPriority(3);

return [
    [
        'title' => 'Dashboard',
        'icon'  => 'fa fa-dashboard',
        'url'   => route('admin.dashboard'),
    ],

//    [
//        'title' => 'Information',
//        'icon'  => 'fa fa-exclamation-circle',
//        'url'   => route('admin.information'),
//    ],

//    [
//        'title' => 'Content',
//        'icon' => 'fa fa-newspaper-o',
//        'pages' => [
//            (new \SleepingOwl\Admin\Navigation\Page(\App\Article::class))
//            ->setIcon('fa fa-newspaper-o')
//            ->setPriority(0)
//        ]
//
//
//    ],

    // Examples
     [
        'title' => 'Content',
        'pages' => [
    //
    //        \App\User::class,
    //
    //        // or
    //
//            (new Page(\App\User::class))
//                ->setPriority(100)
//                ->setIcon('fa fa-user')
//                ->setUrl('users')
//                ->setAccessLogic(function (Page $page) {
//                    return auth()->user();
//                }),
    //
    //        // or
    //
//            new Page([
//                'title'    => 'News',
//                'priority' => 200,
//                'model'    => \App\Article::class
//            ]),
    //
    //        // or
//            (new Page('Blog111'))->setPages(function (Page $page) {
//                $page->addPage([
//                    'title'    => 'Blog',
//                    'priority' => 100,
//                    'model'    => \App\Article::class
//			      ]);
//
//			      $page->addPage(\App\Article::class);
//    	      }),
    //
    //        // or
    //
    //        [
    //            'title'       => 'News',
    //            'priority'    => 300,
    //            'accessLogic' => function ($page) {
    //                return $page->isActive();
    //		      },
    //            'pages'       => [
    //
    //                // ...
    //
    //            ]
    //        ]
        ]
     ]
];