<?php namespace Abs\Store\Models;

use Illuminate\Database\Query\Builder;
use Illuminate\Support\Str;
use Model;
use System\Models\File;

/**
 * Product Model
 */
class Product extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string table associated with the model
     */
    public $table = 'abs_store_products';

    /**
     * @var array guarded attributes aren't mass assignable
     */
    protected $guarded = ['*'];

    /**
     * @var array fillable attributes are mass assignable
     */
    protected $fillable = [];

    /**
     * @var array rules for validation
     */
    public $rules = [];

    /**
     * @var array Attributes to be cast to native types
     */
    protected $casts = [];

    /**
     * @var array jsonable attribute names that are json encoded and decoded from the database
     */
    protected $jsonable = [];

    /**
     * @var array appends attributes to the API representation of the model (ex. toArray())
     */
    protected $appends = [];

    /**
     * @var array hidden attributes removed from the API representation of the model (ex. toArray())
     */
    protected $hidden = [];

    /**
     * @var array dates attributes that should be mutated to dates
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public $belongsToMany = [
        'categories' => [
            Category::class,
            'table' => 'abs_store_category_product',
            'key' => 'product_id', 'otherKey' => 'category_id'
        ],
    ];

    public $attachOne = [
        'preview' => [File::class]
    ];

    public $attachMany = [
        'product_images' => [File::class],
    ];

    public function scopeFilterByCategory(Builder $query, $filter)
    {
        return $query->whereHas('categories', function ($q) use  ($filter) {
            $q->whereIn('category_id', $filter);
        });
    }

    public function getShortDescriptionAttribute()
    {
        return $this->description = Str::limit($this->description, 100, '...');
    }

}
