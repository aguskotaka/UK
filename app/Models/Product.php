<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'product_price',
        'stock',
    ];

    public function sales_details()
    {
        return $this->hasMany(SalesDetails::class, 'product_id','id');
    }
}
