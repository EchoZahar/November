<?php namespace Abs\Store\Components;

use Abs\Store\Models\Category as OneCategory;
use Abs\Store\Models\Product;
use Cms\Classes\ComponentBase;
use Illuminate\Database\Query\Builder;

/**
 * Category Component
 */
class Category extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Категория',
            'description' => 'Вывести данные категории и продуктов...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onRun()
    {
//        dd($this->param('category'));
        $this->page['category'] = OneCategory::where('slug', $this->param('category'))
            ->with(['products' => function ($q) {
                $q->where('is_published', 1)->paginate(4);
            }])->first();
        $this->page['products'] = $this->page['category']->products()->paginate(5);
//        dd($this->page['products']);
    }
}
