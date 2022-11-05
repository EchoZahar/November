<?php namespace Abs\Store\Models;

use Model;
use October\Rain\Database\Traits\NestedTree;
use October\Rain\Database\Traits\Sluggable;
use October\Rain\Database\Traits\Sortable;
use October\Rain\Database\Traits\Validation;
use System\Models\File;

/**
 * Category Model
 */
class Category extends Model
{
    use Validation, Sluggable, NestedTree;

    public $table = 'abs_store_categories';

    public $slugs = ['slug' => 'name'];

    protected $guarded = ['*'];

    protected $fillable = [];

    public $rules = [
        'name' => ['required', 'string', 'min:3', 'max:150'],
        'description'=> ['nullable', 'string', 'min:3', 'max:1000'],
        'preview' => ['required']
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [];
    public $belongsToMany = [
        'products' => [Product::class, 'table' => 'abs_store_category_product'],
    ];

    public $attachOne = [
        'preview' => [File::class],
    ];
}
