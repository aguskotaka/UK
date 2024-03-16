<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_sale',
        'id_product',
        'total_product',
        'sub_total',
    ];

    public function sale(){
        return $this->belongsTo(Sale::class, 'id_sale','id');
    }
    public function product(){
        return $this->belongsTo(Product::class, 'id_product','id');
    }
}

