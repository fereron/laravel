<?php

namespace App\Http\Admin;

use App\Filter;
use App\Portfolio;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;
use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use SleepingOwl\Admin\Contracts\Initializable;

/**
 * Class Portfolios
 *
 * @property \App\Portfolio $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Portfolios extends Section implements Initializable
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

        $display = AdminDisplay::table()->paginate(10);

        $display->setHtmlAttribute('class', 'table-info table-hover');

//        $display->with('country', 'companies', 'author');
//        $display->setFilters(
//            AdminDisplayFilter::related('country_id')->setModel(Country::class)
//        );

        $display->setColumns([
//        $photo = AdminColumn::image('photo', 'Photo<br/><small>(image)</small>')
//            ->setHtmlAttribute('class', 'hidden-sm hidden-xs')
//            ->setWidth('100px'),

        AdminColumn::link('title', 'Title')
            ->setWidth('330px'),

        AdminColumn::text('alias', 'Alias')
            ->setWidth('170px'),

        AdminColumn::text('customer', 'Customer'),


            AdminColumn::custom('Filters<br/><small>(lists)</small>', function(Portfolio $portfolio) {
                return $portfolio->filter->alias;
            })->setWidth('150px'),
//
//        AdminColumn::custom('Has Photo?<br/><small>(custom)</small>', function ($instance) {
//            return $instance->photo ? '<i class="fa fa-check"></i>' : '<i class="fa fa-minus"></i>';
//        })->setHtmlAttribute('class', 'text-center')->setWidth('50px'),


            AdminColumn::datetime('created_at', 'Created at<br/><small>(datetime)</small>')
                ->setWidth('150px')
                ->setHtmlAttribute('class', 'text-center')
                ->setFormat('d.m.Y'),
    ]);

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

        $form = AdminForm::panel();

        $form->setItems(
            AdminFormElement::columns()
                ->addColumn(function() {
                    return [
                        AdminFormElement::text('title', 'Portfolios title')->required('Please, type title'),
                        AdminFormElement::text('alias', 'Alias')->required(),
                        AdminFormElement::text('customer', 'Customer'),
//                        AdminFormElement::select('filter_alias', 'Brand', Filter::class)->setDisplay('title')->required(),
                        AdminFormElement::wysiwyg('text', 'Text', 'simplemde')->required(),
                    ];
                })
//                ->addColumn(function() {
//                    return [
//                        AdminFormElement::image('photo', 'Photo'),
//
//                    ];
//                })
        );

        $form
            ->getButtons()
            ->setSaveButtonText('Save contact')
            ->hideCancelButton();

        return $form;
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
