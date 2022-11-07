<?php namespace Abs\Store;

use Abs\Store\Components\Categories as AllCategories;
use Abs\Store\Components\Category as OneCategory;
use Abs\Store\Components\Product;
use Abs\Store\FormWidgets\CurrencyDefault;
use Abs\Store\FormWidgets\PriceCurrency;
use Backend;
use System\Classes\PluginBase;

/**
 * Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Магазин',
            'description' => 'Описание позже...',
            'author'      => 'Abs',
            'icon'        => 'icon-leaf'
        ];
    }

    public function registerComponents()
    {
        return [
            AllCategories::class    => 'categories',
            OneCategory::class      => 'category',
            Product::class          => 'products',
        ];
    }

    public function registerPermissions()
    {
        return [
            'abs.store.some_permission' => [
                'tab' => 'Store',
                'label' => 'Some permission'
            ],
        ];
    }

    public function registerNavigation()
    {
        return [
            'store' => [
                'label'       => 'Магазин',
                'url'         => Backend::url('abs/store/categories'),
                'icon'        => 'icon-shopping-bag',
                'permissions' => ['abs.store.*'],
                'order'       => 500,
                'sideMenu'  => [
                    'categories' => [
                        'label'         => 'категории',
                        'icon'          => 'icon-object-ungroup',
                        'url'           => Backend::url('abs/store/categories'),
                        'permissions'   => ['abs.store.*'],
                    ],
                    'products' => [
                        'label'         => 'продукты',
                        'icon'          => 'icon-object-group',
                        'url'           => Backend::url('abs/store/products'),
                        'permissions'   => ['abs.store.*'],
                    ],
                    'currencies' => [
                        'label'         => 'валюты',
                        'icon'          => 'icon-gg',
                        'url'           => Backend::url('abs/store/currencies'),
                        'permissions'   => ['abs.store.*'],
                    ]
                ]
            ],
        ];
    }

    public function registerFormWidgets()
    {
        return [
            PriceCurrency::class => [
                'label' => 'выбрать дополнительно валюту',
                'code' => 'pricecurrency',
            ],
            CurrencyDefault::class => [
                'label' => 'дефолтная валюта',
                'code'  => 'currencyDefault'
            ]
        ];
    }
}
