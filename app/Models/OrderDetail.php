<?php

namespace App\Models;

use App\Traits\HasCompositePrimaryKeyTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class OrderDetail extends Model
{
    use HasFactory;
    use HasCompositePrimaryKeyTrait;
    protected $fillable = [
        'productID',
        'orderID',
        'quantity',
        'price'
    ];
    public $timestamps = false;
    protected $table = 'orderdetail';
    protected $primaryKey = ['productID', 'orderID'];
    public $incrementing = false;
    public function product()
    {
        return $this->belongsTo(Product::class, 'productID');
    }
    public function orders()
    {
        return $this->belongsTo(Orders::class, 'orderID');
    }
}
