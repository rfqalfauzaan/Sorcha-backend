<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['weight', 'shop_id', 'description'];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
