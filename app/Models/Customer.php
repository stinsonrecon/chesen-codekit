<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'address',
        'city',
        'phoneNumber',
        'email'
    ];
    protected $table = 'customer';
    public $timestamps = false;
    public function orders() {
        return $this->hasMany(Orders::class, 'customerID', 'id');
    }
}


