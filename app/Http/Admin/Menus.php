<?php

namespace App\Http\Admin;

use App\Menu;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;
use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use SleepingOwl\Admin\Contracts\Initializable;
/**
 * Class Menus
 *
 * @property \App\Menu $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Menus extends Section implements Initializable
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
    protected $title = 'Menus';

    /**
     * @var string
     */
    protected $alias;


    public function initialize()
    {
        $this->addToNavigation()->setIcon('fa fa-sitemap')->setPriority(1000);
    }

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        // todo: remove if unused

        return AdminDisplay::tree()->setValue('title');
    }

    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
        // todo: remove if unused

        return AdminForm::form()->setElements([
            AdminFormElement::text('title', 'Title')->required(),
            AdminFormElement::number('parent_id', 'Menus parent')->setMax(8)->required(),
//            AdminFormElement::ckeditor('text', 'Text')
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
