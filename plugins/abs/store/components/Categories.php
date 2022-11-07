<?php namespace Abs\Store\Components;

use Abs\Store\Models\Category;
use Cms\Classes\ComponentBase;

/**
 * Categories Component
 */
class Categories extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Категории',
            'description' => 'Буду выводить только опубликованные категории...'
        ];
    }

    public function onRun()
    {
        $this->page['categories'] = Category::where('is_published', 1)
            ->whereNull('parent_id')
            ->select('id', 'name', 'slug', 'description', 'parent_id', 'nest_left', 'nest_right', 'nest_depth')
            ->get();;
    }
}
