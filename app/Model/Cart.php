<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $guarded = ['id'];

    public function products()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
