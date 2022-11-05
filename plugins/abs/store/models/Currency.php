<?php namespace Abs\Store\Models;

use Model;
use October\Rain\Database\Traits\Validation;

/**
 * Currency Model
 */
class Currency extends Model
{
    use Validation;

    public $table = 'abs_store_currencies';

    protected $guarded = ['*'];

    protected $fillable = ['is_published'];

    public $rules = [];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public $hasOne = [];

    public $belongsTo = [
//        'price' => [Price::class],
    ];

    public function getCodeWithNameCurrencyAttribute()
    {
        return $this->symbol . ' |   ' . $this->code  .' - валюта ' . $this->name;
    }
}
