<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable =[
        'sales_date',
        'total_price',
        'id_client',
    ];

    public function client(){
        return $this->belongsTo(Client::class, 'id_client','id');
    }
    public function sales_details()
    {
        return $this->hasMany(SalesDetails::class, 'sale_id','id');
    }
}
