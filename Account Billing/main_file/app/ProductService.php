<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductService extends Model
{
    protected $fillable = [
        'name',
        'sku',
        'sale_price',
        'purchase_price',
        'tax_id',
        'category_id',
        'unit_id',
        'type',
        'created_by',
    ];

    public function taxes()
    {
        return $this->hasOne('App\Tax', 'id', 'tax_id')->first();
    }

    public function unit()
    {
        return $this->hasOne('App\ProductServiceUnit', 'id', 'unit_id')->first();
    }

    public function category()
    {
        return $this->hasOne('App\ProductServiceCategory', 'id', 'category_id');
    }
}
