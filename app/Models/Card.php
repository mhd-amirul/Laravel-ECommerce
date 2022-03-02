<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function users()
    {
        return $this->belongsTo(Card::class);
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
