<?php

namespace App\Http\Admin;

use App\Article;
use App\Comment;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;
use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use SleepingOwl\Admin\Contracts\Initializable;

/**
 * Class Comments
 *
 * @property \App\Comment $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Comments extends Section implements Initializable
{
    /**
     * @see http://sleepingowladmin.ru/docs/model_configuration#ограничение-прав-доступа
     *
     * @var bool
     */
    protected $checkAccess = false;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $alias;

    public function initialize()
    {
        $this->addToNavigation()->setIcon('fa fa-sitemap')->setPriority(100000);
    }


    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        // todo: remove if unused

        $display = AdminDisplay::tabbed();

        $display->setTabs(function() {

        $tabs = [];

        $main = AdminDisplay::datatables();
            $main->with('article');


            $main->setColumns([
            $nameColumn = AdminColumn::link('name', 'Name')->setWidth(150),
            $emailColumn = AdminColumn::email('email', 'Email'),
            $articleColumn = AdminColumn::custom('Article', function(Comment $comment) {
                return $comment->article->title;
            }),
            $userColumn = AdminColumn::custom('Text', function(Comment $comment) {

                    return str_limit($comment->text, 150);

            })->setWidth(200),
            $created_atColumn = AdminColumn::datetime('created_at', 'Created at')->setFormat('d.m.Y'),

        ]);

        $nameColumn->getHeader()->setHtmlAttribute('class', 'bg-grey');
        $emailColumn->getHeader()->setHtmlAttribute('class', 'bg-blue');
        $articleColumn->getHeader()->setHtmlAttribute('class', 'bg-orange');
        $userColumn->getHeader()->setHtmlAttribute('class', 'bg-maroon');
        $created_atColumn->getHeader()->setHtmlAttribute('class', 'bg-purple');

        // Change Control Column
            $main->getColumns()->getControlColumn()->getHeader()->setTitle('Control')->setHtmlAttribute('class', 'bg-black');

            $main->paginate(10);

            $tabs[] = AdminDisplay::tab($main, 'Main')->setActive();

//            $tree = AdminDisplay::tree()->setValue('text');

//            $tabs[] = AdminDisplay::tab($tree, 'Comments');

            return $tabs;
        });


        return $display;
    }

    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
        // todo: remove if unused

        return AdminForm::form()->setItems([
            AdminFormElement::text('name', 'Name')->required(),
            AdminFormElement::text('email', 'Email')->required(),
            AdminFormElement::text('website', 'Website')->required(),
            AdminFormElement::columns()
                ->addColumn([
                    AdminFormElement::select('user_id', 'User', \App\User::class)->setDisplay('name')
                ], 3)->addColumn([
                    AdminFormElement::select('article_id', 'Article', Article::class)->setDisplay('title')->required()
                ]),

            AdminFormElement::wysiwyg('text', 'Text', 'simplemde')->setHeight(150)->required(),


        ]);
    }

    /**
     * @return FormInterface
     */
    public function onCreate()
    {
        return $this->onEdit(null);
    }

    /**
     * @return void
     */
    public function onDelete($id)
    {
        // todo: remove if unused
    }

    /**
     * @return void
     */
    public function onRestore($id)
    {
        // todo: remove if unused
    }
}
