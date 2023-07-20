<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [ "id" ];

    public function Ratings()
    {
        return $this->hasMany(Rating::class, "product_id", "id");
    }

    public function byCategory($query, array $filters)
    {
        if (isset($filters) ? $filters : false) {
            return $query->where(function ( $q ) use ( $filters ) {
                foreach ($filters as $value) {
                    $q->orWhere('category', 'LIKE', '%' . $value . '%');
                }
            });
        }
    }
}
