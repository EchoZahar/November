<?php namespace Abs\Store\FormWidgets;

use Abs\Store\Models\Currency;
use Backend\Classes\FormWidgetBase;

class CurrencyDefault extends FormWidgetBase
{
    protected $defaultAlias = 'abs_store_currency_default';

    public function render()
    {
        $this->prepareVars();
        return $this->makePartial('currencydefault');
    }

    public function prepareVars()
    {
        $this->vars['name'] = $this->formField->getName();
        $this->vars['code'] = $this->defaultCurrency()->code;
    }

    public function loadAssets()
    {
        $this->addCss('css/currencydefault.css', 'Abs.Store');
        $this->addJs('js/currencydefault.js', 'Abs.Store');
    }

    public function getSaveValue($value)
    {
        return $value;
    }

    public function defaultCurrency()
    {
        return Currency::where('code', 'RUB')->select('code')->firstOrFail();
    }
}
