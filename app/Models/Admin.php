<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $fillable = [
        'username',
        'password',
        'name',
        'linkImg'
    ];
    protected $hidden = [
        'password',
        'remember_token'
    ];
    protected $dates = ['created_at', 'updated_at'];
    protected $table = 'admin';
}
