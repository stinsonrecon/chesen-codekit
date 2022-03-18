<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'priceRoot',
        'pricePromo',
        'linkImg',
        'description',
        'quantity',
        'status',
        'promoID'
    ];
    protected $table = 'product';
    public $timestamps = false;
    public function promotion()
    {
        return $this->belongsTo(Promotion::class, 'promoID');
    }
    public function orderDetail() {
        return $this->hasMany(OrderDetail::class, 'productID', 'id');
    }
}
