<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'linkImg',
        'description',
        'content',
        'statusTop',
        'statusDisplay'
    ];
    protected $dates = ['created_at', 'updated_at'];
    protected $table = 'news';
}
