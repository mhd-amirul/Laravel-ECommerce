<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

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
