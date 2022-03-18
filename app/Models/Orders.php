<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $fillable = [
        'statusPay',
        'statusDeli',
        'typePay',
        'note',
        'customerID',
        'idBanking'
    ];
    protected $dates = ['created_at', 'updated_at'];
    protected $table = 'orders';
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customerID');
    }
    public function orderDetail() {
        return $this->hasMany(OrderDetail::class, 'orderID', 'id');
    }
}
