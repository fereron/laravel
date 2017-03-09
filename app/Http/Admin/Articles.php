<?php

namespace App\Http\Admin;

use App\Article;
use App\Category;
use App\User;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;
use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
//use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
//use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Contracts\Initializable;
//use SleepingOwl\Admin\Section;

/**
 * Class Articles
 *
 * @property \App\Article $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Articles extends Section implements Initializable
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
    protected $title = 'Articles';

    /**
     * @var string
     */
    protected $alias;


    public function initialize()
    {
        $this->addToNavigation()->setIcon('fa fa-newspaper-o')->setPriority(10000);
    }

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        // todo: remove if unused

        $display = AdminDisplay::datatablesAsync()
            ->setColumns([
            AdminColumn::link('title', 'Title'),
            AdminColumn::custom('Author', function(Article $article) {
                return $article->user->name;
            })->setWidth('150px'),
            AdminColumn::datetime('created_at', 'Created')->setFormat('d.m.Y')->setWidth('150px'),
        ])->paginate(5);

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
            AdminFormElement::text('title', 'Title')->required(),
            AdminFormElement::columns()
                ->addColumn([
                    AdminFormElement::select('category_id', 'Category', Category::class)->setDisplay('title')->required()
                ], 3)->addColumn([
                    AdminFormElement::text('alias', 'Alias')->required()
                ]),

            AdminFormElement::wysiwyg('text', 'Text', 'ckeditor')->required(),
            AdminFormElement::wysiwyg('description', 'Description', 'ckeditor')->required()->setHeight('100'),

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
