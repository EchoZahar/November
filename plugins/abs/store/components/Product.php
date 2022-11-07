<?php namespace Abs\Store\Components;

use Abs\Store\Models\Product as ProductModel;
use Abs\Store\Models\Category as ProductCategoryModel;
use Cms\Classes\ComponentBase;
use Illuminate\Http\Response;

class Product extends ComponentBase
{
    public $product;

    public $productCategory;

    public $productCategoryCount;

    public function componentDetails()
    {
        return [
            'name' => 'Продукт',
            'description' => 'Показать инвормацию отдельно взятого продукта...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onRun()
    {
        $this->product = ProductModel::where('slug', $this->param('product'))->first();
        $this->productCategory = ProductCategoryModel::where('slug', $this->param('category'))->first();
        $this->productCategoryCount = $this->productCategory->products()->count();
        if (!$this->product) {
            return Response::make($this->controller->run('404'), 404);
        }
    }
}
