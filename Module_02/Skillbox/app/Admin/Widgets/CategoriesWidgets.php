<?php

namespace App\Admin\Widgets;

use App\Models\Category;
use Arrilot\Widgets\AbstractWidget;

class CategoriesWidgets extends AbstractWidget{
    protected $config = [];

    public function run()
    {
    $count = Category::count();
        return view('voyager::dimmer', array_merge($this->config, [
            'icon' => 'voyager-categories',
            'title' => 'Счётчик категорий',
            'text' => "Количество категорий: {$count}",
            'button' => [
                'text' => 'Перейти к списку',
                'link' => '/admin/categories'
            ],
            'image' => 'storage/category_list.png',
        ]));
    }

    public function shouldBeDisplayed()
    {
        return true;
    }
}