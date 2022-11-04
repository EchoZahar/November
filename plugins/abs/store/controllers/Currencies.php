<?php namespace Abs\Store\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Currencies Backend Controller
 */
class Currencies extends Controller
{
    public $implement = [
        \Backend\Behaviors\FormController::class,
        \Backend\Behaviors\ListController::class
    ];

    /**
     * @var string formConfig file
     */
    public $formConfig = 'config_form.yaml';

    /**
     * @var string listConfig file
     */
    public $listConfig = 'config_list.yaml';

    /**
     * @var array required permissions
     */
    public $requiredPermissions = ['abs.store.currencies'];

    /**
     * __construct the controller
     */
    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Abs.Store', 'store', 'currencies');
    }
}
